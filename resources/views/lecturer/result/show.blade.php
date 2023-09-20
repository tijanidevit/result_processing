@extends('lecturer.layout.app')

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
                        <h2>Result for {{ $departmentCourse?->course->title }} ( {{ $departmentCourse?->department->name }} - {{ $departmentCourse?->level->name }})</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header py-3 border-0 px-3">
                        <h4 class="heading m-0">Result Analysis</h4>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-4">
                                <div><strong>Total Student:</strong></div>
                                <p>{{ $resultAnalysis['totalCount'] }} students</p>
                            </div>
                            <div class="col-4">
                                <div><strong>Total Passed:</strong></div>
                                <p>{{ $resultAnalysis['passed'] }} students ({{ $resultAnalysis['passedPercentage'] }}%)</p>
                            </div>
                            <div class="col-4">
                                <div><strong>Total Failed:</strong></div>
                                <p>{{ $resultAnalysis['failed'] }} students ({{ $resultAnalysis['failedPercentage'] }}%)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/column-->
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header py-3 border-0 px-3">
                        <h4 class="heading m-0">Students' Results</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive basic-tbl">
                            <table id="teacher-table" class="tech-data table-hover" style="min-width: 798px">
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
                                <tbody>
                                    @forelse ($departmentCourse?->results as $result)
                                        <tr>
                                            <td>{{ $result->matric_no }}</td>
                                            <td>{{$result->test_score }}</td>
                                            <td>{{ $result->exam_score}}</td>
                                            <td>{{ $result->total_score}}</td>
                                            <td>{{ $result->grade }}</td>
                                            <td @class(['text-danger' => $result->total_score <= 39, 'text-success' => $result->total_score > 39])>
                                                {{ $result->total_score > 39 ? 'Passed' : 'Failed' }}
                                            </td>
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
