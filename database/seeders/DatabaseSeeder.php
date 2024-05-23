<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('categories')->insert([
            // ['name' => "Math"],
            // ['name' => "Science"],
            // ['name' => "History"],
            // ['name' => "English"],
            // ['name' => "Art"],
            // ['name' => "Music"],
            // ['name' => "Computer"],
            // ['name' => "Other"],

            ['name' => "Toán"],
            ['name' => "Văn"],
            ['name' => "Tiếng Anh"],
            ['name' => "Vật Lý"],
            ['name' => "Hoá"],
            ['name' => "Sinh"],
            ['name' => "Sử"],
            ['name' => "Địa"],
            ['name' => "GDCD"],
            ['name' => "Khác"],

        ]);

        DB::table('users')->insert([
            [
                'username' => 'headmaster',
                'email' => 'headmaster@gmail.com',
                'password' => '123123',
                'role' => 'headmaster',
                'rank_point' => 0,
            ],
            [
                'username' => 'trungduc1294',
                'email' => 'teacher1@gmail.com',
                'password' => '123123',
                'role' => 'teacher',
                'rank_point' => 0,
            ],
            [
                'username' => 'trungduc2705',
                'email' => 'teacher2@gmail.com',
                'password' => '123123',
                'role' => 'teacher',
                'rank_point' => 0,
            ],

            [
                'username' => 'std1',
                'email' => 'std1@gmail.com',
                'password' => '123123',
                'role' => 'student',
                'rank_point' => 0,
            ],
            [
                'username' => 'std2',
                'email' => 'std2@gmail.com',
                'password' => '123123',
                'role' => 'student',
                'rank_point' => 0,
            ],
            [
                'username' => 'std3',
                'email' => 'std3@gmail.com',
                'password' => '123123',
                'role' => 'student',
                'rank_point' => 0,
            ],
            [
                'username' => 'std4',
                'email' => 'std4@gmail.com',
                'password' => '123123',
                'role' => 'student',
                'rank_point' => 0,
            ],
            [
                'username' => 'std5',
                'email' => 'std5@gmail.com',
                'password' => '123123',
                'role' => 'student',
                'rank_point' => 0,
            ],
            [
                'username' => 'std6',
                'email' => 'std6@gmail.com',
                'password' => '123123',
                'role' => 'student',
                'rank_point' => 0,
            ],
            [
                'username' => 'std7',
                'email' => 'std7@gmail.com',
                'password' => '123123',
                'role' => 'student',
                'rank_point' => 0,
            ],
        ]);

        DB::table('courses')->insert([
            [
                'name' => "Basic Math with two variables and two equations",
                'description' => "This course will teach you how to solve a system of equations with two variables and two equations.",
                'category_id' => 1,
                'class'=>"10",
                'teacher_id' => 1,
                'number_of_lessons' => 0,
                'number_of_students' => 0,
                'duration' => 0,
            ],
            [
                'name' => "Learn Science with fun",
                'description' => "This course will teach you how to solve a system of equations with two variables and two equations.",
                'category_id' => 2,
                'class'=>"10",
                'teacher_id' => 1,
                'number_of_lessons' => 0,
                'number_of_students' => 0,
                'duration' => 0,
            ],
            [
                'name' => "History of the world",
                'description' => "This course will teach you how to solve a system of equations with two variables and two equations.",
                'category_id' => 3,
                'class'=>"11",
                'teacher_id' => 1,
                'number_of_lessons' => 0,
                'number_of_students' => 0,
                'duration' => 0,
            ],
            [
                'name' => "English for beginner",
                'description' => "This course will teach you how to solve a system of equations with two variables and two equations.",
                'category_id' => 4,
                'class'=>"12",
                'teacher_id' => 1,
                'number_of_lessons' => 0,
                'number_of_students' => 0,
                'duration' => 0,
            ],
            [
                'name' => "Learn how to draw architecture",
                'description' => "This course will teach you how to solve a system of equations with two variables and two equations.",
                'category_id' => 5,
                'class'=>"10",
                'teacher_id' => 1,
                'number_of_lessons' => 0,
                'number_of_students' => 0,
                'duration' => 0,
            ],
            [
                'name' => "Learn how to play guitar with fun",
                'description' => "This course will teach you how to solve a system of equations with two variables and two equations.",
                'category_id' => 6,
                'class'=>"11",
                'teacher_id' => 1,
                'number_of_lessons' => 0,
                'number_of_students' => 0,
                'duration' => 0,
            ],
            [
                'name' => "Python - The best programming language",
                'description' => "This course will teach you how to solve a system of equations with two variables and two equations.",
                'category_id' => 7,
                'class'=>"12",
                'teacher_id' => 1,
                'number_of_lessons' => 0,
                'number_of_students' => 0,
                'duration' => 0,
            ],
            [
                'name' => "How to be social with people",
                'description' => "This course will teach you how to solve a system of equations with two variables and two equations.",
                'category_id' => 8,
                'class'=>"12",
                'teacher_id' => 1,
                'number_of_lessons' => 0,
                'number_of_students' => 0,
                'duration' => 0,
            ],
        ]);

        
    }
}
