<div class="discovery">
    <div class="nav">
        <div class="nav_item" 
            onclick="window.location.href='{{ route('student.course', [session('userId')]) }}'"
        >
            <span>MY LIBRARY</span>
            <div class="bb"></div>
        </div>
        <div class="{{ $page == 'topic' ? 'nav_item active' : 'nav_item' }}"
            wire:click='changePage("topic")'
        >
            <span>TOPICS</span>
            <div class="bb"></div>
        </div>
        <div class="{{ $page == 'series' ? 'nav_item active' : 'nav_item' }}"
            wire:click='changePage("series")'
        >
            <span>SERIES</span>
            <div class="bb"></div>
        </div>
        <div class="{{ $page == 'code' ? 'nav_item active' : 'nav_item' }}"
            wire:click='changePage("code")'
        >
            <span>JOIN WITH CODE</span>
            <div class="bb"></div>
        </div>
        <div class="nav_item"
            wire:click='changePage("forum")'
        >
            <span>FORUM</span>
            <div class="bb"></div>
        </div>
    </div>

    {{-- Step my library --}}

    {{-- Step Topics --}}
    @if ($page == "topic")
        <div class="topics">
            
            <div class="title_block">
                <h3>Explore By Topic</h3>
                <p>All course are categorized into various //topics. This should provide you with an alternate way to decide what to lean next.</p>
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
                                    <div class="course-info">
                                        <h1 class="course-name">
                                            {{$course->name}}
                                        </h1>
                                        <p>{{$course->description}}</p>
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
                    @foreach ($newestCourseList as $course)
                    <div class="courses"
                    onclick="window.location.href = '{{ route('student.course.detail', [
                        'student_id' => $user_id,
                        'course_id' => $course->id
                    ]) }}'"
                    >
                        <div class="course-card">
                            <div class="card-illustration">
                                <img src="https://ik.imagekit.io/laracasts/series/thumbnails/svg/learn-vue-3.svg" alt="">
                            </div>
                            <div class="course-content">
                                <div class="course-info">
                                    <h1 class="course-name">
                                        {{$course->name}}
                                    </h1>
                                    <p>{{$course->description}}</p>
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
                    </div>   
                    @endforeach
                @endif
                
            </div>
        </div>
    @endif

    {{-- Step Forum --}}
</div>
