<?php
/**
 * Created by Andrei Podgornyi, Appus Studio LP on 08.10.2018
 */

namespace App\Modules\Users\User\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Users\User\Models\User;
use Illuminate\View\View;

class CustomerController extends Controller
{
    /**
     * Display a listing of the Customer.
     *
     * @param UserDataTable $customerDataTable
     * @return mixed
     */
    public function index(UserDataTable $customerDataTable)
    {
        return $customerDataTable->render('admin.index');
    }

    /**
     * Display the specified Customer.
     *
     * @param Customer $customer
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function show(User $user)
    {
        return view('admin.show')->with('user', $user);
    }
}
