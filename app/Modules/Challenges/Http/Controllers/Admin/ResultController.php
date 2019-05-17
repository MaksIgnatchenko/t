<?php

namespace App\Modules\Challenges\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Challenges\Datatables\ResultDataTable;
use App\Modules\Challenges\Datatables\ResultDataTableScope;
use App\Modules\Challenges\Models\Challenge;

class ResultController extends Controller
{
    /**
     * @param ResultDataTable $dataTable
     * @param Challenge $challenge
     * @return mixed
     */
    public function index(ResultDataTable $dataTable, Challenge $challenge)
    {
        return $dataTable
            ->addScope(new ResultDataTableScope($challenge->id))
            ->render('proof.index', ['challenge' => $challenge]);
    }
}