<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.02.19
 *
 */

namespace App\Modules\Challenges\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Challenge extends Model
{
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
        'start_date',
        'end_date'
    ];

    /**
     * @param $attribute
     */
    public function setImageAttribute($attribute)
    {
        $file = Storage::put('challenges', $attribute);

        if (null !== $this->image) {
            Storage::delete($this->image);
        }

        $this->attributes['image'] = $file;
    }

    /**
     * @param $value
     * @return string|null
     */
    public function getImageAttribute($value) : ?string
    {
        return $value ? Storage::url($value) : null;
    }

}
