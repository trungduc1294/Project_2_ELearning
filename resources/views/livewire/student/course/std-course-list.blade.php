<div class="my-library">
    <div class="courses-list in-progress-courses">
        <div class="direction_bar">
            <div class="title">
                <h3>My library</h3>
            </div>
            <select name="category" id="category" wire:model='category_id' wire:change="filterCourse()">
                <option value="all">All</option>
                @foreach ($categoryList as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="courses">
            @if ($courseList)
                @foreach ($courseList as $course)
                    <div class="course-card">
                        <div class="card-illustration">
                            <img src="https://ik.imagekit.io/laracasts/series/thumbnails/svg/learn-vue-3.svg" alt="">
                        </div>
                        <div class="course-content">
                            <div class="course-info">
                                <h1 class="course-name">
                                    {{ $course->name }}
                                </h1>
                                <p>{{ $course->description }}</p>
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