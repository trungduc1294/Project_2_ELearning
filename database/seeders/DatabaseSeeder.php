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
            ['name' => "Math"],
            ['name' => "Science"],
            ['name' => "History"],
            ['name' => "English"],
            ['name' => "Art"],
            ['name' => "Music"],
            ['name' => "Computer"],
            ['name' => "Other"],
        ]);

        DB::table('users')->insert([
            [
                'username' => 'trungduc1294',
                'email' => 'trungduc.1294@gmail.com',
                'password' => '123123',
                'role' => 'teacher',
            ],
            [
                'username' => 'trungduc2705',
                'email' => 'trungduc.2705@gmail.com',
                'password' => '123123',
                'role' => 'teacher',
            ],

            [
                'username' => 'std1',
                'email' => 'std1@gmail.com',
                'password' => '123123',
                'role' => 'student',
            ],
            [
                'username' => 'std2',
                'email' => 'std2@gmail.com',
                'password' => '123123',
                'role' => 'student',
            ],
            [
                'username' => 'std3',
                'email' => 'std3@gmail.com',
                'password' => '123123',
                'role' => 'student',
            ],
            [
                'username' => 'std4',
                'email' => 'std4@gmail.com',
                'password' => '123123',
                'role' => 'student',
            ],
            [
                'username' => 'std5',
                'email' => 'std5@gmail.com',
                'password' => '123123',
                'role' => 'student',
            ],
            [
                'username' => 'std6',
                'email' => 'std6@gmail.com',
                'password' => '123123',
                'role' => 'student',
            ],
            [
                'username' => 'std7',
                'email' => 'std7@gmail.com',
                'password' => '123123',
                'role' => 'student',
            ],
        ]);

    }
}
