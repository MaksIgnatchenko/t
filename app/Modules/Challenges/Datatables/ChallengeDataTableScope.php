<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 02.04.19
 *
 */

namespace App\Modules\Challenges\Datatables;

use Yajra\DataTables\Contracts\DataTableScope;

class ChallengeDataTableScope implements DataTableScope
{
    /**
     * @var int
     */
    private $challengeId;

    /**
     * ChallengeDataTableScope constructor.
     * @param int $challengeId
     */
    public function __construct(int $challengeId)
    {
        $this->challengeId = $challengeId;
    }

    /**
     * @param $query
     * @return mixed
     */
    public function apply($query)
    {
        return $query->where('challenge_id', $this->challengeId);
    }
}