<?php
/**
 * Created by Aleksandr Zhukovskiy, Appus Studio LP on 01.02.2019
 */

use App\Modules\Users\User\Models\User;

class CalculateTotalRewardsForCurrentUsersSeeder extends \Illuminate\Database\Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $users = User::all();
        foreach($users as $user) {
            $user->total_reward = $user->proofs->sum('reward');
            $user->save();
        }
    }
}
