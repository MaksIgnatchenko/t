<?php
/**
 * Created by Aleksandr Zhukovskiy, Appus Studio LP on 01.02.2019
 */

use App\Modules\Users\User\Models\User;

class FixCountryNameSeeder extends \Illuminate\Database\Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        \App\Modules\Challenges\Models\Challenge::where('country', 'Saudi arabia')->update(['country' => 'Saudi Arabia']);
    }
}
