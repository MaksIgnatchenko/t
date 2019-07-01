<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.02.19
 *
 */

namespace App\Modules\Challenges\Models;

use App\Models\BaseModel;
use App\Modules\Challenges\Enums\ChallengeStatusEnum;
use App\Modules\Challenges\Enums\ProofStatusEnum;
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

    /**
     * @var array
     */
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

    /**
     * @var array
     */
    protected $appends = [
        'participants_count',
        'is_participated',
        'participation_cost',
        'my_proof',
    ];

    /**
     * @var array
     */
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
     * @param $attribute
     */
    public function setStartDateAttribute($attribute)
    {
        $this->attributes['start_date'] = Carbon::parse($attribute)->format('Y-m-d H:i:s');
    }

    /**
     * @param $attribute
     */
    public function setEndDateAttribute($attribute)
    {
        $this->attributes['end_date'] = Carbon::parse($attribute)->format('Y-m-d H:i:s');
    }

    /**
     * @return int
     */
    public function getParticipantsCountAttribute(): int
    {
        return $this->participants()->count();
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
        return $this->belongsToMany(User::class, 'challenge_user', 'challenge_id', 'user_id')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proofs()
    {
        return $this->hasMany(Proof::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class)
            ->withDefault([
                'name' => null,
                'type' => 'none',
            ]);
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
    public static function searchForCountryEnvironment(User $user, ?string $search, ?int $limit): iterable
    {
        $query = self::orderBy('start_date', 'DESC')
            ->where('country', '=', $user->country);

        if ($search) {
            $query = $query::where('name', 'like', "%{$search}%");
        }

        return $query->paginate($limit ?? self::DEFAULT_LIMIT);
    }

    /**
     * @param User $user
     * @param string|null $search
     * @param int|null $limit
     * @return iterable
     */
    public static function searchForCompanyEnvironment(User $user, ?string $search, ?int $limit): iterable
    {
        $query = self::orderBy('start_date', 'DESC')
            ->where('company_id', '=', $user->company_id);

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
     * @return int
     */
    public function getCurrentProofsCountAttribute() : int
    {
        return $this->proofs()->where('challenge_id', $this->id)->count();

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
        // Sorry for db queries in loop.
        // This makes it possible to use challenge observer to create feeds.
        // Also, this will not cause problems with DB performance due to the low intensity of this operation.
        foreach($challenges as $challenge) {
            $challenge->status = $newStatus;
            $challenge->save();
        }
    }

    /**
     * @param int $newLimit
     * @return bool
     */
    public function isAbleToChangeParticipantsLimit(int $newLimit) : bool
    {
        return $this->participants_count <= $newLimit;
    }

    /**
     * @return bool
     */
    public function isAbleToChangeProofType() : bool
    {
        return $this->current_proofs_count === 0;
    }

    /**
     * @return bool
     */
    public function isAbleToChangeProofsCount() : bool
    {
        return $this->current_proofs_count === 0;
    }

    /**
     * @return bool
     */
    public function isAbleToChangeVideoDuration() : bool
    {
        return $this->current_proofs_count === 0;
    }

    /**
     * @return bool
     */
    public function isActive() : bool
    {
        return ChallengeStatusEnum::ACTIVE === $this->status;
    }

    /**
     * @return bool
     */
    public function isEnded() : bool
    {
        return ChallengeStatusEnum::END === $this->status;
    }

    /**
     * @return bool
     */
    public function mayHaveResults() : bool
    {
        return in_array(
            $this->status,
            [
                ChallengeStatusEnum::ACTIVE,
                ChallengeStatusEnum::END,
            ]
        );
    }

    /**
     * @param int|null $fromPosition
     * @param int|null $limit
     * @return Collection
     */
    public function getAcceptedProofs(int $fromPosition = null, int $limit = null) : Collection
    {
        $fromPosition = $fromPosition ? $fromPosition - 1 : 0;
        $limit = $limit ? $limit : config('custom.results_count_per_page');
        return $this
            ->proofs()
            ->accepted()
            ->with('user')
            ->orderBy('position')
            ->offset($fromPosition)
            ->limit($limit)
            ->get();
    }

    /**
     * @return Proof|null
     */
    public function getMyAcceptedProof() : ?Proof
    {
        return $this->proofs()->accepted()->my()->with('user')->first();
    }
}
