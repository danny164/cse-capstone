<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;


class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            [
                'id' => 1,
                'faculty_id' => 1,
                'department_name' => 'Software Engineering (CMU)',
                'description' => ''
            ],
            [
                'id' => 2,
                'faculty_id' => 1,
                'department_name' => 'Network Security (TMT)',
                'description' => ''
            ],
            [
                'id' => 3,
                'faculty_id' => 1,
                'department_name' => 'Information System (TTT)',
                'description' => ''
            ],
        ];

        try {
            foreach ($departments as $department) {
                Department::create($department);
            }
        } catch (\Throwable $th) {

        }
    }
}
