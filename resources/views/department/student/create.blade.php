@extends('department.layout.app')

@section('title')Add new students @endsection

@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title flex-wrap">
                    <div class=" mb-md-0 mb-3">
                        <h2>Add new student</h2>
                    </div>
                    <div>
                        <a type="button" class="btn btn-primary" href="{{route('department.student.index')}}">
                         View all students
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Students' Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form enctype="multipart/form-data" method="post" action="{{ route('department.student.store') }}">
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
                                    <div class="col-sm-3">Session</div>
                                    <div class="col-sm-9">
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

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Student CSV</label>
                                    <div class="col-sm-9">
                                        <input required name="csv_file" value="{{old('csv_file')}}" accept="text/csv" type="file" class="form-control" placeholder="Student CSV">

                                      {!!  requestError($errors,'csv_file')  !!}
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
