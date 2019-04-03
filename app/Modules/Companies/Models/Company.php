<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.02.19
 *
 */

namespace App\Modules\Challenges\Models;

use App\Models\BaseModel;
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
}
