<?php

namespace App\Modules\Users\User\Models;

use App\Modules\Challenges\Enums\CountryEnum;
use App\Modules\Challenges\Enums\ProofStatusEnum;
use App\Modules\Challenges\Enums\ProofTypeEnum;
use App\Modules\Challenges\Models\Challenge;
use App\Modules\Challenges\Models\Proof;
use App\Modules\Users\User\Mails\ResetPasswordMail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    protected const DEFAULT_COINS_AMOUNT = 100;

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
     * @param  string $token
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
        $file = Storage::put('avatars', $attribute);

        if (null !== $this->avatar) {
            Storage::delete($this->avatar);
        }

        $this->attributes['avatar'] = $file;
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
    public function isAbleToSendProof(Challenge $challenge) : bool
    {
        return Proof::where('challenge_id', $challenge->id)
            ->where('user_id', $this->id)
            ->whereIn('status', [ProofStatusEnum::PENDING, ProofStatusEnum::ACCEPTED])
            ->count();

    }

    /**
     * @return string
     */
    public function getCountry() : string
    {
        return $this->country ?? CountryEnum::SAUDI_ARABIA;
    }
}
