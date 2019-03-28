<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.02.19
 *
 */

namespace App\Modules\Challenges\Models;

use App\Modules\Users\User\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Challenge extends Model
{
    public const PARTICIPATION_COST = 10;
    protected const DEFAULT_LIMIT = 15;

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
        'items_count_in_proof',
        'video_duration',
        'start_date',
        'end_date',
    ];

    protected $appends = [
        'participants_count',
        'is_participated',
        'participation_cost'
    ];

    protected $casts = [
        'start_date' => 'date:U',
        'end_date' => 'date:U',
        'created_at' => 'date:U',
        'updated_at' => 'date:U',
    ];

    /**
     * @param $value
     * @return string|null
     */
    public function getImageAttribute($value): ?string
    {
        return $value ? Storage::url($value) : null;
    }

    /**
     * @return int
     */
    public function getParticipantsCountAttribute(): int
    {
        return $this->participants->count();
    }

    /**
     * @return int
     */
    public function getParticipationCostAttribute(): int
    {
        return self::PARTICIPATION_COST;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function participants()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    /**
     * @return bool
     */
    public function getIsParticipatedAttribute(): bool
    {
        return $this->participants()
            ->wherePivot('user_id', Auth::id())
            ->get()
            ->isNotEmpty();
    }

    /**
     * @param User $user
     * @param string|null $search
     * @param int|null $limit
     * @return iterable
     */
    public static function search(User $user, ?string $search, ?int $limit): iterable
    {
        $query = self::orderBy('start_date', 'DESC')
            ->where('country', '=', $user->country);

        if ($search) {
            $query = $query::where('name', 'like', "%{$search}%");
        }

        return $query->paginate($limit ?? self::DEFAULT_LIMIT);
    }

    /**
     * @return bool
     */
    public function enoughFreePlaces(): bool
    {
        return ($this->participants_limit === 0) || ($this->participants_limit > $this->participants_count);
    }
}
