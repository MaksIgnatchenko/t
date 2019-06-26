<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.02.19
 *
 */

namespace App\Modules\Challenges\Models;

use App\Models\BaseModel;
use App\Modules\Companies\Enums\CompanyTypeEnum;
use App\Modules\Users\User\Models\User;
use Illuminate\Support\Facades\Storage;

class Company extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'companies';

    public $fillable = [
        'name',
        'logo',
        'info',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'type' => CompanyTypeEnum::COMMERCIAL,
    ];

    protected const DEFAULT_MODEL_TYPE = CompanyTypeEnum::ARCHIEVE;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function challenges()
    {
        return $this->hasMany(Challenge::class);
    }

    /**
     * @return string
     */
    public function getLogoAttribute($value): ?string
    {
        return $value ? Storage::url($value) : null;
    }

    /**
     * @return string
     */
    public function getLogoWithDefaultAttribute($value): ?string
    {
        return $value ? Storage::url($value) : '/assets/images/default_company.svg';
    }

    /**
     * @param $attribute
     */
    public function setLogoAttribute($attribute)
    {
        if (null !== $this->logo) {
            Storage::delete($this->logo);
        }

        $this->attributes['logo'] = $attribute;
    }

    /**
     * @param string $joinCode
     * @return Company
     */
    public function getCompanyByJoinCode(?string $joinCode) : Company
    {
        return $this->whereNotNull('join_code')->where('join_code', $joinCode)->first() ?? $this;
    }

    public function generateUniqueJoinPassword(): void
    {
        do {
            $randomCode = str_random(config('custom.company_join_code_length'));
        } while ($this->getCompanyByJoinCode($randomCode)->exists);
        $this->attributes['join_code'] = $randomCode;
    }

    public function detachCompanies(): void
    {
        $this->challenges()->update([
            'company_id' => $this->getDefaultCompanyId(),
        ]);
    }

    /**
     * @return int
     */
    public function getDefaultCompanyId(): int
    {
        return $this->where('type', self::DEFAULT_MODEL_TYPE)->first(['id'])->id;
    }

    public function detachUsers(): void
    {
        $this->users()->update([
            'company_id' => null,
        ]);
    }
}
