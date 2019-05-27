<?php
/**
 * Created by Aleksandr Zhukovskiy, Appus Studio LP on 01.02.2019
 */

use App\Modules\Users\User\Models\User;

class ResetUsersPasswordsSeeder extends \Illuminate\Database\Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        \Illuminate\Support\Facades\DB::table('users')->update(['password' => \Illuminate\Support\Facades\Hash::make('Password1')]);
    }
}
