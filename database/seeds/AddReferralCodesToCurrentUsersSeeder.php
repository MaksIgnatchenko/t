<?php
/**
 * Created by Aleksandr Zhukovskiy, Appus Studio LP on 01.02.2019
 */

use App\Modules\Users\User\Models\User;

class AddReferralCodesToCurrentUsersSeeder extends \Illuminate\Database\Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $users = User::whereNull('referral_code')->get();
        foreach($users as $user) {
            $user->calculateReferralCode();
            $user->save();
        }
    }
}
