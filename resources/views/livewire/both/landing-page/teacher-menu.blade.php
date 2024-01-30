<div>
    <div class="nav_group">
        <div class="title">
            <span>"teacher menu"</span>
        </div>
      
        <div class="nav_item">
            <a href="{{route('account', [
              'id' => session('userId')
            ])}}">
                <span class="comment">
                    //My Account
                </span>
                <div class="links">
                    <span>"Account" => </span>
                    <p class="nav_name">"Manage"</p>
                </div>
            </a>
        </div>
      
        <div class="nav_item">
            <a href="{{route('teacher.course')}}">
            <span class="comment">
                //Library
            </span>
                <div class="links">
                    <span>"My Courses" => </span>
                    <p class="nav_name">"Lists"</p>
                </div>
            </a>
        </div>

        <div class="nav_item">
          <a href="{{route('teacher.course')}}">
          <span class="comment">
              //What wrong ?
          </span>
              <div class="links">
                  <span>"Forum" => </span>
                  <p class="nav_name">"Issues"</p>
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
                <span>"Total Courses" => </span>
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
                <span>"Total Lesson" => </span>
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
                <span>"Total Student" => </span>
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
