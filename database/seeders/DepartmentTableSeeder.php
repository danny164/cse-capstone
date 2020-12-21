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
                'department_name' => 'Management Information Systems (CMU)',
                'description' => ''
            ],
            [
                'id' => 3,
                'faculty_id' => 1,
                'department_name' => 'Network Engineering (CMU)',
                'description' => ''
            ],
            [
                'id' => 4,
                'faculty_id' => 1,
                'department_name' => 'Business Administration (PSU)',
                'description' => ''
            ],
            [
                'id' => 5,
                'faculty_id' => 1,
                'department_name' => 'Accounting (PSU)',
                'description' => ''
            ],
            [
                'id' => 6,
                'faculty_id' => 1,
                'department_name' => 'Finance & Banking (PSU)',
                'description' => ''
            ],
            [
                'id' => 7,
                'faculty_id' => 1,
                'department_name' => 'Civil Engineering (CSU)',
                'description' => ''
            ],
            [
                'id' => 8,
                'faculty_id' => 1,
                'department_name' => 'Architecture (CSU)',
                'description' => ''
            ],

            [
                'id' => 9,
                'faculty_id' => 2,
                'department_name' => 'Information Security',
                'description' => ''
            ],
            [
                'id' => 10,
                'faculty_id' => 2,
                'department_name' => 'Computer Science',
                'description' => ''
            ],
            [
                'id' => 11,
                'faculty_id' => 2,
                'department_name' => 'Big Data & Machine Learning',
                'description' => ''
            ],
            [
                'id' => 12,
                'faculty_id' => 2,
                'department_name' => 'Artificial Intelligence',
                'description' => ''
            ],
            [
                'id' => 13,
                'faculty_id' => 3,
                'department_name' => 'Auditing',
                'description' => ''
            ],
            [
                'id' => 14,
                'faculty_id' => 3,
                'department_name' => 'Corporate Accounting',
                'description' => ''
            ],
            [
                'id' => 15,
                'faculty_id' => 3,
                'department_name' => 'Taxation and Tax Consultancy',
                'description' => ''
            ],
            [
                'id' => 16,
                'faculty_id' => 3,
                'department_name' => 'State Accounting',
                'description' => ''
            ],
            [
                'id' => 17,
                'faculty_id' => 3,
                'department_name' => 'Management Accounting (HP)',
                'description' => ''
            ],
            [
                'id' => 18,
                'faculty_id' => 4,
                'department_name' => 'Civil & Industrial Engineering',
                'description' => ''
            ],
            [
                'id' => 19,
                'faculty_id' => 4,
                'department_name' => 'Road & Bridge Construction',
                'description' => ''
            ],
            [
                'id' => 20,
                'faculty_id' => 4,
                'department_name' => 'Construction Engineering Management',
                'description' => ''
            ],
            [
                'id' => 21,
                'faculty_id' => 5,
                'department_name' => 'Environmental Technology and Engineering',
                'description' => ''
            ],
            [
                'id' => 22,
                'faculty_id' => 5,
                'department_name' => 'Natural Resources and Environmental Management',
                'description' => ''
            ],
            [
                'id' => 23,
                'faculty_id' => 5,
                'department_name' => 'Food Industry',
                'description' => ''
            ],
            [
                'id' => 24,
                'faculty_id' => 5,
                'department_name' => 'Travel Resource Management',
                'description' => ''
            ],
            [
                'id' => 25,
                'faculty_id' => 6,
                'department_name' => 'Marketing',
                'description' => ''
            ],
            [
                'id' => 26,
                'faculty_id' => 6,
                'department_name' => 'Business Administration',
                'description' => ''
            ],
            [
                'id' => 27,
                'faculty_id' => 6,
                'department_name' => 'Foreign Trade',
                'description' => ''
            ],
            [
                'id' => 28,
                'faculty_id' => 6,
                'department_name' => 'Commerce',
                'description' => ''
            ],
            [
                'id' => 29,
                'faculty_id' => 6,
                'department_name' => 'Corporate Finance',
                'description' => ''
            ],
            [
                'id' => 30,
                'faculty_id' => 6,
                'department_name' => 'Banking',
                'description' => ''
            ],
            [
                'id' => 31,
                'faculty_id' => 6,
                'department_name' => 'Office Management',
                'description' => ''
            ],
            [
                'id' => 32,
                'faculty_id' => 6,
                'department_name' => 'Human Resources Management',
                'description' => ''
            ],
            [
                'id' => 33,
                'faculty_id' => 6,
                'department_name' => 'Logistics and Supply Chain Management',
                'description' => ''
            ],
            [
                'id' => 34,
                'faculty_id' => 6,
                'department_name' => 'Real Estate Business Management',
                'description' => ''
            ],
            [
                'id' => 35,
                'faculty_id' => 6,
                'department_name' => 'Digital Business',
                'description' => ''
            ],
            [
                'id' => 36,
                'faculty_id' => 6,
                'department_name' => 'Corporate Management',
                'description' => ''
            ],
            [
                'id' => 37,
                'faculty_id' => 6,
                'department_name' => 'Financial Management (HP)',
                'description' => ''
            ],
            [
                'id' => 38,
                'faculty_id' => 6,
                'department_name' => 'Marketing and Strategic Management (HP)',
                'description' => ''
            ],
            [
                'id' => 39,
                'faculty_id' => 8,
                'department_name' => 'Tourism & Hospitality Management',
                'description' => ''
            ],
            [
                'id' => 40,
                'faculty_id' => 8,
                'department_name' => 'Tourism & Travel Management',
                'description' => ''
            ],
            [
                'id' => 41,
                'faculty_id' => 8,
                'department_name' => 'Tourism & Hospitality Management (PSU)',
                'description' => ''
            ],
            [
                'id' => 42,
                'faculty_id' => 8,
                'department_name' => 'Tourism & Travel Management (PSU)',
                'description' => ''
            ],
            [
                'id' => 43,
                'faculty_id' => 8,
                'department_name' => 'Tourism & Restaurant Management (PSU)',
                'description' => ''
            ],
            [
                'id' => 44,
                'faculty_id' => 8,
                'department_name' => 'Events and Entertainment Management',
                'description' => ''
            ],
            [
                'id' => 45,
                'faculty_id' => 9,
                'department_name' => 'English for Interpretation & Translation',
                'description' => ''
            ],
            [
                'id' => 46,
                'faculty_id' => 9,
                'department_name' => 'English for Hospitality & Tourism',
                'description' => ''
            ],
            [
                'id' => 47,
                'faculty_id' => 9,
                'department_name' => 'Chinese Language',
                'description' => ''
            ],
            [
                'id' => 48,
                'faculty_id' => 9,
                'department_name' => 'Korean language',
                'description' => ''
            ],
            [
                'id' => 49,
                'faculty_id' => 11,
                'department_name' => 'General Practitioner',
                'description' => ''
            ],
            [
                'id' => 50,
                'faculty_id' => 11,
                'department_name' => 'Doctor of Odonto-Stomatology',
                'description' => ''
            ],
            [
                'id' => 51,
                'faculty_id' => 12,
                'department_name' => 'Pharmacology',
                'description' => ''
            ],
            [
                'id' => 52,
                'faculty_id' => 13,
                'department_name' => 'General Nursing',
                'description' => ''
            ],
            [
                'id' => 53,
                'faculty_id' => 14,
                'department_name' => 'Economic Law',
                'description' => ''
            ],
            [
                'id' => 54,
                'faculty_id' => 14,
                'department_name' => 'The Major of Law',
                'description' => ''
            ],
            [
                'id' => 55,
                'faculty_id' => 15,
                'department_name' => 'Hotel Management',
                'description' => ''
            ],
            [
                'id' => 56,
                'faculty_id' => 15,
                'department_name' => 'Accounting',
                'description' => ''
            ],
            [
                'id' => 57,
                'faculty_id' => 15,
                'department_name' => 'Software Application',
                'description' => ''
            ],
            [
                'id' => 58,
                'faculty_id' => 16,
                'department_name' => 'Embedded Systems',
                'description' => ''
            ],
            [
                'id' => 59,
                'faculty_id' => 16,
                'department_name' => 'Electrical Automation',
                'description' => ''
            ],
            [
                'id' => 60,
                'faculty_id' => 16,
                'department_name' => 'Telecommunication',
                'description' => ''
            ],
            [
                'id' => 61,
                'faculty_id' => 16,
                'department_name' => 'Mechatronics (PNU)',
                'description' => ''
            ],
            [
                'id' => 62,
                'faculty_id' => 16,
                'department_name' => 'Electrical Engineering (PNU)',
                'description' => ''
            ],
            [
                'id' => 63,
                'faculty_id' => 16,
                'department_name' => 'Automotive Engineering Technology',
                'description' => ''
            ],
            [
                'id' => 64,
                'faculty_id' => 17,
                'department_name' => 'Literature & Journalism',
                'description' => ''
            ],
            [
                'id' => 65,
                'faculty_id' => 17,
                'department_name' => 'Tourism Culture',
                'description' => ''
            ],
            [
                'id' => 66,
                'faculty_id' => 17,
                'department_name' => 'International Relations',
                'description' => ''
            ],
            [
                'id' => 67,
                'faculty_id' => 17,
                'department_name' => 'Multimedia Communications',
                'description' => ''
            ],
            [
                'id' => 68,
                'faculty_id' => 17,
                'department_name' => 'Tourism Culture of Vietnam HP',
                'description' => ''
            ],
            [
                'id' => 69,
                'faculty_id' => 18,
                'department_name' => 'Information Technology',
                'description' => ''
            ],
            [
                'id' => 70,
                'faculty_id' => 18,
                'department_name' => 'Finance & Banking',
                'description' => ''
            ],
            [
                'id' => 71,
                'faculty_id' => 18,
                'department_name' => 'Civil and Industrial Construction',
                'description' => ''
            ],
            [
                'id' => 72,
                'faculty_id' => 18,
                'department_name' => 'Business Administration',
                'description' => ''
            ],
            [
                'id' => 73,
                'faculty_id' => 18,
                'department_name' => 'Economics Law',
                'description' => ''
            ],
            [
                'id' => 74,
                'faculty_id' => 18,
                'department_name' => 'English Language',
                'description' => ''
            ],
            [
                'id' => 75,
                'faculty_id' => 18,
                'department_name' => 'Accounting',
                'description' => ''
            ],
            [
                'id' => 76,
                'faculty_id' => 19,
                'department_name' => 'Architecture',
                'description' => ''
            ],
            [
                'id' => 77,
                'faculty_id' => 19,
                'department_name' => 'Interior Design',
                'description' => ''
            ],
            [
                'id' => 78,
                'faculty_id' => 19,
                'department_name' => 'Graphic Design',
                'description' => ''
            ],
            [
                'id' => 79,
                'faculty_id' => 19,
                'department_name' => 'Architectural Heritage Conservation',
                'description' => ''
            ],
            [
                'id' => 80,
                'faculty_id' => 19,
                'department_name' => 'Fashion Design',
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
