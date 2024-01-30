<div class="student-manage" x-cloak>

    {{-- road path --}}
    <div class="road_path">
        <div class="road_path_item">
            <a href="{{route('teacher.course.detail', ['id'=>$course_id])}}">Courses Detail //</a>
        </div>
        <div class="road_path_item">
            <a href="">Student Manage</a>
        </div>
    </div>

    {{-- Course info --}}
    <div class="course_content">
        <div class="summary_course">
            <div class="course_name">
                <h1>{{$course->name}}</h1>
            </div>
            <div class="course_category">
                <span>{{$category_name}}</span>
            </div>
            <div class="course_description">
                <p>{{$course->description}}</p>
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
                    @if ($listStudent)
                        @foreach ($listStudent as $student)
                            <tr>
                                <td>{{$student->username}}</td>
                                <td>{{$student->email}}</td>
                                <td>{{$student->role}}</td>
                                <td class="std-manage-action">
                                    <i class="delete-std fa-solid fa-trash" wire:click='deleteStudent({{$student->id}})'></i>
                                    <i class="fa-solid fa-ban" wire:click='banStudent({{$student->id}})'></i>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

        @if ($listRequestStudent)
        <div class="student-table">
            <h3 class="text-2xl font-semibold text-green-700">Requesting Student</h3>
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
                    @foreach ($listRequestStudent as $student)
                        <tr>
                            <td>{{$student->username}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->role}}</td>
                            <td class="std-manage-action primary-button" wire:click='acceptStudent({{$student->id}})'>
                                Accept
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
        

        

        {{--  panel add student --}}
        <div class="add-student-container" x-show="addStudentPanel">
            <div class="add-student-panel" @click.outside="addStudentPanel = false">
                <h1>Add new student</h1>
                <form wire:submit.prevent='addStudent'>
                    <div class="search-std">
                        <label for="std-email">Student email:</label>
                        <input type="text" name="std-email" id="std-email" wire:model='newStudentEmail'>
                    </div>
                    
                    <div class="submit" x-on:click="addStudentPanel = false">
                        <button type="submit">Add Student</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<script>
</script>
