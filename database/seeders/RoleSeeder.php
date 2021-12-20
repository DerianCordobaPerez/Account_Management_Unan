<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'admin', 'user_id' => 1],
            ['name' => 'user', 'user_id' => 2],
        ];

        foreach ($roles as $role)
            Role::create($role);
    }
}
