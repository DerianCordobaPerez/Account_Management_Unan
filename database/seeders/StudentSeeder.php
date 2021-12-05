<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([
            'user_id' => 1,
            'studentMail' => 'admin@admin.net',
            'license' => '123456789',
            'career' => 'Admin',
            'yearOfCareer' => '10',
            'AcademicSituation' => 'Regular',
            'type' => 'Student',
            'enrollmentDate' => '2020-01-01',
            'studyPlan' => '2011'
        ]);

        Student::create([
            'user_id' => 2,
            'studentMail' => 'pepelopez@admin.net',
            'license' => '789456123',
            'career' => 'Ing Sistemas',
            'yearOfCareer' => '3',
            'AcademicSituation' => 'Regular',
            'type' => 'Student',
            'enrollmentDate' => '2020-12-09',
            'studyPlan' => '2019'
        ]);

        Student::create([
            'user_id' => 3,
            'studentMail' => 'rosa111@admin.net',
            'license' => '111222333',
            'career' => 'Derecho',
            'yearOfCareer' => '5',
            'AcademicSituation' => 'Good',
            'type' => 'Semi teacher',
            'enrollmentDate' => '2020-03-28',
            'studyPlan' => '2011'
        ]);
    }
}
