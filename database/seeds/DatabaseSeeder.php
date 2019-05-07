<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(AdminTableSeeder::class);
//         $this->call(ContentTableSeeder::class);
         $this->call(AddReferralCodesToCurrentUsersSeeder::class);

//         factory(\App\Modules\Challenges\Models\Challenge::class, 200)->create();
    }
}
