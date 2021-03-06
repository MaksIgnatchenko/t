<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 29.03.19
 *
 */

namespace App\Modules\Challenges\Models;

use App\Modules\Challenges\Enums\ProofStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Proof extends Model
{
    /**
     * @var array
     */
    private $files = null;

    /**
     * @var array
     */
    public $fillable = [
        'challenge_id',
        'user_id',
        'type',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'items' => 'array',
    ];

    /**
     * @param $value
     * @return array
     */
    public function getItemsAttribute($value) : array
    {
        $rawItems = \GuzzleHttp\json_decode($value, true);
        $items = [];
        foreach ($rawItems as $item) {
            $items[] = Storage::url($item);
        }
        return $items;
    }

    /**
     * @param array $files
     */
    public function fillFiles(array $files) : void
    {
        $this->files = $files;
    }

    /**
     * @return array|null
     */
    public function getFiles() : ?array
    {
        return $this->files;
    }

    /**
     * @return bool
     */
    public function isAbleForDeletion() : bool
    {
        return in_array($this->status, ProofStatusEnum::getAbleForDeletionStatuses());
    }
}