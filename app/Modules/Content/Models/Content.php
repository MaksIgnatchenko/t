<?php

namespace App\Modules\Content\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    /** @var string */
    protected $primaryKey = 'key';

    /** @var bool */
    public $incrementing = false;

    /** @var array */
    public $fillable = [
        'value',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'key' => 'string',
        'title' => 'string',
        'value' => 'string',
    ];
}
