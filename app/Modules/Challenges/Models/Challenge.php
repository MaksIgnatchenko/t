<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.02.19
 *
 */

namespace App\Modules\Challenges\Models;

use App\Models\BaseModel;
use App\Modules\Challenges\Helpers\AvailableMimeTypeForProofItemHelper;
use App\Modules\Challenges\Helpers\MaxSizeProofItemHelper;
use App\Modules\Challenges\Interfaces\AbleToContainProofs;
use App\Modules\Users\User\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Challenge extends BaseModel implements AbleToContainProofs
{
    public const PARTICIPATION_COST = 10;
    protected const DEFAULT_LIMIT = 15;

    /** @var array */
    public $fillable = [
        'company_id',
        'name',
        'image',
        'description',
        'link',
        'country',
        'city',
        'participants_limit',
        'proof_type',
        'items_count_in_proof',
        'video_duration',
        'start_date',
        'end_date',
    ];

    protected $appends = [
        'participants_count',
        'is_participated',
        'participation_cost',
        'my_proof_status',
    ];

    protected $casts = [
        'start_date' => 'date:U',
        'end_date' => 'date:U',
        'created_at' => 'date:U',
        'updated_at' => 'date:U',
    ];

    /**
     * @param $value
     * @return string|null
     */
    public function getImageAttribute($value): ?string
    {
        return $value ? Storage::url($value) : null;
    }

    /**
     * @return string
     */
    public function getImageWithDefaultAttribute($value): ?string
    {
        return $value ? Storage::url($value) : '/assets/images/default_challenge.svg';
    }

    /**
     * @param $attribute
     */
    public function setImageAttribute($attribute)
    {
        if (null !== $this->image) {
            Storage::delete($this->image);
        }

        $this->attributes['image'] = $attribute;
    }

    /**
     * @return int
     */
    public function getParticipantsCountAttribute(): int
    {
        return $this->participants->count();
    }

    /**
     * @return int
     */
    public function getParticipationCostAttribute(): int
    {
        return self::PARTICIPATION_COST;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function participants()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proofs()
    {
        return $this->hasMany(Proof::class);
    }

    /**
     * @return bool
     */
    public function getIsParticipatedAttribute(): bool
    {
        return $this->participants()
            ->wherePivot('user_id', Auth::id())
            ->get()
            ->isNotEmpty();
    }

    public function getMyProofStatusAttribute(): ?string
    {
        $latestProof = $this->
            proofs()
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desk')
            ->first();
        if ($latestProof) {
            return $latestProof->status;
        }
        return null;
    }

    /**
     * @param User $user
     * @param string|null $search
     * @param int|null $limit
     * @return iterable
     */
    public static function search(User $user, ?string $search, ?int $limit): iterable
    {
        $query = self::orderBy('start_date', 'DESC')
            ->where('country', '=', $user->country);

        if ($search) {
            $query = $query::where('name', 'like', "%{$search}%");
        }

        return $query->paginate($limit ?? self::DEFAULT_LIMIT);
    }

    /**
     * @return bool
     */
    public function enoughFreePlaces(): bool
    {
        return ($this->participants_limit === 0) || ($this->participants_limit > $this->participants_count);
    }

    /**
     * @return string
     */
    public function getRequiredProofsType(): string
    {
        return $this->proof_type;
    }

    /**
     * @return int
     */
    public function getRequiredProofsCount(): int
    {
        return $this->items_count_in_proof;
    }

    /**
     * @return int|null
     */
    public function getRequiredVideoDuration(): ?int
    {
        return $this->video_duration;
    }

    /**
     * @return array
     */
    public function getAvailableProofItemsMimeType() : array
    {
        return AvailableMimeTypeForProofItemHelper::get($this->proof_type);
    }

    /**
     * @return int
     */
    public function getMaxSizeProofItemsMimeType() : int
    {
        return MaxSizeProofItemHelper::get($this->proof_type);
    }

    /**
     * @return bool
     */
    public function checkForActiveStatus() : bool
    {
        $now = Carbon::now();
        return $now->gt($this->start_date) && $now->lt($this->end_date);
    }
}
