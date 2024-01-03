<div class="lesson-detail-container" x-data="{
    openDescriptionPanel: false,
    openVideoPanel: false,
}">

    {{-- Side --}}
    <div class="side">

        <div class="side-nav">
            <div class="back">
                <i class="fa-solid fa-angle-left"></i>
                <a href="">Series Overview</a>
            </div>
        </div>

        <div class="course-info-container">
            <div class="course-title">
                <h3>Build a Forum With Laravel</h3>
            </div>
            <div class="course-info">
                <div class="lessons item">
                    <i class="fa-solid fa-book"></i>
                    <span>15 Lessons</span>
                </div>
                <div class="duration item">
                    <i class="fa-solid fa-clock"></i>
                    <span>6h30m</span>
                </div>
            </div>
        </div>

        <div class="lesson-list">
            <div class="lesson">
                <div class="number">
                    <span>01</span>
                </div>
                <div class="content">
                    <div class="lesson-title">
                        <h4>Selecting a Stack</h4>
                    </div>
                    <div class="lesson-info">
                        <div class="lesson-number item">
                            <span>Episode 1</span>
                        </div>
                        <div class="lesson-duration item">
                            <i class="fa-solid fa-clock"></i>
                            <span>45m</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lesson lesson-active">
                <div class="number">
                    <span>01</span>
                </div>
                <div class="content">
                    <div class="lesson-title">
                        <h4>Selecting a Stack</h4>
                    </div>
                    <div class="lesson-info">
                        <div class="lesson-number item">
                            <span>Episode 1</span>
                        </div>
                        <div class="lesson-duration item">
                            <i class="fa-solid fa-clock"></i>
                            <span>45m</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- Main content --}}

    <div class="lesson-content" >

        <div class="video-container">
            {{-- <video src="https://www.youtube.com/watch?v=KAYny6V1rB0&pp=ygURU2VsZWN0aW5nIGEgU3RhY2s%3D"></video> --}}
            <img src="{{asset("images/quiz-logo.jpg")}}" alt="">
        </div>

        <div class="update-video-btn" x-on:click="openVideoPanel = !openVideoPanel;">
            <i class="fa-solid fa-video mr-2"></i>
            <span class="btn btn-primary">Update Video</span>
        </div>

        <div class="lesson-description">
            <div class="content">
                <h1 class="title">About This Episode</h1>
                <p class="content">Before we can start building, we need to decide which tools to use. Let's whip up a new project using the Laravel installer and discuss our options.</p>
            </div>
            <div class="update"  x-on:click="openDescriptionPanel = !openDescriptionPanel;">
                <i class="fa-solid fa-pencil"></i>
            </div>
        </div>

        <div class="discussion">
            <div class="add-reply">
            </div>
            <div class="reply-list">
                <div class="reply">
                    <div class="user-avatar">
                        <img src="{{asset("images/quiz-logo.jpg")}}" alt="">
                    </div>
                    <div class="content">
                        <h3 class="username">rikon</h3>
                        <p class="reply-content">
                            Man you guys really go above and beyond with the intros lol
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- update description panel --}}
        <div class="panel-container update-description-panel" x-show="openDescriptionPanel">
            <div class="panel" @click.outside="openDescriptionPanel = false">
                <h1>Update Description</h1>
                <form>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" name="description" id="description">
                    </div>
                    
                    <div class="submit">
                        <button type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- update VIDEO panel --}}
        <div class="panel-container update-video-panel" x-show="openVideoPanel">
            <div class="panel" @click.outside="openVideoPanel = false">
                <h1>Update video</h1>
                <form>
                    <div class="form-group">
                        <label for="description">Video:</label>
                        <input type="file" name="description" id="description">
                    </div>
                    
                    <div class="submit">
                        <button type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>

    
</div>

