<?php

namespace Database\Seeders;

use App\Models\ManageUser;
use Illuminate\Database\Seeder;

class ManageUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ManageUser::factory()->count(100)->create();
    }
}
