<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 26.02.19
 *
 */

namespace App\Modules\Companies\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Challenges\Models\Company;
use App\Modules\Companies\Datatables\CompanyDataTable;
use App\Modules\Content\Http\Requests\Admin\StoreCompanyRequest;
use Laracasts\Flash\Flash;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param CompanyDataTable $dataTable
     * @return mixed
     */
    public function index(CompanyDataTable $dataTable)
    {
        return $dataTable->render('company.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCompanyRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        $category = app()[Company::class];
        $category->fill($request->all());
        $category->save();
        Flash::success('Company created successfully.');

        return redirect()->route('company.index');
    }
}