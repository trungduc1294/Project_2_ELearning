<div class="my-library" x-data="{
    openCreateCoursePanel: false,
}">
    <div class="courses-list in-progress-courses">
        <div class="direction_bar">
            <div class="title">
                <h3>My courses manage</h3>
            </div>
            <div class="nav">
                <div class="add-course nav-item" x-on:click="openCreateCoursePanel = !openCreateCoursePanel">
                    <button>Add new Course</button>
                </div>
            </div>
        </div>
        <div class="courses">
            @if ($listCourse)
                @foreach ($listCourse as $course)
                <div class="course-card">
                    <div class="card-illustration">
                        <img src="https://ik.imagekit.io/laracasts/series/thumbnails/svg/learn-vue-3.svg" alt="">
                    </div>
                    <div class="course-content">
                        <div class="course-info">
                            <h1 class="course-name">
                                {{ $course['name'] }}
                            </h1>
                            <p>{{ $course['description'] }}</p>
                        </div>
                        <div class="course-statistical">
                            <div class="number-of-lession">
                                <span> Lessons</span>
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

    <div class="completed-courses">
      <div class="direction_bar">

      </div>
      <div class="course">

      </div>
    </div>

    {{-- create course panel --}}
    <div class="panel-container create-course-panel" x-show="openCreateCoursePanel">
        <div class="panel" @click.outside="openCreateCoursePanel = false">
            <h1>Add new Course</h1>
            <form wire:submit.prevent='
                addNewCourse();
                openCreateCoursePanel = false;
            '>
                <div class="form-group">
                    <label for="name">Course name:</label>
                    <input type="text" name="name" id="name" wire:model='course_name'>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" name="description" id="description" wire:model='course_description'>
                </div>
                
                <div class="submit">
                    <button type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>

</div>