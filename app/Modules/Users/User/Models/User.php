<?php

namespace App\Modules\Users\User\Models;

use App\Modules\Challenges\Enums\CountryEnum;
use App\Modules\Challenges\Enums\ProofStatusEnum;
use App\Modules\Challenges\Models\Challenge;
use App\Modules\Challenges\Models\Company;
use App\Modules\Challenges\Models\Proof;
use App\Modules\Files\Services\ImageService;
use App\Modules\Users\Services\ApiRatingData\Rankable;
use App\Modules\Users\Services\ReferralCodeService\ReferralAble;
use App\Modules\Users\User\Mails\ResetPasswordMail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\Facades\JWTAuth;

class User extends Authenticatable implements JWTSubject, ReferralAble, CanGenerateJwtToken, Rankable
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    protected const DEFAULT_COINS_AMOUNT = 0;

    use Notifiable;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'birthday',
    ];

    protected $attributes = [
        'coins' => self::DEFAULT_COINS_AMOUNT,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'email',
        'password',
        'phone_number',
        'country_code',
        'is_registration_completed',
        'avatar',
        'birthday',
        'sex',
        'country',
        'city',
        'coins',
        'referral_code',
    ];

    protected $casts = [
        'is_registration_completed' => 'boolean',
        'birthday' => 'date:U',
        'created_at' => 'date:U',
        'updated_at' => 'date:U',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'facebook_id',
        'email_verified_at',
        'pivot',
        'company_id',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * @param string $password
     */
    public function setPasswordAttribute(string $password): void
    {
        $this->attributes['password'] = Hash::make($password);
    }

    /**
     * Sends the password reset notification.
     *
     * @param string $token
     *
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordMail($token, $this));
    }

    /**
     * @return string
     */
    public function getAvatarAttribute($value): ?string
    {
        return $value ? Storage::url($value) : null;
    }

    /**
     * @return string
     */
    public function getAvatarWithDefaultAttribute($value): ?string
    {
        return $value ? Storage::url($value) : '/assets/images/default_avatar.svg';
    }

    /**
     * @return string
     */
    public function getFullPhoneNumberAttribute(): string
    {
        return $this->country_code . $this->phone_number;
    }

    /**
     * @param $attribute
     */
    public function setAvatarAttribute($attribute)
    {
        $path = 'avatars';
        $imageService = new ImageService($attribute);
        $image = $imageService->orientate();
        $fileName = $path . '/' . $attribute->hashName();
        Storage::put($fileName, $image);

        if (null !== $this->avatar) {
            Storage::delete($this->avatar);
        }

        $this->attributes['avatar'] = $fileName;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function challenges()
    {
        return $this->belongsToMany(Challenge::class)->withTimestamps();
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
        return $this->belongsTo(Company::class);
    }

    /**
     * @return bool
     */
    public function enoughCoinsToParticipateChallenge(): bool
    {
        return $this->coins >= Challenge::PARTICIPATION_COST;
    }

    /**
     * @param Challenge $challenge
     * @return bool
     */
    public function isAbleToSendProof(Challenge $challenge): bool
    {
        return Proof::where('challenge_id', $challenge->id)
            ->where('user_id', $this->id)
            ->whereIn('status', [ProofStatusEnum::PENDING, ProofStatusEnum::ACCEPTED])
            ->count();

    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country ?? CountryEnum::SAUDI_ARABIA;
    }

    /**
     * @return User
     */
    public function hideForPublic(): self
    {
        return $this->makeHidden([
            'updated_at_at',
            'phone_number',
            'country_code',
            'is_registration_completed',
            'coins',
        ]);
    }

    public function chargeReward(int $reward): void
    {
        $this->coins += $reward;
        $this->total_reward += $reward;
    }

    public function chargeRewardToReferralUser(): void
    {
        // TODO implement reward referral user after adding gold coins functionality
        // $referralUser = $this->where('referral_code', $this->referral_code)->first();
    }

    public function calculateReferralCode(): void
    {
        do {
            $randomCode = str_random(config('custom.referral_code_length'));
        } while ($this->where('referral_code', $randomCode)->first());
        $this->attributes['referral_code'] = str_random(config('custom.referral_code_length'));
    }

    /**
     * @return string
     */
    public function generateToken(): string
    {
        return JWTAuth::fromUser($this);
    }

    public function resetCoinsAndRating(): void
    {
        $this->coins = 0;
        $this->total_reward = 0;
        $this->save();
    }

    /**
     * @return int
     */
    public function getCurrentPosition(): int
    {
        $groupsCount = DB::table($this->table)
            ->select(DB::raw('count(*) as count, total_reward'))
            ->where('is_registration_completed', true)
            ->where('total_reward', '>', $this->total_reward)
            ->groupBy('total_reward')
            ->get()
            ->count();
        return $groupsCount + 1;
    }

    /**
     * @return AbstractPaginator
     */
    public function getRating(): AbstractPaginator
    {
        // The total_reward field is used for denormalization to improve performance.
        return $this
            ->select(
                'id',
                'full_name',
                DB::raw('DENSE_RANK() OVER(ORDER BY total_reward DESC) AS Position, total_reward'),
                'avatar'
            )
            ->completedRegistration()
            ->paginate(config('custom.rating_results_count_per_page'));
    }

    /**
     * @return array
     */
    public function getMyPositionFormattedData(): array
    {
        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'position' => $this->getCurrentPosition(),
            'total_reward' => $this->total_reward,
            'avatar' => $this->avatar,
        ];
    }

    /**
     * @param $query
     * @return Builder
     */
    public function scopeCompletedRegistration($query): Builder
    {
        return $query->where('is_registration_completed', true);
    }

    public function resetCoinsAndRatingForAllUsers() : void
    {
        DB::table($this->table)->update([
            'coins' => self::DEFAULT_COINS_AMOUNT,
            'total_reward' => 0,
        ]);
    }
}
