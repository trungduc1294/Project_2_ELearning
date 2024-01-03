@extends('layouts.master')

@section('title', 'Course General')

@section('style-libraries')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
@stop

@section('styles')
@stop

@section('content')
    <div class="my-library">
        <div class="courses-list in-progress-courses">
            <div class="direction_bar">
                <div class="title">
                    <h3>My courses manage</h3>
                </div>
                <div class="nav">
                    <div class="add-course nav-item">
                        <button>Add new Course</button>
                    </div>
                </div>
            </div>
            <div class="courses">
                <div class="course-card">
                    <div class="card-illustration">
                        <img src="https://ik.imagekit.io/laracasts/series/thumbnails/svg/learn-vue-3.svg" alt="">
                    </div>
                    <div class="course-content">
                        <div class="course-info">
                            <h1 class="course-name">
                                Learn Vue 3: Step by Step
                            </h1>
                            <p>I've been teaching Vue for years now. In fact, way back in 2015, as part of the first ever Vue series at Laracasts, I boldly predicted that Vue was about to skyrocket in</p>
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
        </div>

        <div class="completed-courses">
          <div class="direction_bar">

          </div>
          <div class="course">

          </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
    </script>
@stop
