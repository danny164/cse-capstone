<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faculty;

class FacultyTableSeeder extends Seeder
{

    public function run()
    {
        $faculties = [
            [
                'id' => 1,
                'faculty_name' => 'The International School',
                'description' => '',
            ],
            [
                'id' => 2,
                'faculty_name' => 'The Faculty of Information Technology',
                'description' => '',
            ],
            [
                'id' => 3,
                'faculty_name' => 'The Graduate',
                'description' => '',
            ],
            [
                'id' => 4,
                'faculty_name' => 'The Faculty of Accountancy',
                'description' => '',
            ],
        ];

        try {
            foreach ($faculties as $faculty) {
                Faculty::create($faculty);
            }
        } catch (\Throwable $th) {

        }
    }
}
