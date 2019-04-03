<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 29.03.19
 *
 */

namespace App\Modules\Challenges\Models;

use App\Models\BaseModel;
use App\Modules\Challenges\Enums\ProofStatusEnum;
use App\Modules\Users\User\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

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
}