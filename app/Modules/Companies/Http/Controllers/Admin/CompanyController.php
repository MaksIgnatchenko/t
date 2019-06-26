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
use App\Modules\Content\Http\Requests\Admin\UpdateCompanyRequest;
use App\Services\ResponseBuilder\CustomResponseBuilder;
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
     * Display the specified resource.
     *
     * @param Company $company
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Company $company)
    {
        return view('company.show', ['company' => $company]);
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
        $company = app()[Company::class];
        $company->fill($request->all());
        $company->save();
        Flash::success('Company created successfully.');

        return redirect()->route('company.index');
    }

    /**
     * @param Company $company
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Company $company)
    {
        return view('company.edit', ['company' => $company]);
    }

    /**
     * @param UpdateCompanyRequest $request
     * @param Company $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $company->update($request->all());
        Flash::success('Company updated successfully.');

        return redirect()->route('company.index');
    }

    /**
     * @param Company $company
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function destroy(Company $company)
    {
        $company->delete();
        Flash::success('Company deleted successfully.');

        return CustomResponseBuilder::success();
    }
}