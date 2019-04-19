<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.02.19
 *
 */

namespace App\Modules\Challenges\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Challenges\Datatables\ChallengeDataTable;
use App\Modules\Challenges\DTO\CreateChallengeDTO;
use App\Modules\Challenges\DTO\EditChallengeDto;
use App\Modules\Challenges\DTO\ShowChallengeDTO;
use App\Modules\Challenges\Enums\CountryEnum;
use App\Modules\Challenges\Enums\ProofTypeEnum;
use App\Modules\Challenges\Enums\VideoLengthEnum;
use App\Modules\Challenges\Http\Requests\Admin\StoreChallengeRequest;
use App\Modules\Challenges\Http\Requests\Admin\UpdateChallengeRequest;
use App\Modules\Challenges\Models\Challenge;
use App\Modules\Challenges\Models\Company;
use Illuminate\Support\Carbon;
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
     * Display the specified resource.
     *
     * @param Challenge $challenge
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Challenge $challenge)
    {
        $dto = new ShowChallengeDTO($challenge);
        return view('challenge.show', ['dto' => $dto]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dto = $this->getCreateDto();
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

    /**
     * @param Challenge $challenge
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Challenge $challenge)
    {
        $dto = $this->getEditDto($challenge);
        return view('challenge.edit', ['dto' => $dto]);
    }

    /**
     * @param UpdateChallengeRequest $request
     * @param Challenge $challenge
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateChallengeRequest $request, Challenge $challenge)
    {
        $challenge->fill($request->all());
        $challenge->save();
        Flash::success('Challenge edited successfully.');
        return redirect()->route('challenge.index');
    }

    /**
     * @return CreateChallengeDTO
     */
    private function getCreateDto() : CreateChallengeDTO
    {
        $companies = Company::all()->pluck('name', 'id')->toArray();
        $countries = array_combine(CountryEnum::getAll(), CountryEnum::getAll());
        $proofTypes = array_combine(ProofTypeEnum::getAll(), ProofTypeEnum::getAll());
        $videoLengthTypes = array_combine(VideoLengthEnum::getAll(), VideoLengthEnum::getAll());
        return new CreateChallengeDTO($companies, $countries, $proofTypes, $videoLengthTypes);
    }

    /**
     * @param Challenge $challenge
     * @return CreateChallengeDTO
     */
    private function getEditDto(Challenge $challenge) : CreateChallengeDTO
    {
        $companies = Company::all()->pluck('name', 'id')->toArray();
        $countries = array_combine(CountryEnum::getAll(), CountryEnum::getAll());
        $proofTypes = array_combine(ProofTypeEnum::getAll(), ProofTypeEnum::getAll());
        $videoLengthTypes = array_combine(VideoLengthEnum::getAll(), VideoLengthEnum::getAll());
        return new EditChallengeDto($companies, $countries, $proofTypes, $videoLengthTypes, $challenge);
    }
}