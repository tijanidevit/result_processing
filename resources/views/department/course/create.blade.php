@extends('department.layout.app')

@section('title')Add new courses @endsection

@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title flex-wrap">
                    <div class=" mb-md-0 mb-3">
                        <h2>Add new course</h2>
                    </div>
                    <div>
                        <a type="button" class="btn btn-primary" href="{{route('department.course.index')}}">
                         View all courses
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Course Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form enctype="multipart/form-data" method="post" action="{{ route('department.course.store') }}">
                                @csrf
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                <div class="mb-3 row">
                                    <div class="col-sm-3">Level</div>
                                    <div class="col-sm-9">
                                        <select class="form-control" required name="level_id" value="{{old('level_id')}}">
                                            <option value="" selected disabled>Select a level</option>
                                            @forelse ($levels as $level)
                                                <option value="{{$level->id}}">{{$level->name}}</option>
                                            @empty

                                            @endforelse
                                        </select>

                                      {!!  requestError($errors,'level_id')  !!}
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <div class="col-sm-3">Semester</div>
                                    <div class="col-sm-9">
                                        <select class="form-control" required name="semester_id" value="{{old('semester_id')}}">
                                            <option value="" selected disabled>Select a semester</option>
                                            @forelse ($semesters as $semester)
                                                <option value="{{$semester->id}}">{{$semester->name}}</option>
                                            @empty

                                            @endforelse
                                        </select>

                                      {!!  requestError($errors,'semester_id')  !!}
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <div class="col-sm-3">Lecturer</div>
                                    <div class="col-sm-9">
                                        <select class="form-control" required name="lecturer_id" value="{{old('lecturer_id')}}">
                                            <option value="" selected disabled>Select a lecturer</option>
                                            @forelse ($lecturers as $lecturer)
                                                <option value="{{$lecturer->id}}">{{$lecturer->name}}</option>
                                            @empty

                                            @endforelse
                                        </select>

                                      {!!  requestError($errors,'lecturer_id')  !!}
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Course</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" required name="course_id" value="{{old('course_id')}}">
                                            <option value="" selected disabled>Select a course</option>
                                            @forelse ($courses as $course)
                                                <option value="{{$course->id}}">
                                                    ({{$course->title}}) - {{$course->title}}
                                                </option>
                                            @empty

                                            @endforelse
                                        </select>

                                      {!!  requestError($errors,'course_id')  !!}
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>
@endsection
