<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 01.04.19
 *
 */

namespace App\Modules\Challenges\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Challenges\Datatables\ChallengeDataTableScope;
use App\Modules\Challenges\Datatables\ProofDataTable;
use App\Modules\Challenges\DTO\ShowProofDTO;
use App\Modules\Challenges\Http\Requests\Admin\UpdateProofRequest;
use App\Modules\Challenges\Models\Challenge;
use App\Modules\Challenges\Models\Proof;
use App\Modules\Challenges\Services\RedirectToNextProof;

class ProofController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ProofDataTable $dataTable
     * @param Challenge $challenge
     * @return mixed
     */
    public function index(ProofDataTable $dataTable, Challenge $challenge)
    {
        return $dataTable
            ->addScope(new ChallengeDataTableScope($challenge->id))
            ->render('proof.index');
    }

    /**
     * @param Challenge $challenge
     * @param Proof $proof
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Challenge $challenge, Proof $proof)
    {
        $proof->load('user');
        $dto = new ShowProofDTO($challenge, $proof);
        return view('proof.show', ['dto' => $dto]);
    }

    /**
     * @param UpdateProofRequest $request
     * @param Challenge $challenge
     * @param Proof $proof
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateProofRequest $request, Challenge $challenge, Proof $proof)
    {
        $proof->status = $request->status;
        $proof->save();
        $redirectService = new RedirectToNextProof($proof);
        return $redirectService->redirect();
    }
}