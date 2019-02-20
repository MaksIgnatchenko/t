<?php

namespace App\Modules\Users\User\Models;

use App\Modules\Users\User\Mails\ResetPasswordMail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

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
    ];

    protected $casts = [
        'is_registration_completed' => 'boolean',
        'birthday' => 'datetime',
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
        'email_verified_at'
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
}
