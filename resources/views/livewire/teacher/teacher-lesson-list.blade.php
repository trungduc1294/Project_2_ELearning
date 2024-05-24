<div>
    <div class="lessons">
        @if ($lessonList)
            @foreach ($lessonList as $lesson)
                <div class="lesson"
                    onclick="window.location.href = '{{ route('teacher.lesson.detail', [
                        'id' => $course['id'],
                        'lesson_id' => $lesson->id,
                    ]) }}'"
                >
                    <div class="lesson_group">
                        <div class="progress_check">
                            <div class="check">
                                <i class="fas fa-check"></i>
                            </div>
                        </div>
                        <div class="lesson_info">
                            <div class="lesson_name line-clamp-1">
                                <h3>{{$lesson->name}}</h3>
                            </div>
                            <div class="lesson_decs line-clamp-2">
                                <p>{{$lesson->description}}</p>
                            </div>
                            <div class="lesson_duration">
                                <span>0h 2m 40s</span>
                            </div>
                        </div>
                    </div>
                    <div class="delete" wire:click.prevent.stop='deleteLesson({{$lesson->id}})'>
                        <i class="fa-solid fa-trash"></i>
                    </div>
                </div>
                
            @endforeach
        @endif
    </div>

    <div x-data="{ open: false }" class="add_lesson">
        <button x-on:click="open = !open" href="" class="add_lesson_button">
            <template x-if="open" class="minus-btn">
                <i class="fa-solid fa-minus"></i>
            </template>
            <template x-if="!open" class="plus-btn">
                <i class="fa-solid fa-plus"></i>
            </template>
        </button>
        <div class="create_lesson_form" x-show="open" @click.outside="open = false">
            <h1>Thêm bài giảng cho khoá học</h1>
            <form 
            wire:submit.prevent='
                addNewLesson;
                open = false;
            '>
                <div class="input-container">
                    <label for="course_title">Tiêu đề bài giảng</label>
                    <input type="text" id="course_title" name="course_title" placeholder="Nhập tiêu đề" wire:model='newLessonName'>    
                </div>
                <div class="input-container">
                    <label for="course_description">Mô tả bài giảng</label>
                    {{-- <input id="course_description" name="course_description" placeholder="Nhập mô tả" wire:model='newLessonDescription'>   --}}
                    <textarea name="course_description" id="course_description" cols="30" rows="10" placeholder="Nhập mô tả" wire:model='newLessonDescription'></textarea>
                </div>
                <button class="" type="submit">Thêm</button>
            </form>
        </div>
    </div>
</div>
