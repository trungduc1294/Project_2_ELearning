<div>
    <div class="nav_group">
        <div class="title">
            <span>"HỌC SINH"</span>
        </div>
        <div class="nav_item">
            <a href="{{session('userId') ? route('student.course', [
              'id' => session('userId')
            ]) : "#"}}">
                <span class="comment">
                    //My Library
                </span>
                <div class="links">
                    <span>"Bắt Đầu Học" => </span>
                    <p class="nav_name">"Khóa học"</p>
                </div>
            </a>
        </div>
      
        <div class="nav_item">
            <a href="{{route('discovery')}}">
        <span class="comment">
            //What to learn
        </span>
                <div class="links">
                    <span>"Khám Phá" => </span>
                    <p class="nav_name">"Khóa học mới"</p>
                </div>
            </a>
        </div>
      
        <div class="nav_item">
            <a href="{{session('userId') ? route('account', [
              'id' => session('userId')
            ]) : "#"}}">
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
            <a href="{{route('forum')}}">
            <span class="comment">
                //What wrong ?
            </span>
                <div class="links">
                    <span>"Diễn Đàn" => </span>
                    <p class="nav_name">"Vấn đề"</p>
                </div>
            </a>
        </div>

        <div class="nav_item">
            <a href="{{route('code_complier')}}">
            <span class="comment">
                //Coding ?
            </span>
                <div class="links">
                    <span>"Lập Trình" => </span>
                    <p class="nav_name">"Python"</p>
                </div>
            </a>
        </div>

        {{-- statistic --}}
      
        <div class="title">
          <span>"THỐNG KÊ"</span>
        </div>
      
        <div class="nav_item">
          <a href="{{route('student.course', [
            'id' => session('userId')
          ])}}">
          <span class="comment">
              //Library
          </span>
              <div class="links">
                <span>"Khóa học của tôi" => </span>
                <p class="nav_name">"{{$countCourseStudent}}"</p>
              </div>
          </a>
        </div>
      
        <div class="nav_item">
          <a href="{{route('teacher.course')}}">
          <span class="comment">
              //Library
          </span>
              <div class="links">
                <span>"Ranking Level" => </span>
                <p class="nav_name">"{{$student->rank_point}}"</p>
              </div>
          </a>
        </div>
      
        <div class="nav_item">
          <a href="{{route('teacher.course')}}">
          <span class="comment">
              //Library
          </span>
              <div class="links">
                <span>"Thời gian học" => </span>
                <p class="nav_name">"20"</p>
              </div>
          </a>
        </div>
    </div>
</div>
