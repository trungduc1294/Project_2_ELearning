<div>
    <div class="nav_group">
        <div class="title">
            <span>"HIỆU TRƯỞNG"</span>
        </div>

        <div class="nav_item">
            <a href="{{
                route('headmaster.teacher.manage')
            }}">
        <span class="comment">
            //Manage
        </span>
                <div class="links">
                    <span>"Quản lý" => </span>
                    <p class="nav_name">"Giáo viên"</p>
                </div>
            </a>
        </div>
      
        <div class="nav_item">
            <a href="{{route('account', [
                'id' => session('userId')
              ])}}">
        <span class="comment">
            //Your Account
        </span>
                <div class="links">
                    <span>"Tài Khoản" => </span>
                    <p class="nav_name">"Quản lý"</p>
                </div>
            </a>
        </div>

        <div class="nav_item">
            <a href="#">
            <span class="comment">
                //What wrong ?
            </span>
                <div class="links">
                    <span>"Diễn Đàn" => </span>
                    <p class="nav_name">"Vấn đề"</p>
                </div>
            </a>
        </div>

        {{-- statistic --}}
      
        <div class="title">
          <span>"THỐNG KÊ"</span>
        </div>
      
        <div class="nav_item">
          <a href="#">
          <span class="comment">
              //Course
          </span>
              <div class="links">
                <span>"Tổng Số Khoá Học" => </span>
                <p class="nav_name">"{{$totalCourse}}"</p>
              </div>
          </a>
        </div>
      
        <div class="nav_item">
          <a href="#">
          <span class="comment">
              //Teacher
          </span>
              <div class="links">
                <span>"Tổng Số Giáo Viên" => </span>
                <p class="nav_name">"{{$totalTeacher}}"</p>
              </div>
          </a>
        </div>
      
        <div class="nav_item">
          <a href="#">
          <span class="comment">
              //Student
          </span>
              <div class="links">
                <span>"Tổng Số Học Sinh" => </span>
                <p class="nav_name">"{{$totalStudent}}"</p>
              </div>
          </a>
        </div>
    </div>
</div>
