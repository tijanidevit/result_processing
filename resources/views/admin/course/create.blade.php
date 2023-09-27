@extends('admin.layout.app')

@section('title')Add a new course @endsection

@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title flex-wrap">
                    <div class=" mb-md-0 mb-3">
                        <h2>Add a new course</h2>
                    </div>
                    <div>
                        <a type="button" class="btn btn-primary" href="{{route('admin.course.index')}}">
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
                            <form method="post" action="{{ route('admin.course.store') }}">
                                @csrf
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Title</label>
                                    <div class="col-sm-9">
                                        <input name="title" value="{{old('title')}}" type="text" class="form-control" placeholder="Title">

                                      {!!  requestError($errors,'title')  !!}
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Code</label>
                                    <div class="col-sm-9">
                                        <input name="code" value="{{old('code')}}" type="text" class="form-control" placeholder="Code">

                                      {!!  requestError($errors,'code')  !!}
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Unit</label>
                                    <div class="col-sm-9">
                                        <input name="unit" value="{{old('unit')}}" type="text" class="form-control" placeholder="Unit">

                                      {!!  requestError($errors,'unit')  !!}
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
