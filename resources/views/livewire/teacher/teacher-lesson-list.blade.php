<div>
    <div class="lessons">
        <div class="lesson">
            <div class="progress_check">
                <div class="check">
                    <i class="fas fa-check"></i>
                </div>
            </div>
            <div class="lesson_info">
                <div class="lesson_name">
                    <h3>An Animated Introduction to MVC</h3>
                </div>
                <div class="lesson_decs">
                    <p>Before we get started, come along for a quick two minute overview of the MVC architecture. MVC stands for "Model, View, Controller" and is the bedrock for building Laravel applications.</p>
                </div>
                <div class="lesson_duration">
                    <span>0h 2m 40s</span>
                </div>
            </div>
        </div>

        <div class="lesson">
            <div class="progress_check">
                <div class="check">
                    <i class="fas fa-check"></i>
                </div>
            </div>
            <div class="lesson_info">
                <div class="lesson_name">
                    <h3>An Animated Introduction to MVC</h3>
                </div>
                <div class="lesson_decs">
                    <p>Before we get started, come along for a quick two minute overview of the MVC architecture. MVC stands for "Model, View, Controller" and is the bedrock for building Laravel applications.</p>
                </div>
                <div class="lesson_duration">
                    <span>0h 2m 40s </span>
                </div>
            </div>
        </div>
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
            <h1>Create new lesson</h1>
            <form>
                <div class="input-container">
                    <label for="course_title">Course Title</label>
                    <input type="text" id="course_title" name="course_title" placeholder="Enter Course Title">    
                </div>
                <div class="input-container">
                    <label for="course_description">Course Description</label>
                    <input id="course_description" name="course_description" placeholder="Enter Course Description">  
                </div>
                <button class="" type="submit">Add a lesson</button>
            </form>
        </div>
    </div>
</div>
