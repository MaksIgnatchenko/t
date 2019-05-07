<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 29.03.19
 *
 */

namespace App\Modules\Challenges\Models;

use App\Models\BaseModel;
use App\Modules\Challenges\Enums\ProofStatusEnum;
use App\Modules\Challenges\Enums\ProofTypeEnum;
use App\Modules\Files\Services\ImageService;
use App\Modules\Users\User\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Pawlox\VideoThumbnail\Facade\VideoThumbnail;

class Proof extends BaseModel
{
    /**
     * @var array
     */
    private $files = null;

    /**
     * @var array
     */
    public $fillable = [
        'challenge_id',
        'user_id',
        'type',
        'status',
        'preview',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'items' => 'array',
        'created_at' => 'date:U',
        'updated_at' => 'date:U',
    ];

    /**
     * @param $value
     * @return array
     */
    public function getItemsAttribute($value) : array
    {
        $rawItems = \GuzzleHttp\json_decode($value, true);
        $items = [];
        foreach ($rawItems as $item) {
            $items[] = Storage::url($item);
        }
        return $items;
    }

    /**
     * @param $value
     * @return string|null
     */
    public function getPreviewAttribute($value) : ?string
    {
        return $value ? Storage::url($value) : null;
    }

    /**
     * @param $query
     * @return Builder
     */
    public function scopeAccepted($query) : Builder
    {
        return $query->where('status', ProofStatusEnum::ACCEPTED);
    }

    /**
     * @param $query
     * @return Builder
     */
    public function scopeMy($query) : Builder
    {
        return $query->where('user_id', Auth::id());
    }

    /**
     * @param $query
     * @return Builder
     */
    public function scopePending($query) : Builder
    {
        return $query->where('status', ProofStatusEnum::PENDING);
    }

    /**
     * @param array $files
     */
    public function fillFiles(array $files) : void
    {
        $this->files = $files;
    }

    /**
     * @return array|null
     */
    public function getFiles() : ?array
    {
        return $this->files;
    }

    /**
     * @return bool
     */
    public function isAbleForDeletion() : bool
    {
        return in_array($this->status, ProofStatusEnum::getAbleForDeletionStatuses());
    }

    /**
     * @return bool
     */
    public function isAbleForChangeStatus() : bool
    {
        return ProofStatusEnum::PENDING === $this->status;
    }

    /**
     * @return BelongsTo
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function challenge() : BelongsTo
    {
        return $this->belongsTo(ChallengeWithoutAppends::class);
    }

    /**
     * @param $file
     * @return string
     */
    public function saveItem($file) : string
    {
        $path = config('custom.proofs_files_path');
        if (in_array($this->type, ProofTypeEnum::getImageTypes())) {
            $imageService = new ImageService($file);
            $image = $imageService->orientate();
            $fileName = $path . '/' .$file->hashName();
            Storage::put($fileName, $image);
            return $fileName;
        }
        $this->makePreview($file->path());
        $path =  $file->storeAs(
            $path,
            pathinfo($file->hashName(), PATHINFO_FILENAME) . '.' . $file->getClientOriginalExtension()
        );
        return $path;
    }

    /**
     * @param $filePath
     */
    protected function makePreview($filePath) : void
    {
        if (!$this->preview) {
            $fileName = str_random(30) . '.jpg';
            VideoThumbnail::createThumbnail($filePath, public_path('storage/proofs'), $fileName, 1);
            $this->preview = 'proofs/' . $fileName;
        }
    }

    /**
     * @return int|null
     */
    public function calculatePosition() : ?int
    {
        if (!($this->challenge_id && ProofStatusEnum::ACCEPTED === $this->status)) {
            return null;
        }
        if ($this->position) {
            return $this->position;
        }
        $lastCurrentPosition = $this->where('challenge_id', $this->challenge_id)->whereNotNull('position')->max('position');
        if ($lastCurrentPosition) {
            return $lastCurrentPosition + 1;
        }
        return 1;
    }

    /**
     * @param int $reward
     */
    public function attachReward(int $reward)
    {
        $this->reward = $reward;
    }
}