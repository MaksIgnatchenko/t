<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.02.19
 *
 */

namespace App\Modules\Challenges\Models;

use App\Models\BaseModel;
use App\Modules\Companies\Enums\CompanyTypeEnum;
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
     * @return Company|null
     */
    public function getCompanyByJoinCode(string $joinCode) : ?Company
    {
        return $this->where('join_code', $joinCode)->first();
    }

    public function generateUniqueJoinPassword(): void
    {
        do {
            $randomCode = str_random(config('custom.company_join_code_length'));
        } while ($this->getCompanyByJoinCode($randomCode));
        $this->attributes['join_code'] = str_random(config('custom.company_join_code_length'));
    }

}
