@extends('department.layout.app')

@section('title')Courses @endsection

@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title flex-wrap">
                    <div class=" mb-md-0 mb-3">
                        <h2>List of all courses</h2>
                    </div>
                    <div>
                        <a type="button" class="btn btn-primary" href="{{route('department.course.create')}}">
                         + Add Courses
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header py-3 border-0 px-3">
                        <h4 class="heading m-0">Courses' Details</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive basic-tbl">
                            <table id="teacher-table" class="tech-data" style="min-width: 798px">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Code</th>
                                        <th>Level</th>
                                        <th>Assigned lecturer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($courses as $course)
                                        <tr>
                                            <td>{{ $course->course->title }}</td>
                                            <td>{{ $course->course->code }}</td>
                                            <td>{{ $course->level?->name }}</td>
                                            <td>{{ $course->lecturerCourse?->user?->name }}</td>
                                        </tr>
                                    @empty

                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--/column-->
        </div>


    </div>

</div>
@endsection
