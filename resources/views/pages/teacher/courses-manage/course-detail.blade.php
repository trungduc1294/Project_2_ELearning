@extends('layouts.master')

@section('title', 'Course Detail')

@section('style-libraries')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
@stop

@section('styles')
@stop

@section('content')
  <div class="course_detail">
    <div class="teacher_detail">
        <div class="teacher_detail_container">
            <div class="avatar">
                <img src="{{asset("images/course_detail/teacher_img/jeffey.png")}}">
            </div>
            <div class="teacher_info">
                <div class="name">
                    <h3>Jeffrey Way</h3>
                </div>
            </div>
        </div>
    </div>


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

        <div class="lessons_list">

            <div class="course_nav">
              <div class="play_course">
                  <a href="#">
                      <i class="fas fa-play"></i>
                      <span>General Info</span>
                  </a>
              </div>
              <div class="take_quiz">
                  <span>Quiz</span>
              </div>
              <div class="students_manage secondary_button">
                <span>Students</span>
              </div>
              <div class="meeting_manage secondary_button">
                <span>Meeting</span>
              </div>
              <div class="example_manage secondary_button">
                <span>Exams</span>
              </div>
            </div>

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
                            <span>0h 2m 40s</span>
                        </div>
                    </div>
                </div>

                <div class="lesson">
                    <div class="progress_check">
  {{--                            <div class="check">--}}
  {{--                                <i class="fas fa-check"></i>--}}
  {{--                            </div>--}}
                        <div class="check">
                            <span>04</span>
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

            </div>

            <div x-data="{ open: false }" class="add_lesson">
              <button x-on:click="open=!open" href="" class="add_lesson_button">
                <i class="fa-solid fa-plus"></i>
              </button>
              <div x-show="open" @click.outside="open = false">
                content
              </div>
            </div>
        </div>
    </div>
  </div>
@stop

@section('scripts')
    <script>
    </script>
@stop
