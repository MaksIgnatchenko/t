<?php
/**
 * Created by Andrei Podgornyi, Appus Studio LP on 08.10.2018
 */

namespace App\Modules\Users\User\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Users\User\Models\User;
use App\Modules\Users\User\DataTables\UserDataTable;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the Customer.
     *
     * @param UserDataTable $userDataTable
     * @return mixed
     */
    public function index(UserDataTable $userDataTable)
    {
        return $userDataTable->render('index');
    }

    /**
     * Display the specified Customer.
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function show(User $user)
    {
        return view('show')->with('user', $user);
    }

    /**
     * @param User $user
     * @return RedirectResponse
     */
    public function update(User $user) : RedirectResponse
    {
        $user->resetCoins();
        flash('Tickets have been reset');
        return redirect()->back();
    }

    /**
     * @return RedirectResponse
     */
    public function resetCoinsForAllUsers() : RedirectResponse
    {
        app()[User::class]->resetCoinsForAllUsers();
        flash('Tickets for all users have been reset');
        return redirect()->back();
    }
}
