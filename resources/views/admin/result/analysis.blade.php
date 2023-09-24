@extends('admin.layout.app')

@section('title')Student Result @endsection

@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title flex-wrap">
                    <div class=" mb-md-0 mb-3">
                        <h2>Result Analysis</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header py-3 border-0 px-3">
                        <h4 class="heading m-0">Select result data</h4>
                    </div>
                    <div class="card-body ">
                        <form class="row" action="{{ route('admin.result.analysis') }}" method="POST">
                            @csrf
                            <div class="col-md-4 mb-4">
                                <div class="form-group">
                                    <label for="">School</label>
                                    <select class="form-control" id="schoolId" required name="school_id" value="{{old('school_id')}}">
                                        <option value="" selected disabled>Select a school</option>
                                        @forelse ($schools as $school)
                                            <option value="{{$school->id}}">{{$school->name}}</option>
                                        @empty

                                        @endforelse
                                    </select>

                                    {!!  requestError($errors,'school_id')  !!}
                                </div>
                            </div>


                            <div class="col-md-4 mb-4">
                                <div class="form-group">
                                    <label for="">Department</label>
                                    <select id="dept" class="form-control dept" required name="department_id">
                                        <option value="" selected disabled>Select a department</option>
                                    </select>

                                    {!!  requestError($errors,'department_id')  !!}
                                </div>
                            </div>

                            <div class="col-md-4 mb-4">
                                <div class="form-group">
                                    <label for="">Semester</label>
                                    <select class="form-control"  id="semesterId" required name="semester_id" value="{{old('semester_id')}}">
                                        <option value="" selected disabled>Select a semester</option>
                                        @forelse ($semesters as $semester)
                                            <option value="{{$semester->id}}">{{$semester->name}}</option>
                                        @empty

                                        @endforelse
                                    </select>

                                    {!!  requestError($errors,'semester_id')  !!}
                                </div>
                            </div>

                            <div class="col-md-4 mb-4">
                                <div class="form-group">
                                    <label for="" id="lvlx">Level</label>
                                    <select class="form-control lvl" name="level_id" value="{{old('level_id')}}">
                                        <option value="" selected disabled>Select a level</option>
                                        @forelse ($levels as $level)
                                            <option value="{{$level->id}}">{{$level->name}}</option>
                                        @empty

                                        @endforelse
                                    </select>

                                    {!!  requestError($errors,'level_id')  !!}
                                </div>
                            </div>



                            <div class="col-md-4 mb-4">
                                <div class="form-group">
                                    <label for="">Course</label>
                                    <select class="form-control" id="courseId" required name="course_id" value="{{old('course_id')}}">
                                        <option value="" selected disabled>Select a course</option>
                                    </select>

                                    {!!  requestError($errors,'course_id')  !!}
                                </div>
                            </div>

                            <div class="col-md-4 mb-4">
                                <div class="form-group">
                                    <label for="">Session</label>
                                    <select class="form-control" required name="session_id" value="{{old('session_id')}}">
                                        <option value="" selected disabled>Select a session</option>
                                        @forelse ($sessions as $session)
                                            <option value="{{$session->id}}">{{$session->name}}</option>
                                        @empty

                                        @endforelse
                                    </select>

                                    {!!  requestError($errors,'session_id')  !!}
                                </div>
                            </div>


                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-primary">Get analysis</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--/column-->
        </div>


        @isset($studentResults)
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header py-3 border-0 px-3">
                        <h4 class="heading m-0">Students' Performance</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive basic-tbl">
                            <table id="teacher-table" class="tech-data" style="min-width: 798px">
                                <thead>
                                    <tr>
                                        <th>Matric number</th>
                                        <th>Department</th>
                                        <th>Level</th>
                                        <th>GPA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($studentResults as $result)
                                        <tr>
                                            <td>{{ $result['matricNo']}}</td>
                                            <td>{{ $result['department']}}</td>
                                            <td>{{ $result['level']}}</td>
                                            <td>{{ $result['gpa']}}</td>
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
        @endisset

    </div>

</div>
@endsection

@section('extra-scripts')
<script>
    $('#schoolId').change(function () {
        var schoolId = $(this).val()
        $.ajax({
            url: `http://127.0.0.1:8000/api/school/${schoolId}/departments`,
            type: 'get',
            async: false,
            data: {},
            success: function(departments){
                console.log('departments', departments)


                $.each(departments, function (i, department) {
                    // $('.lvl').html($('<option>', {
                    //     value: department.id,
                    //     text : department.name
                    // }));
                    $('<option>', {
                        text: department.name,
                        value: department.id,
                    }).appendTo($('.dept'));
                });
            }

        })
    })
</script>
@endsection
