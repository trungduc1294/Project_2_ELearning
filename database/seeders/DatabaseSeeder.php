<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
                'password' => Hash::make('123123'),
                'role' => 'headmaster',
                'rank_point' => 0,
            ],
            [
                'username' => 'Nguyễn Thị Thanh Nga', // GV Toán 
                'email' => 'teacher1@gmail.com',
                'password' => Hash::make('123123'),
                'role' => 'teacher',
                'rank_point' => 0,
            ],
            [
                'username' => 'Vũ Văn Trung', // GV Văn 
                'email' => 'teacher2@gmail.com',
                'password' => Hash::make('123123'),
                'role' => 'teacher',
                'rank_point' => 0,
            ],
            [
                'username' => 'Nguyễn Thị Hảo', // GV Anh 
                'email' => 'teacher3@gmail.com',
                'password' => Hash::make('123123'),
                'role' => 'teacher',
                'rank_point' => 0,
            ],
            [
                'username' => 'Nguyễn Thị Dung', // GV Địa 
                'email' => 'teacher4@gmail.com',
                'password' => Hash::make('123123'),
                'role' => 'teacher',
                'rank_point' => 0,
            ],
            [
                'username' => 'Vũ Thị Thu', // GV Sử 
                'email' => 'teacher5@gmail.com',
                'password' => Hash::make('123123'),
                'role' => 'teacher',
                'rank_point' => 0,
            ],
            [
                'username' => 'Hồ Quang Quân', // GV Sinh 
                'email' => 'teacher6@gmail.com',
                'password' => Hash::make('123123'),
                'role' => 'teacher',
                'rank_point' => 0,
            ],
            [
                'username' => 'Đỗ Ngọc Hà', // GV Lý 
                'email' => 'teacher7@gmail.com',
                'password' => Hash::make('123123'),
                'role' => 'teacher',
                'rank_point' => 0,
            ],
            [
                'username' => 'Nguyễn Tiến Dũng', // GV Hoá
                'email' => 'teacher8@gmail.com',
                'password' => Hash::make('123123'),
                'role' => 'teacher',
                'rank_point' => 0,
            ],
            [
                'username' => 'Hoàng Hà Trung Đức',
                'email' => 'std1@gmail.com',
                'password' => Hash::make('123123'),
                'role' => 'student',
                'rank_point' => 12000,
            ],
            [
                'username' => 'Hoàng Nhật Mịnh',
                'email' => 'std2@gmail.com',
                'password' => Hash::make('123123'),
                'role' => 'student',
                'rank_point' => 5000,
            ],
            [
                'username' => 'Ngô Thị Lê',
                'email' => 'std3@gmail.com',
                'password' => Hash::make('123123'),
                'role' => 'student',
                'rank_point' => 2000,
            ],
            [
                'username' => 'Vũ Xuân Nam',
                'email' => 'std4@gmail.com',
                'password' => Hash::make('123123'),
                'role' => 'student',
                'rank_point' => 0,
            ],
            [
                'username' => 'Trần Quang Huy',
                'email' => 'std5@gmail.com',
                'password' => Hash::make('123123'),
                'role' => 'student',
                'rank_point' => 0,
            ],
            [
                'username' => 'Đỗ Quốc Bảo',
                'email' => 'std6@gmail.com',
                'password' => Hash::make('123123'),
                'role' => 'student',
                'rank_point' => 0,
            ],
            [
                'username' => 'Hà Thị Lê',
                'email' => 'std7@gmail.com',
                'password' => Hash::make('123123'),
                'role' => 'student',
                'rank_point' => 0,
            ],
        ]);

        DB::table('courses')->insert([
            [
                'name' => "Đại số 10",
                'description' => "Học tập với môn đại số lớp 10 thật đơn giản qua các bài học thú vị.",
                'category_id' => 1,
                'class'=>"10",
                'teacher_id' => 2,
                'number_of_lessons' => 0,
                'number_of_students' => 0,
                'duration' => 0,
            ],
            [
                'name' => "Hình học 10",
                'description' => "Học tập với môn hình học lớp 10 thật đơn giản qua các bài học thú vị.",
                'category_id' => 1,
                'class'=>"10",
                'teacher_id' => 2,
                'number_of_lessons' => 0,
                'number_of_students' => 0,
                'duration' => 0,
            ],
            [
                'name' => "Toán không gian 11",
                'description' => "Toán không gian 11 thật đơn giản qua các bài học thú vị.",
                'category_id' => 1,
                'class'=>"10",
                'teacher_id' => 2,
                'number_of_lessons' => 0,
                'number_of_students' => 0,
                'duration' => 0,
            ],
            [
                'name' => "Ngữ Văn 10",
                'description' => "Văn học lớp 10 THPT Anh Sơn 1",
                'category_id' => 2,
                'class'=>"10",
                'teacher_id' => 3,
                'number_of_lessons' => 0,
                'number_of_students' => 0,
                'duration' => 0,
            ],
            [
                'name' => "Ngữ Văn 12",
                'description' => "Tác phẩm văn học nghệ thuật lớp 12",
                'category_id' => 2,
                'class'=>"10",
                'teacher_id' => 3,
                'number_of_lessons' => 0,
                'number_of_students' => 0,
                'duration' => 0,
            ],
            [
                'name' => "Tiếng Anh 10",
                'description' => "Tiếng Anh lớp 10 cô Hảo. Học từ vựng, ngữ pháp, kỹ năng nghe, nói, đọc, viết.",
                'category_id' => 3,
                'class'=>"10",
                'teacher_id' => 4,
                'number_of_lessons' => 0,
                'number_of_students' => 0,
                'duration' => 0,
            ],
            [
                'name' => "Tiếng Anh 11",
                'description' => "Tiếng Anh lớp 11 cô Hảo. Học từ vựng, ngữ pháp, kỹ năng nghe, nói, đọc, viết.",
                'category_id' => 3,
                'class'=>"10",
                'teacher_id' => 4,
                'number_of_lessons' => 0,
                'number_of_students' => 0,
                'duration' => 0,
            ],
            [
                'name' => "Tiếng Anh 12",
                'description' => "Tiếng Anh lớp 12 cô Hảo. Học từ vựng, ngữ pháp, kỹ năng nghe, nói, đọc, viết.",
                'category_id' => 3,
                'class'=>"10",
                'teacher_id' => 4,
                'number_of_lessons' => 0,
                'number_of_students' => 0,
                'duration' => 0,
            ],
            [
                'name' => "Vật lý 12",
                'description' => "Vật lý lớp 12. Học về các khái niệm cơ bản, các dạng bài tập thường gặp.",
                'category_id' => 4,
                'class'=>"12",
                'teacher_id' => 8,
                'number_of_lessons' => 0,
                'number_of_students' => 0,
                'duration' => 0,
            ],
            [
                'name' => "Vật lý 11",
                'description' => "Vật lý lớp 11. Học về các khái niệm cơ bản, các dạng bài tập thường gặp.",
                'category_id' => 4,
                'class'=>"12",
                'teacher_id' => 8,
                'number_of_lessons' => 0,
                'number_of_students' => 0,
                'duration' => 0,
            ],
            [
                'name' => "Vật lý 10",
                'description' => "Vật lý lớp 10. Học về các khái niệm cơ bản, các dạng bài tập thường gặp.",
                'category_id' => 4,
                'class'=>"12",
                'teacher_id' => 8,
                'number_of_lessons' => 0,
                'number_of_students' => 0,
                'duration' => 0,
            ],
            [
                'name' => "Vật lý ôn thi THPTQG",
                'description' => "Ôn tập thi THPTQG 2024",
                'category_id' => 4,
                'class'=>"12",
                'teacher_id' => 8,
                'number_of_lessons' => 0,
                'number_of_students' => 0,
                'duration' => 0,
            ],
            [
                'name' => "Hóa học 12",
                'description' => "Hóa học lớp 12. Học về các khái niệm cơ bản, các dạng bài tập thường gặp.",
                'category_id' => 5,
                'class'=>"12",
                'teacher_id' => 9,
                'number_of_lessons' => 0,
                'number_of_students' => 0,
                'duration' => 0,
            ],
            [
                'name' => "Hóa hữu cơ 11",
                'description' => "Hóa học hữu cơ. Học về các khái niệm cơ bản, các dạng bài tập thường gặp.",
                'category_id' => 5,
                'class'=>"12",
                'teacher_id' => 9,
                'number_of_lessons' => 0,
                'number_of_students' => 0,
                'duration' => 0,
            ],
            [
                'name' => "Hóa vô cơ 11",
                'description' => "Hóa học lớp 11. Học về các khái niệm cơ bản, các dạng bài tập thường gặp.",
                'category_id' => 5,
                'class'=>"12",
                'teacher_id' => 9,
                'number_of_lessons' => 0,
                'number_of_students' => 0,
                'duration' => 0,
            ],
            [
                'name' => "Lich sử 11",
                'description' => "Lịch sử lớp 11. Học về các khái niệm cơ bản, các dạng bài tập thường gặp.",
                'category_id' => 7,
                'class'=>"11",
                'teacher_id' => 6,
                'number_of_lessons' => 0,
                'number_of_students' => 0,
                'duration' => 0,
            ],
            [
                'name' => "Ôn thi THPTQG Lịch sử",
                'description' => "Lịch sử lớp 12. Học về các khái niệm cơ bản, các dạng bài tập thường gặp.",
                'category_id' => 7,
                'class'=>"11",
                'teacher_id' => 6,
                'number_of_lessons' => 0,
                'number_of_students' => 0,
                'duration' => 0,
            ],
            [
                'name' => "Sinh học 12",
                'description' => "Sinh học lớp 12. Học về các khái niệm cơ bản, các dạng bài tập thường gặp.",
                'category_id' => 6,
                'class'=>"12",
                'teacher_id' => 7,
                'number_of_lessons' => 0,
                'number_of_students' => 0,
                'duration' => 0,
            ],
            [
                'name' => "Sinh học 11",
                'description' => "Sinh học lớp 11. Học về các khái niệm cơ bản, các dạng bài tập thường gặp.",
                'category_id' => 6,
                'class'=>"12",
                'teacher_id' => 7,
                'number_of_lessons' => 0,
                'number_of_students' => 0,
                'duration' => 0,
            ],
            [
                'name' => "Địa lý 11",
                'description' => "Địa lý lớp 11. Học về các khái niệm cơ bản, các dạng bài tập thường gặp.",
                'category_id' => 8,
                'class'=>"11",
                'teacher_id' => 5,
                'number_of_lessons' => 0,
                'number_of_students' => 0,
                'duration' => 0,
            ],
            [
                'name' => "Địa lý 12",
                'description' => "Địa lý lớp 12. Học về các khái niệm cơ bản, các dạng bài tập thường gặp.",
                'category_id' => 8,
                'class'=>"11",
                'teacher_id' => 5,
                'number_of_lessons' => 0,
                'number_of_students' => 0,
                'duration' => 0,
            ],
            [
                'name' => "Địa lý 10",
                'description' => "Địa lý lớp 10. Học về các khái niệm cơ bản, các dạng bài tập thường gặp.",
                'category_id' => 8,
                'class'=>"11",
                'teacher_id' => 5,
                'number_of_lessons' => 0,
                'number_of_students' => 0,
                'duration' => 0,
            ],
        ]);

        
    }
}
