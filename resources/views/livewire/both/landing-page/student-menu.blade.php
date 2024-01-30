<div>
    <div class="nav_group">
        <div class="title">
            <span>"student menu"</span>
        </div>
        <div class="nav_item">
            <a href="{{session('userId') ? route('student.course', [
              'id' => session('userId')
            ]) : "#"}}">
                <span class="comment">
                    //My Library
                </span>
                <div class="links">
                    <span>"Start Learning" => </span>
                    <p class="nav_name">"Course"</p>
                </div>
            </a>
        </div>
      
        <div class="nav_item">
            <a href="{{route('discovery')}}">
        <span class="comment">
            //What to learn
        </span>
                <div class="links">
                    <span>"Discovery" => </span>
                    <p class="nav_name">"NewCourses"</p>
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
                    <span>"Account" => </span>
                    <p class="nav_name">"Manage"</p>
                </div>
            </a>
        </div>
      
        <div class="title">
          <span>"statistical"</span>
        </div>
      
        <div class="nav_item">
          <a href="{{route('teacher.course')}}">
          <span class="comment">
              //Library
          </span>
              <div class="links">
                <span>"Learning Course" => </span>
                <p class="nav_name">"20"</p>
              </div>
          </a>
        </div>
      
        <div class="nav_item">
          <a href="{{route('teacher.course')}}">
          <span class="comment">
              //Library
          </span>
              <div class="links">
                <span>"Your Rank" => </span>
                <p class="nav_name">"20"</p>
              </div>
          </a>
        </div>
      
        <div class="nav_item">
          <a href="{{route('teacher.course')}}">
          <span class="comment">
              //Library
          </span>
              <div class="links">
                <span>"Total Hour" => </span>
                <p class="nav_name">"20"</p>
              </div>
          </a>
        </div>
    </div>
</div>
