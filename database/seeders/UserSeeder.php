<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'names' => 'Administrator',
            'lastnames' => 'Administrator',
            'email' => 'admin@admin.com',
            'sex' => 'male',
            'identification' => '281-admin-admin',
            'maritalStatus' => 'single',
            'phone' => '+00 0000 0000',
            'nationality' => 'Nicaragua',
            'municipality' => 'Leon',
            'address' => 'Direccion',
            'neighborhood' => 'Barrio',
            'birthday' => '1999-01-01',
            'password' => Hash::make('password')
        ]);

        User::create([
            'names' => 'Pepe juan',
            'lastnames' => 'Hernandez lopez',
            'email' => 'pepelopez@gmail.com',
            'sex' => 'male',
            'identification' => '281-5555-5555A',
            'maritalStatus' => 'married',
            'phone' => '+00 0000 0000',
            'nationality' => 'Nicaragua',
            'municipality' => 'Managua',
            'address' => 'Direccion',
            'neighborhood' => 'Barrio',
            'birthday' => '1999-04-21',
            'password' => Hash::make('password')
        ]);

        User::create([
            'names' => 'Rosa Maria',
            'lastnames' => 'Perez Alvarado',
            'email' => 'rosa111@gmail.com',
            'sex' => 'feminine',
            'identification' => '281-4455-77a77',
            'maritalStatus' => 'divorced',
            'phone' => '+00 0000 0000',
            'nationality' => 'Nicaragua',
            'municipality' => 'Managua',
            'address' => 'Direccion',
            'neighborhood' => 'Barrio',
            'birthday' => '1999-09-07',
            'password' => Hash::make('password')
        ]);
    }
}
