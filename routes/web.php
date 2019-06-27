<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function() {
//    $test = \Illuminate\Support\Facades\DB::query()
//        ->select(['challenge_id'])
//        ->fromSub(function($query) {
//            $query->select(['challenge_id'])->from('proofs')->groupBy('challenge_id');
//    }, 'proofs')->get();

//    $test = \Illuminate\Support\Facades\DB::query()
//        ->select([
//            'id',
////            'full_name',
//            DB::raw('DENSE_RANK() OVER(ORDER BY total_reward DESC) AS Position, total_reward'),
//
//        ])
//        ->fromSub(function($query) {
//            $query->select([
//                'challenges.id AS challenge_id',
//                'proofs.reward',
//                'users.id AS id',
//                'users.full_name AS full_name',
//                DB::raw('sum(reward) as total_reward'),
//            ])
//                ->from('challenges')
//                ->where('challenges.company_id', 27)
//                ->where('proofs.status', 'accepted')
//                ->where('users.is_registration_completed', true)
//                ->join('proofs', 'challenges.id', '=', 'proofs.challenge_id')
//                ->join('users', 'users.id', '=', 'proofs.user_id');
//        }, 'proofs')->groupBy('id')->get();

    $sub = DB::query()->select([
        DB::raw('sum(proofs.reward) as total_reward'),
        'proofs.user_id',
    ])
        ->from('challenges')
        ->where('challenges.company_id', 27)
        ->where('proofs.status', 'accepted')
        ->join('proofs', 'challenges.id', '=', 'proofs.challenge_id')
        ->groupBy('proofs.user_id');
    $test = \App\Modules\Users\User\Models\User::joinSub($sub, 'rewards', function($join) {
        $join->on('users.id', '=', 'rewards.user_id');
    })
        ->select([
            'rewards.total_reward',
            DB::raw('DENSE_RANK() OVER(ORDER BY rewards.total_reward DESC) AS Position, rewards.total_reward')
        ])
        ->get();


    dd($test);
});