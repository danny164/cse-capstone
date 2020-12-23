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
                'faculty_name' => 'International School',
                'description' => '',
            ],
            [
                'id' => 2,
                'faculty_name' => 'The Faculty of Information Technology',
                'description' => '',
            ],
            [
                'id' => 3,
                'faculty_name' => 'The Faculty of Accountancy',
                'description' => '',
            ],
            [
                'id' => 4,
                'faculty_name' => 'The Faculty of Civil Engineering',
                'description' => '',
            ],
            [
                'id' => 5,
                'faculty_name' => 'The Faculty of Environmental and Chemical Engineering',
                'description' => '',
            ],
            [
                'id' => 6,
                'faculty_name' => 'The Faculty of Business Administration',
                'description' => '',
            ],
            [
                'id' => 7,
                'faculty_name' => 'The Faculty of Natural Sciences',
                'description' => '',
            ],
            [
                'id' => 8,
                'faculty_name' => 'Hospitality & Tourism Institute',
                'description' => '',
            ],
            [
                'id' => 9,
                'faculty_name' => 'Institute of Languages',
                'description' => '',
            ],
            [
                'id' => 10,
                'faculty_name' => 'The Faculty of Political Science',
                'description' => '',
            ],
            [
                'id' => 11,
                'faculty_name' => 'The Faculty of Medicine',
                'description' => '',
            ],
            [
                'id' => 12,
                'faculty_name' => 'The Faculty of Pharmacy',
                'description' => '',
            ],
            [
                'id' => 13,
                'faculty_name' => 'The Faculty of Nursing',
                'description' => '',
            ],
            [
                'id' => 14,
                'faculty_name' => 'The Faculty of Law',
                'description' => '',
            ],
            [
                'id' => 15,
                'faculty_name' => 'DTU Polytechnic',
                'description' => '',
            ],
            [
                'id' => 16,
                'faculty_name' => 'The Faculty of Electrical Engineering',
                'description' => '',
            ],
            [
                'id' => 17,
                'faculty_name' => 'The Faculty of Humanities and Social Sciences',
                'description' => '',
            ],
            [
                'id' => 18,
                'faculty_name' => 'eUniversity',
                'description' => '',
            ],
            [
                'id' => 19,
                'faculty_name' => 'The Faculty of Architecture',
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
