<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 17.04.19
 *
 */

namespace App\Modules\Challenges\Models;

class ChallengeWithoutAppends extends Challenge
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'challenges';

    /**
     * @var array
     */
    protected $appends = [];
}