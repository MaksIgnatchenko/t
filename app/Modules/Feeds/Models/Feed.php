<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 15.04.19
 *
 */

namespace App\Modules\Feeds\Models;

use App\Models\BaseModel;
use App\Modules\Challenges\Models\ChallengeWithoutAppends;
use App\Modules\Challenges\Models\Proof;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Feed extends BaseModel
{
    /**
     * @var array
     */
    protected $with = [
        'challenge',
        'proof',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:U',
        'updated_at' => 'datetime:U',
    ];

    /**
     * @return BelongsTo
     */
    public function challenge() : BelongsTo
    {
        return $this->belongsTo(ChallengeWithoutAppends::class, 'challenge_id', 'id', 'challenges');
    }

    /**
     * @return BelongsTo
     */
    public function proof() : BelongsTo
    {
        return $this->belongsTo(Proof::class)->with(['user', 'challenge']);
    }

    /**
     * @param $query
     * @param $userCountry
     * @return Builder
     */
    public function scopeLocal($query, $userCountry) : Builder
    {
        return $query->where('country', $userCountry);
    }
}