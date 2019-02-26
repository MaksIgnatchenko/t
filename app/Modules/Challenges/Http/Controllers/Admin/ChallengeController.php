<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.02.19
 *
 */

namespace App\Modules\Challenges\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Challenges\Datatables\ChallengeDataTable;
use App\Modules\Challenges\DTO\ChallengeDTO;
use App\Modules\Challenges\Enums\CountryEnum;
use App\Modules\Challenges\Enums\ProofTypeEnum;
use App\Modules\Challenges\Http\Requests\Admin\StoreChallengeRequest;
use App\Modules\Challenges\Models\Challenge;
use App\Modules\Challenges\Models\Company;
use Laracasts\Flash\Flash;

class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ChallengeDataTable $dataTable
     * @return mixed
     */
    public function index(ChallengeDataTable $dataTable)
    {
        return $dataTable->render('challenge.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all()->pluck('name', 'id')->toArray();
        $countries = array_combine(CountryEnum::getAll(), CountryEnum::getAll());
        $proofTypes = array_combine(ProofTypeEnum::getAll(), ProofTypeEnum::getAll());
        $dto = new ChallengeDTO($companies, $countries, $proofTypes);
        return view('challenge.create', ['dto' => $dto]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreChallengeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChallengeRequest $request)
    {
        $challenge = app()[Challenge::class];
        $challenge->fill($request->all());
        $challenge->save();
        Flash::success('Challenge created successfully.');

        return redirect()->route('challenge.index');
    }
}