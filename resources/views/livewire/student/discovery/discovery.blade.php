<div class="discovery">
    <div class="nav">
        <div class="nav_item" 
            onclick="window.location.href='{{ route('student.course', [session('userId')]) }}'"
        >
            <span>KHÓA HỌC CỦA TÔI</span>
            <div class="bb"></div>
        </div>
        <div class="{{ $page == 'topic' ? 'nav_item active' : 'nav_item' }}"
            wire:click='changePage("topic")'
        >
            <span>MÔN HỌC</span>
            <div class="bb"></div>
        </div>
        <div class="{{ $page == 'class_level' ? 'nav_item active' : 'nav_item' }}"
            wire:click='changePage("class_level")'
        >
            <span>LỚP</span>
            <div class="bb"></div>
        </div>
        <div class="{{ $page == 'series' ? 'nav_item active' : 'nav_item' }}"
            wire:click='changePage("series")'
        >
            <span>KHÓA HỌC</span>
            <div class="bb"></div>
        </div>
        <div class="{{ $page == 'joinWithCode' ? 'nav_item active' : 'nav_item' }}"
            wire:click='changePage("joinWithCode")'
        >
            <span>THAM GIA BẰNG CODE</span>
            <div class="bb"></div>
        </div>
        <a class="nav_item"
            href="{{route('forum')}}"
        >
            <span>DIỄN ĐÀN</span>
            <div class="bb"></div>
        </a>
    </div>

    {{-- Step my library --}}

    {{-- Step Topics --}}
    @if ($page == "topic")
        <div class="topics">
            
            <div class="title_block">
                <h3>Khám phá khóa học theo môn học</h3>
                <p>Tất cả khóa học được chia thành các phần theo môn học //topics. Điều này cung cấp cách bạn có thể tìm thấy thứ bạn cần học tiếp theo một cách đơn giản.</p>
            </div>

            <div class="courses_block">
                <div class="topics_nav">
                    @foreach ($categoryList as $category)
                        <div class="{{ $topic == $category->id ? 'topics_nav_item active' : 'topics_nav_item' }}"
                            wire:click='changeTopic({{$category->id}})'
                        >
                            <span>{{$category->name}}</span>
                            <div class="bb"></div>
                        </div>
                    @endforeach
                </div>

                <div class="courses">
                    @if ($courseListTopic)
                        @foreach ($courseListTopic as $course)
                            <div class="course-card"
                            onclick="window.location.href = '{{ route('student.course.detail', [
                                'student_id' => $user_id,
                                'course_id' => $course->id
                            ]) }}'"
                            >
                                <div class="card-illustration">
                                    <img src="https://ik.imagekit.io/laracasts/series/thumbnails/svg/learn-vue-3.svg" alt="">
                                </div>
                                <div class="course-content">
                                    <div class="course-info min-h-[180px]">
                                        <h1 class="course-name line-clamp-2">
                                            {{$course->name}}
                                        </h1>
                                        <p class="description line-clamp-3">{{$course->description}}</p>
                                    </div>
                                    <div class="course-statistical">
                                        <div class="number-of-lession">
                                            <span>51 Lessons</span>
                                        </div>
                                        <div class="number-of-student">
                                            <span>1.2k Students</span>
                                        </div>
                                        <div class="total-time">
                                            <span>2h 30m</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    
                </div>
            </div>
        </div>
    @endif

    {{-- phan chia theo lop --}}
    @if ($page == "class_level")
        <div class="topics class">
            
            <div class="title_block">
                <h3>Phân Chia Theo Lớp</h3>
                <p>Dễ dàng tìm kiếm khóa học theo lớp học của bạn!</p>
            </div>

            <div class="courses_block">
                <div class="topics_nav">
                    <div class="{{ $currentClassIndex == 0 ? 'topics_nav_item active' : 'topics_nav_item' }}" wire:click='changeClassIndex({{0}})'>
                        <span>Lớp 10</span>
                        <div class="bb"></div>
                    </div>
                    <div class="{{ $currentClassIndex == 1 ? 'topics_nav_item active' : 'topics_nav_item' }}" wire:click='changeClassIndex({{1}})'>
                        <span>Lớp 11</span>
                        <div class="bb"></div>
                    </div>
                    <div class="{{ $currentClassIndex == 2 ? 'topics_nav_item active' : 'topics_nav_item' }}" wire:click='changeClassIndex({{2}})'>
                        <span>Lớp 12</span>
                        <div class="bb"></div>
                    </div>
                    <div class="{{ $currentClassIndex == 3 ? 'topics_nav_item active' : 'topics_nav_item' }}" wire:click='changeClassIndex({{3}})'>
                        <span>Khác</span>
                        <div class="bb"></div>
                    </div>
                </div>

                <div class="courses">
                    @if ($coursesByClass)
                        @foreach ($coursesByClass as $course)
                            <div class="course-card"
                            onclick="window.location.href = '{{ route('student.course.detail', [
                                'student_id' => $user_id,
                                'course_id' => $course->id
                            ]) }}'"
                            >
                                <div class="card-illustration">
                                    <img src="https://ik.imagekit.io/laracasts/series/thumbnails/svg/learn-vue-3.svg" alt="">
                                </div>
                                <div class="course-content">
                                    <div class="course-info min-h-[180px]">
                                        <h1 class="course-name line-clamp-2">
                                            {{$course->name}}
                                        </h1>
                                        <p class="description line-clamp-3">{{$course->description}}</p>
                                    </div>
                                    <div class="course-statistical">
                                        <div class="number-of-lession">
                                            <span>51 Lessons</span>
                                        </div>
                                        <div class="number-of-student">
                                            <span>1.2k Students</span>
                                        </div>
                                        <div class="total-time">
                                            <span>2h 30m</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    
                </div>
            </div>
        </div>
    @endif

    {{-- Step Series --}}
    @if ($page == "series")
        <div class="series">
            <div class="title_block">
                <h3>Explore By Series</h3>
                <p>The newest course can be find here. This should provide you with an alternate way to decide what is lastest to learn.</p>
            </div>

            <div class="courses_block">
                @if ($newestCourseList)
                    <div class="courses">
                        @foreach ($newestCourseList as $course)
                        <div class="course-card"
                        onclick="window.location.href = '{{ route('student.course.detail', [
                            'student_id' => $user_id,
                            'course_id' => $course->id
                        ]) }}'">
                            <div class="card-illustration">
                                <img src="https://ik.imagekit.io/laracasts/series/thumbnails/svg/learn-vue-3.svg" alt="">
                            </div>
                            <div class="course-content">
                                <div class="course-info min-h-[180px]">
                                    <h1 class="course-name line-clamp-2">
                                        {{$course->name}}
                                    </h1>
                                    <p class="description line-clamp-3">{{$course->description}}</p>
                                </div>
                                <div class="course-statistical">
                                    <div class="number-of-lession">
                                        <span>51 Lessons</span>
                                    </div>
                                    <div class="number-of-student">
                                        <span>1.2k Students</span>
                                    </div>
                                    <div class="total-time">
                                        <span>2h 30m</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>   
                @endif
                
            </div>
        </div>
    @endif

    {{-- Step joinWithCode --}}
    @if ($page == 'joinWithCode')
        <div class="join_with_code">
            <div class="title_block">
                <h3>Join With Code</h3>
                <p>Enter the code provided by your instructor to join their course.</p>
            </div>

            <form wire:submit.prevent='joinWithCode'>
                <div class="input">
                    <input type="text" placeholder="Enter your code" wire:model='code'>
                    <button wire:click='joinWithCode'>Join</button>
                </div>
                {{-- show error from session flash --}}
                @if (session()->has('error'))
                    <div class="error text-red-500">
                        <span>{{ session('error') }}</span>
                    </div>
                @endif
            </form>
        </div>
    @endif

    {{-- Step Forum --}}
</div>
