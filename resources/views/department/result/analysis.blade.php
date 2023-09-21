@extends('department.layout.app')

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
                        <form class="row" action="{{ route('department.result.analysis') }}" method="POST">
                            @csrf
                            <div class="col-md-6">
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

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Semester</label>
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

                            <div class="col-md-6 mt-3">
                                <button type="submit" class="btn btn-primary">Get analysis</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--/column-->
        </div>

        {{-- <div class="card-body ">
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
                <div class="col-4">
                    <div><strong>Semester:</strong></div>
                    <p>{{ $departmentCourse->semester?->name }}</p>
                </div>

                <div class="col-4">
                    <div><strong>Lecturer:</strong></div>
                    <p>{{ $departmentCourse->lecturerCourse?->user?->name }}</p>
                </div>

                <div class="col-4">
                    <div><strong>Department:</strong></div>
                    <p>{{ $departmentCourse->department?->name }}</p>
                </div>
            </div>
        </div> --}}
    </div>

</div>
@endsection
