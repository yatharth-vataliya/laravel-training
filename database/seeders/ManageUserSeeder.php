<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ManageUser;

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
