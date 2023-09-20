@extends('lecturer.layout.app')

@section('title')Upload Result @endsection

@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title flex-wrap">
                    <div class=" mb-md-0 mb-3">
                        <h2>Upload result for {{ $departmentCourse?->course->title }} ( {{ $departmentCourse?->department->name }} - {{ $departmentCourse?->level->name }})</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Upload Result CSV File</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="post" action="{{ route('lecturer.result.upload', $departmentCourse->id) }}" enctype="multipart/form-data">
                                @csrf
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Result CSV</label>
                                    <div class="col-sm-9">
                                        <input name="csv_file" value="{{old('csv_file')}}" accept="text/csv" type="file" class="form-control" placeholder="Result CSV">

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
