<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\phphRoles;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::truncate();

        Roles::create(['name' => 'Admin']);
        Roles::create(['name' => 'Author']);
        Roles::create(['name' => 'User']);
    }
}
