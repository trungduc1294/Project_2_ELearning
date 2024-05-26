### Livewire Life Cycle

1. Tạo router cho page
Ví dụ:
`Route::any('/teacher/quiz-manage', [TeacherQuiz::class, 'index'])->name('quiz-manage');`

2. Vào controller xử lý và gửi những dữ liệu cần gửi vào page
public function index()
    {
        return view('pages.teacher.quiz.page-teacher-quiz', [
            'title' => 'Quiz Manage'
        ]);
    }

3. Vào view page gọi đến livewire
`@livewire('quiz-manage', ['title' => $title])`

4. Vào livewire controller nhận $title và xử lý
`public $title;`

5. Vào livewire blade có thể nhận được data

========================================================================================
@if (session()->has('error'))
    <div class="error">
        <span>{{ session('error') }}</span>
    </div>
@endif



### Cách sử dụng jdoodle API
1. Đăng ký nhận API Key từ JDoodle1.
Đăng ký và nhận API key từ JDoodle
Trước tiên, bạn cần đăng ký một tài khoản tại JDoodle và nhận API key từ trang quản lý API.

2. Cài đặt Laravel và Livewire
Nếu chưa có dự án Laravel, bạn có thể tạo mới một dự án Laravel và cài đặt Livewire:

3. Cấu hình Laravel Livewire
Cấu hình Livewire trong Laravel bằng cách thêm Livewire vào resources/views/layouts/app.blade.php:
```
<!DOCTYPE html>
<html>
<head>
    <title>Online Code Editor</title>
    @livewireStyles
</head>
<body>
    @yield('content')

    @livewireScripts
</body>
</html>
```

4. Tạo component Livewire cho Code Editor
Tạo một component Livewire để quản lý việc nhập code và gọi API JDoodle.
`php artisan make:livewire CodeEditor`

Sửa app/Http/Livewire/CodeEditor.php:
```
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class CodeEditor extends Component
{
    public $code;
    public $output;

    public function runCode()
    {
        $response = Http::post('https://api.jdoodle.com/v1/execute', [
            'clientId' => 'YOUR_CLIENT_ID',
            'clientSecret' => 'YOUR_CLIENT_SECRET',
            'script' => $this->code,
            'language' => 'python3',  // Bạn có thể thay đổi ngôn ngữ ở đây
            'versionIndex' => '3',
        ]);

        $this->output = $response->json()['output'] ?? 'Error';
    }

    public function render()
    {
        return view('livewire.code-editor');
    }
}
```
5. Tạo giao diện cho Code Editor
Tạo file resources/views/livewire/code-editor.blade.php:

```
<div>
    <textarea wire:model="code" style="width: 100%; height: 300px;"></textarea>
    <button wire:click="runCode">Run Code</button>
    <pre>{{ $output }}</pre>
</div>
```

6. Sử dụng component Livewire trong view
Cập nhật resources/views/welcome.blade.php để sử dụng component Livewire:

```
@extends('layouts.app')

@section('content')
    <livewire:code-editor />
@endsection
```

7. Cấu hình môi trường
Thêm các biến môi trường vào .env:

```
JD_CLIENT_ID=your_client_id
JD_CLIENT_SECRET=your_client_secret
```
Và cập nhật app/Http/Livewire/CodeEditor.php để sử dụng các biến này:

```
$response = Http::post('https://api.jdoodle.com/v1/execute', [
    'clientId' => env('JD_CLIENT_ID'),
    'clientSecret' => env('JD_CLIENT_SECRET'),
    'script' => $this->code,
    'language' => 'python3',
    'versionIndex' => '3',
]);
```


#### TODO chung

- sửa lại quizz (không chuyển đến câu tiếp theo)
- Nâng cấp code complier . lỗi complie 1 lần thì editor mất

- Sửa lại phòng học trực tuyến 
    + lưu code phòng meeting vào db khi giáo viên tạo meeting, hiển thị cho phía học sinh
    + sửa hiển thị camera, mic và sharea màn hinh


<!-- - quên mật khẩu (vấn đề email) -->
<!-- - Phần thống kê menu -->
<!-- - Theem discovery theo lop -->
<!-- - Thay ảnh khi chưa có video cho lesson -->
<!-- - Diễn đàn -->
<!-- - Taoj trang dien dan chi tiet, comment, like -->
- Tạo trang 404
- Bang xep hang trong account
- Update account image

- Trang tai lieu hoc tap cho moi lesson (option)

<!-- - course-card info min-h-[180px] -->

<!-- - Them loading khi upload video -->
<!-- - Tích hợp thêm alert cho các thông báo -->



## Teacher
- Tạo bài kiểm tra (option)
<!-- - Xoá lesson -->
<!-- - Theem nut xoa yeu cau tham gia o teacher student manage -->

## Student
- Kiểm tra cách cộng điểm để tăng level, xem hết video, làm bài tập, tham gia khóa học, hoàn thành khóa học, ...
    + tham gia khoá học + 50 điểm (v)
    + comment lesson + 10 điểm (v)
    + làm bài tập + 30 điểm (v)
    + đăng bài diễn đàn + 20 điểm (v)
    + cmt diễn đàn + 10 điểm (v)
    + xem het video + 100 diem
    
<!-- - Tham gia phòng học trực tuyến -->

## Hiệu trưởng
<!-- - Tạo một tài khoản root có mọi quyền -->
<!-- - Phân quyền cho hiệu trưởng có thể phân quyền cho các giáo viên -->
- Lỗi đơ khi chuyển quyền giaos viên, (wire:irgnore), khoong cho component tu rebuild khi click

## Guest
<!-- - return moi route den login -->
