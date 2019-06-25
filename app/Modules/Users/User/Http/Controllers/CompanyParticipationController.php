<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.06.19
 *
 */

namespace App\Modules\Users\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Challenges\Models\Company;
use App\Modules\Users\User\Http\Requests\JoinCompanyRequest;
use App\Services\ResponseBuilder\CustomResponseBuilder;
use Illuminate\Support\Facades\Auth;

class CompanyParticipationController extends Controller
{
    public function __invoke(JoinCompanyRequest $request)
    {
        $companyJoinCode = $request->get('company_join_code');
        $company = app(Company::class)->getCompanyByJoinCode($companyJoinCode);
        $user = Auth::user();
        $user->company_id = $company->id;
        $user->save();
        return CustomResponseBuilder::success();
    }
}