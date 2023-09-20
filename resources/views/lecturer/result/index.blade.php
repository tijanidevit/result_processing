@extends('lecturer.layout.app')

@section('title')Results @endsection

@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title flex-wrap">
                    <div class=" mb-md-0 mb-3">
                        <h2>Results you have uploaded</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            @forelse ($courses as $course)
                <div class="col-md-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <div class="courseImg">
                                    <i class="fa fa-book"></i>
                                </div>
                                <div>
                                    <h2>{{ $course->departmentCourse?->course->code }}</h2>
                                </div>

                                <div>
                                    <h4>{{ $course->departmentCourse?->course->title }}</h4>
                                </div>

                                <div>
                                    <p>{{ $course->departmentCourse?->level->name }} - {{ $course->departmentCourse?->department->name }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="text-center ">
                                <a href="{{ route('lecturer.result.show', $course->departmentCourse?->id) }}" class="btn btn-success">View result</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h2>You have not uploaded any result yet!</h2>
            @endforelse
        </div>
    </div>

</div>
@endsection
