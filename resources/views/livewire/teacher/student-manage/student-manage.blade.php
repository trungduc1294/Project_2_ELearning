<div class="student-manage">

    {{-- road path --}}
    <div class="road_path">
        <div class="road_path_item">
            <a href="/teacher/courses-detail">Course Manage //</a>
        </div>
        <div class="road_path_item">
            <a href="/teacher/student-manage">Student Manage</a>
        </div>
    </div>

    {{-- Course info --}}
    <div class="course_content">
        <div class="summary_course">
            <div class="course_name">
                <h1>Laravel 8 From Scratch</h1>
            </div>
            <div class="course_category">
                <span>Web Development</span>
            </div>
            <div class="course_description">
                <p>We don't learn tools for the sake of learning tools. Instead, we learn them because they help us accomplish a particular goal. With that in mind, in this series, we'll use the common desire for a blog - with categories, tags, comments, email notifications, and more - as our goal. Laravel will be the tool that helps us get there. Each lesson, geared toward newcomers to Laravel, will provide instructions and techniques that will get you to the finish line.</p>
            </div>
        </div>
    </div>

    {{-- quiz list --}}
    <div class="student-container" x-data="{
        addStudentPanel: false,
        openUpdateQuiz: false,
    }">
        <div class="student-nav" >
            <div class="item" 
            x-on:click="
                addStudentPanel = !addStudentPanel; 
                window.scrollTo({ top: 0, behavior: 'smooth' })
            ">
                <i class="fas fa-plus"></i>
                <span>Add Student</span>
            </div>
        </div>

        <div class="student-table">
            <table>
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nguyen Van A</td>
                        <td>nva@gmail.com</td>
                        <td>Student</td>
                        <td class="std-manage-action">
                            <i class="delete-std fa-solid fa-trash"></i>
                            <i class="ban-std fa-solid fa-ban"></i>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{--  panel --}}
        <div class="add-student-container" x-show="addStudentPanel">
            <div class="add-student-panel" @click.outside="addStudentPanel = false">
                <h1>Add new student</h1>
                <form>
                    <div class="search-std">
                        <label for="std-email">Student email:</label>
                        <input type="text" name="std-email" id="std-email">
                    </div>
                    
                    <div class="submit">
                        <button type="submit">Add Student</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{ $title }}
</div>
