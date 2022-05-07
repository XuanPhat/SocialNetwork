<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('roles')->insert([
        //     'name_role' => 'user'
        // ]);
        // DB::table('roles')->insert([
        //     'name_role' => 'admin'
        // ]);
        // Role::create([
        //     'name_role' => 'user'
        // ]);
        Role::create([
            'name_role' => 'user'
        ]);
        Role::create([
            'name_role' => 'admin'
        ]);

    }
}
