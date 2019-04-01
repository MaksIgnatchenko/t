<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 01.04.19
 *
 */

namespace App\Modules\Challenges\Http\Controllers\Admin;

use App\Modules\Challenges\Datatables\ProofDataTable;

class ProofController
{
    /**
     * Display a listing of the resource.
     *
     * @param ProofDataTable $dataTable
     * @return mixed
     */
    public function index(ProofDataTable $dataTable)
    {
//        $dataTable->addScopes();
        return $dataTable->render('proof.index');
    }
}