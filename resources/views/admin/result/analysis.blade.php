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
                        <form class="row" id="resultForm" method="POST">
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
                                    <select id="departmentId" class="form-control" required name="department_id">
                                        <option value="" selected disabled>Select a department</option>
                                    </select>

                                    {!!  requestError($errors,'department_id')  !!}
                                </div>
                            </div>

                            <div class="col-md-4 mb-4">
                                <div class="form-group">
                                    <label for="">Semester</label>
                                    <select class="form-control"  id="semesterId" required name="semester_id" value="{{old('semester_id')}}">
                                        {{-- <option value="" selected disabled>Select a semester</option> --}}
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
                                    <label for="">Level</label>
                                    <select class="form-control" id="levelId" name="level_id" value="{{old('level_id')}}">
                                        {{-- <option value="" selected disabled>Select a level</option> --}}
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
                                    <select class="form-control" id="sessionId" required name="session_id" value="{{old('session_id')}}">
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
                                <button type="button" id="analysisBtn" class="btn btn-primary">Get analysis</button>
                                <button type="button" id="courseBtn" class="btn btn-primary">Get course result</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--/column-->
        </div>


        <div class="row">
            <div class="col-xl-12">
                <div class="card" id="analysisArea" style="display: none">
                    <div class="card-header py-3 border-0 px-3">
                        <h4 class="heading m-0">Students' Performance</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive basic-tbl">
                            <table class="tech-data teacher-table" style="min-width: 798px">
                                <thead>
                                    <tr>
                                        <th>Matric number</th>
                                        <th>Department</th>
                                        <th>Level</th>
                                        <th>GPA</th>
                                    </tr>
                                </thead>
                                <tbody id="analysisTbody">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card" id="courseArea" style="display: none">
                    <div class="card-header py-3 border-0 px-3">
                        <h4 class="heading m-0">Course Result</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="row p-3">
                            <div class="col-6 col-md-3">
                                <div><strong>Total Student:</strong></div>
                                <p> <span id="totalStudents"></span> students</p>
                            </div>
                            <div class="col-6 col-md-3">
                                <div><strong>Total Passed:</strong></div>
                                <p><span id="passedStudents"></span> students</p>
                            </div>
                            <div class="col-6 col-md-3">
                                <div><strong>Total Failed:</strong></div>
                                <p><span id="failedStudents"></span> students</p>
                            </div>

                            <div class="col-6 col-md-3">
                                <div><strong>Lecturer:</strong></div>
                                <p id="lecturer"></p>
                            </div>
                        </div>
                        <div class="table-responsive basic-tbl">
                            <table class="tech-data teacher-table" style="min-width: 798px">
                                <thead>
                                    <tr>
                                        <th>Matric No</th>
                                        <th>CA Score</th>
                                        <th>Exam Score</th>
                                        <th>Total Score</th>
                                        <th>Grade</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody id="courseTbody">

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

@section('extra-scripts')
<script>
    $('#schoolId').change(function () {
        $('#departmentId').empty()
        $('#departmentId').append('<option value="" selected disabled>Select a department</option>')

        var schoolId = $(this).val()
        $.ajax({
            url: `http://127.0.0.1:8000/api/school/${schoolId}/departments`,
            type: 'get',
            async: false,
            data: {},
            success: function(departments){

                $.each(departments, function (i, department) {
                    $('<option>', {
                        text: department.name,
                        value: department.id,
                    }).appendTo($('#departmentId'));
                });
            }

        })
    })

    $('#departmentId').change(function () {
        var departmentId = $('#departmentId').val()
        var levelId = $('#levelId').val()
        var semesterId = $('#semesterId').val()
        getDepartmentCourse(departmentId,levelId,semesterId)
    })

    $('#levelId').change(function () {
        var departmentId = $('#departmentId').val()
        var levelId = $('#levelId').val()
        var semesterId = $('#semesterId').val()
        getDepartmentCourse(departmentId,levelId,semesterId)
    })

    $('#semesterId').change(function () {
        var departmentId = $('#departmentId').val()
        var levelId = $('#levelId').val()
        var semesterId = $('#semesterId').val()
        getDepartmentCourse(departmentId,levelId,semesterId)
    })


    $('#analysisBtn').click(function () {
        semester_id = $('#semesterId').val()
        session_id = $('#sessionId').val()
        department_id = $('#departmentId').val()
        level_id = $('#levelId').val()
        if (!semester_id || !session_id || !department_id || !level_id) {
            alert('Please make sure you select a semester, session, department and a level')
            return
        }

        $('#courseArea').hide()
        $('#analysisArea').fadeIn(6000)
        $('#analysisTbody').empty()
        var schoolId = $(this).val()
        $.ajax({
            url: `http://127.0.0.1:8000/api/result/analysis`,
            type: 'get',
            data: {
                semester_id,
                session_id,
                department_id,
                level_id
            },
            success: function(results){
                $.each(results, function (i, result) {
                    $('#analysisTbody').append(`
                        <tr>
                            <td>${result['matricNo']} </td>
                            <td>${result['department']} </td>
                            <td>${result['level']} </td>
                            <td>${result['gpa']} </td>
                        </tr>
                    `)
                });
            }

        })
    })

    $('#courseBtn').click(function () {
        departmentCourseId = $('#courseId').val()
        if (!departmentCourseId) {
            alert('Please select a course')
            return
        }

        $('#analysisArea').hide()
        $('#courseArea').fadeIn(6000)
        $('#courseTbody').empty()

        $.ajax({
            url: `http://127.0.0.1:8000/api/result/course`,
            type: 'get',
            data: {
                departmentCourseId
            },
            success: function(resultData){
                console.log('resultData', resultData)
                if (resultData) {
                    $('#totalStudents').text(resultData.resultAnalysis['totalCount'])
                    $('#passedStudents').text(`${resultData.resultAnalysis['passed']} - (${resultData.resultAnalysis['passedPercentage']}%)`)
                    $('#failedStudents').text(`${resultData.resultAnalysis['passed']} - (${resultData.resultAnalysis['failedPercentage']}%)`)
                    $('#lecturer').text(resultData.departmentCourse?.lecturer_course?.user?.name)
                }

                var results = resultData.results

                $.each(results, function (i, result) {
                    $('#courseTbody').append(`
                        <tr>
                            <td>${result.matric_no} </td>
                            <td>${result.test_score} </td>
                            <td>${result.exam_score} </td>
                            <td>${result.total_score} </td>
                            <td>${result.grade} </td>
                            <td class=${result.total_score> 39 ? 'text-success' : 'text-danger'}>${result.total_score> 39 ? 'Passed' : 'Failed'} </td>
                        </tr>
                    `)
                });
            }

        })
    })

    const getDepartmentCourse = (departmentId,levelId,semesterId) => {

        $('#courseId').empty()
        $('#courseId').append('<option value="" selected disabled>Select a course</option>')
        $.ajax({
            url: `http://127.0.0.1:8000/api/department/courses`,
            type: 'get',
            async: false,
            data: {
                departmentId,
                levelId,
                semesterId
            },
            success: function(courses){
                $.each(courses, function (i, course) {
                    $('<option>', {
                        text: course.course.title,
                        value: course.id,
                    }).appendTo($('#courseId'));
                });
            },
            error: function(err){
                console.log('err', err)
            }

        })
    }
</script>
@endsection
