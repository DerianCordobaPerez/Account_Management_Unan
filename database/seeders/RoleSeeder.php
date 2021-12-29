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
            ['name' => 'cajero','user_id' => 2],
            ['name' => 'usuario', 'user_id' => 3]
        ];

        foreach ($roles as $role)
            Role::create($role);
    }
}
