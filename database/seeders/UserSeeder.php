<?php

namespace Database\Seeders;

use App\Models\User;
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
            'identification' => '281-5555-5555',
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

        User::create([
            'names' => 'Bryan Timador',
            'lastnames' => 'Perez Alvarado',
            'email' => 'rosa11@gmail.com',
            'sex' => 'feminine',
            'identification' => '281-4455-77a7',
            'maritalStatus' => 'divorced',
            'phone' => '+00 0000 0000',
            'nationality' => 'Nicaragua',
            'municipality' => 'Managua',
            'address' => 'Direccion',
            'neighborhood' => 'Barrio',
            'birthday' => '1999-09-07',
            'password' => Hash::make('password')
        ]);

        User::create([
            'names' => 'Eddy Urbina',
            'lastnames' => 'Perez Alvarado',
            'email' => 'ros111@gmail.com',
            'sex' => 'feminine',
            'identification' => '281-4455-77a',
            'maritalStatus' => 'divorced',
            'phone' => '+00 0000 0000',
            'nationality' => 'Nicaragua',
            'municipality' => 'Managua',
            'address' => 'Direccion',
            'neighborhood' => 'Barrio',
            'birthday' => '1999-09-07',
            'password' => Hash::make('password')
        ]);

        User::create([
            'names' => 'Glenda la del viatico',
            'lastnames' => 'Perez Alvarado',
            'email' => 'rosa@gmail.com',
            'sex' => 'feminine',
            'identification' => '281-4455-77',
            'maritalStatus' => 'divorced',
            'phone' => '+00 0000 0000',
            'nationality' => 'Nicaragua',
            'municipality' => 'Managua',
            'address' => 'Direccion',
            'neighborhood' => 'Barrio',
            'birthday' => '1999-09-07',
            'password' => Hash::make('password')
        ]);

        User::create([
            'names' => 'Cabeza de chimbomba numero 31',
            'lastnames' => 'Perez Alvarado',
            'email' => '111@gmail.com',
            'sex' => 'feminine',
            'identification' => '281-4455-7',
            'maritalStatus' => 'divorced',
            'phone' => '+00 0000 0000',
            'nationality' => 'Nicaragua',
            'municipality' => 'Managua',
            'address' => 'Direccion',
            'neighborhood' => 'Barrio',
            'birthday' => '1999-09-07',
            'password' => Hash::make('password')
        ]);

        User::create([
            'names' => 'Frente de trailer',
            'lastnames' => 'Perez Alvarado',
            'email' => 'r@gmail.com',
            'sex' => 'feminine',
            'identification' => '281-4455-',
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
