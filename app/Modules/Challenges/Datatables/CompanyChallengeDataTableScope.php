<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 27.06.19
 *
 */

namespace App\Modules\Challenges\Datatables;

use Yajra\DataTables\Contracts\DataTableScope;

class CompanyChallengeDataTableScope implements DataTableScope
{
    /**
     * @var int
     */
    private $companyId;

    /**
     * CompanyChallengeDataTableScope constructor.
     * @param int $companyId
     */
    public function __construct(int $companyId)
    {
        $this->companyId = $companyId;
    }

    /**
     * @param $query
     * @return mixed
     */
    public function apply($query)
    {
        return $query->where('company_id', $this->companyId);
    }
}