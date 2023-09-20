@extends('department.layout.app')

@section('title')Students @endsection

@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title flex-wrap">
                    <div class=" mb-md-0 mb-3">
                        <h2>List of all students</h2>
                    </div>
                    <div>
                        <a type="button" class="btn btn-primary" href="{{route('department.student.create')}}">
                         + New Student
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header py-3 border-0 px-3">
                        <h4 class="heading m-0">Students' Details</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive basic-tbl">
                            <table id="teacher-table" class="tech-data" style="min-width: 798px">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Matric number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($students as $student)
                                        <tr>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->matric_no }}</td>
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
