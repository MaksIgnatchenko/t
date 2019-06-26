<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.06.19
 *
 */

namespace App\Modules\Companies\Observers;

use App\Modules\Challenges\Models\Company;

class CompanyObserver
{
    /**
     * Handle the Company "creating" event.
     *
     * @param Company $company
     */
    public function creating(Company $company)
    {
        $company->generateUniqueJoinPassword();
    }

    /**
     * Handle the Company "deleting" event.
     *
     * @param Company $company
     */
    public function deleting(Company $company)
    {
        $company->detachCompanies();
        $company->detachUsers();
    }
}