<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 15.04.19
 *
 */

namespace App\Modules\Feeds\Models;

use App\Models\BaseModel;
use Illuminate\Support\Facades\DB;

class Feed extends BaseModel
{
    /**
     * @param array $data
     */
    public static function insert(array $data) : void
    {
        DB::table('feeds')->insert($data);
    }
}