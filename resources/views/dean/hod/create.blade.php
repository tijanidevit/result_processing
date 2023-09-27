@extends('dean.layout.app')

@section('title')Add a new HOD @endsection

@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title flex-wrap">
                    <div class=" mb-md-0 mb-3">
                        <h2>Add a new HOD</h2>
                    </div>
                    <div>
                        <a type="button" class="btn btn-primary" href="{{route('dean.hod.index')}}">
                         View all HODs
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">HOD Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="post" action="{{ route('dean.hod.store') }}">
                                @csrf
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                <div class="mb-3 row">
                                    <div class="col-sm-3">Department</div>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="department_id" value="{{old('department_id')}}">
                                            <option value="" selected disabled>Select a department</option>
                                            @forelse ($departments as $department)
                                                <option value="{{$department->id}}">{{$department->name}}</option>
                                            @empty

                                            @endforelse
                                        </select>

                                      {!!  requestError($errors,'department_id')  !!}
                                    </div>
                                </div>


                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input name="name" value="{{old('name')}}" type="text" class="form-control" placeholder="Name">

                                      {!!  requestError($errors,'name')  !!}
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input name="email" value="{{old('email')}}" type="email" class="form-control" placeholder="Email">

                                      {!!  requestError($errors,'email')  !!}
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
