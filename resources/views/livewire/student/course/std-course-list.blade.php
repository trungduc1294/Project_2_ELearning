<div class="my-library">
    <div class="courses-list in-progress-courses">
        <div class="direction_bar">
            <div class="title">
                <h3>Danh sách khóa học của tôi</h3>
            </div>
            <select name="category" id="category" wire:model='category_id' wire:change="filterCourse()">
                <option value="all">Tất cả</option>
                @foreach ($categoryList as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="courses">
            @if ($courseList)
                @foreach ($courseList as $course)
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
                                    {{ $course->name }}
                                </h1>
                                <p>{{ $course->description }}</p>
                            </div>
                            <div class="course-statistical">
                                <div class="number-of-lession">
                                    <span>{{$course->number_of_lessons ?? 0}} Bài giảng</span>
                                </div>
                                <div class="number-of-student">
                                    <span>{{$course->number_of_students ?? 0}} Học sinh</span>
                                </div>
                                <div class="total-time">
                                    <span>{{$course->duration ?? '0h'}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

</div>