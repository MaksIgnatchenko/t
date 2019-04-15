<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.02.19
 *
 */

namespace App\Modules\Challenges\Models;

use App\Models\BaseModel;
use App\Modules\Challenges\Enums\ChallengeStatusEnum;
use App\Modules\Challenges\Helpers\AvailableMimeTypeForProofItemHelper;
use App\Modules\Challenges\Helpers\MaxSizeProofItemHelper;
use App\Modules\Challenges\Interfaces\AbleToContainProofs;
use App\Modules\Users\User\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
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
        'status',
    ];

    protected $appends = [
        'participants_count',
        'is_participated',
        'participation_cost',
        'my_proof',
    ];

    protected $casts = [
        'start_date' => 'datetime:U',
        'end_date' => 'datetime:U',
        'created_at' => 'datetime:U',
        'updated_at' => 'datetime:U',
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

    /**
     * @return Proof|null
     */
    public function getMyProofAttribute(): ?Proof
    {
        $latestProof = $this->
            proofs()
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desk')
            ->first();
        return $latestProof ?? null;
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
        return ChallengeStatusEnum::ACTIVE === $this->status;
    }

    /**
     * @param $query
     * @return Builder
     */
    public function scopeShouldBeActivated($query) : Builder
    {
        $now = Carbon::now();
        return $query->where('start_date', '<=', $now)->where('end_date', '>', $now)->where('status', '<>', ChallengeStatusEnum::ACTIVE);
    }

    /**
     * @param $query
     * @return Builder
     */
    public function scopeShouldBeEnded($query) : Builder
    {
        $now = Carbon::now();
        return $query->where('end_date', '<=', $now)->where('status', '<>', ChallengeStatusEnum::END);
    }

    public function handleStatuses() : void
    {
        $this->changeStatuses($this->shouldBeActivated()->get(), ChallengeStatusEnum::ACTIVE);
        $this->changeStatuses($this->shouldBeEnded()->get(), ChallengeStatusEnum::END);
    }

    /**
     * @param Collection $challenges
     * @param string $newStatus
     */
    private function changeStatuses(Collection $challenges, string $newStatus) : void
    {
        foreach($challenges as $challenge) {
            $challenge->status = $newStatus;
            $challenge->save();
        }
    }

}
