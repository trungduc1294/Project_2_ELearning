<div class="my-library" x-cloak x-data="{
    openCreateCoursePanel: false,
}">
    <div class="courses-list in-progress-courses">
        @if ($error)
            <div class="text-red-500">
                {{ $error }}
            </div>
        @endif
        <div class="direction_bar">
            
            <div class="title">
                <h3>Quản lý khóa học của tôi</h3>
            </div>
            <div class="nav">
                <div class="add-course nav-item" x-on:click="openCreateCoursePanel = !openCreateCoursePanel">
                    <button class="primary-button">Thêm</button>
                </div>
            </div>
        </div>
        <div class="courses">
            @if ($listCourse)
                @foreach ($listCourse as $course)
                <div class="course-card"
                    onclick="window.location.href = '{{ route('teacher.course.detail', ['id' => $course['id']]) }}'"
                >
                    <div class="card-illustration">
                        <img src="https://ik.imagekit.io/laracasts/series/thumbnails/svg/learn-vue-3.svg" alt="">
                    </div>
                    <div class="course-content">
                        <div class="course-info min-h-[180px]">
                            <h1 class="course-name line-clamp-2">
                                {{ $course['name'] }}
                            </h1>
                            <p class="description line-clamp-3">{{ $course['description'] }}</p>
                        </div>
                        <div class="course-statistical">
                            <div class="number-of-lession">
                                <span> {{ $course['number_of_lessons'] ?? 0 }} Lessons </span>
                            </div>
                            <div class="number-of-student">
                                <span> {{ $course['number_of_students'] ?? 0 }} Students</span>
                            </div>
                            <div class="total-time">
                                <span> {{ $course['duration'] ?? "0h0p" }} </span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>

    {{-- create course panel --}}
    <div class="panel-container create-course-panel" x-show="openCreateCoursePanel">
        <div class="panel" @click.outside="openCreateCoursePanel = false">
            <h1>Thêm Khóa Học Mới</h1>
            <form wire:submit.prevent='
                addNewCourse();
                openCreateCoursePanel = false;
            '>
                <div class="form-group">
                    <label for="name">Tên Khóa Học:</label>
                    <input type="text" name="name" id="name" wire:model='course_name'>
                </div>
                <div class="form-group">
                    <label for="description">Mô Tả:</label>
                    <input type="text" name="description" id="description" wire:model='course_description'>
                </div>
                <div class="form-group">
                    <label for="category">Phân Loại:</label>
                    <select name="category" id="category" wire:model='course_category_id'>
                        <option value="0" >Chọn một danh mục</option>
                        @foreach ($listCategory as $category)
                            <option value="{{ $category['id'] }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="class">Lớp:</label>
                    <select name="class" id="class" wire:model='class'>
                        <option value="0" >Chọn lớp</option>
                        <option value="10">Lớp 10</option>
                        <option value="11">Lớp 11</option>
                        <option value="12">Lớp 12</option>
                        <option value="orther">Khác</option>
                        
                    </select>
                </div>
                <div class="submit">
                    <button type="submit">Thêm</button>
                </div>
            </form>
        </div>
    </div>

</div>