<div>
    <div class="nav_group">
        <div class="title">
            <span>"GIÁO VIÊN"</span>
        </div>
      
        <div class="nav_item">
            <a href="{{route('account', [
              'id' => session('userId')
            ])}}">
                <span class="comment">
                    //My Account
                </span>
                <div class="links">
                    <span>"Tài Khoản" => </span>
                    <p class="nav_name">"Quản lý"</p>
                </div>
            </a>
        </div>
      
        <div class="nav_item">
            <a href="{{route('teacher.course')}}">
            <span class="comment">
                //Library
            </span>
                <div class="links">
                    <span>"Khóa Học" => </span>
                    <p class="nav_name">"Danh sách"</p>
                </div>
            </a>
        </div>

        <div class="nav_item">
          <a href="{{route('forum')}}">
          <span class="comment">
              //What wrong ?
          </span>
              <div class="links">
                  <span>"Diễn Đàn" => </span>
                  <p class="nav_name">"Vấn đề?"</p>
              </div>
          </a>
        </div>
      
        <div class="title">
          <span>"THỐNG KÊ CÁ NHÂN"</span>
        </div>
      
        <div class="nav_item">
          <a href="{{route('teacher.course')}}">
          <span class="comment">
              //Library
          </span>
              <div class="links">
                <span>"Khóa Học Của Tôi" => </span>
                <p class="nav_name">"{{count($teacherCourse)}}"</p>
              </div>
          </a>
        </div>
      
        <div class="nav_item">
          <a href="{{route('teacher.course')}}">
          <span class="comment">
              //Lessons
          </span>
              <div class="links">
                <span>"Bài Giảng" => </span>
                <p class="nav_name">"{{count($lessons)}}"</p>
              </div>
          </a>
        </div>
      
        <div class="nav_item">
          <a href="{{route('teacher.course')}}">
          <span class="comment">
              //Students
          </span>
              <div class="links">
                <span>"Học Sinh" => </span>
                <p class="nav_name">"{{$totalStudents}}"</p>
              </div>
          </a>
        </div>
      
        <div class="nav_item">
          <a href="{{route('teacher.course')}}">
          <span class="comment">
              //Hours
          </span>
              <div class="links">
                <span>"Thời lượng" => </span>
                <p class="nav_name">"20 phút"</p>
              </div>
          </a>
        </div>
      
    </div>
</div>
