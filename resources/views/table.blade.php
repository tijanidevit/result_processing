@extends('admin.layout.app')

@section('title')Deans @endsection

@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title flex-wrap">
                    <div class=" mb-md-0 mb-3">
                        <h2>List of all deans</h2>
                    </div>
                    <div>
                        <a type="button" class="btn btn-primary" href="{{route('admin.dean.create')}}">
                         + New dean
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header py-3 border-0 px-3">
                        <h4 class="heading m-0">Deans' Details</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive basic-tbl">
                            <table id="teacher-table" class="tech-data" style="min-width: 798px">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Department</th>
                                        <th>Fees</th>
                                        <th class="text-end">Performance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Yatin Xarma</td>
                                        <td>Programming</td>
                                        <td>B.Tech</td>
                                        <td>$ 217.70</td>
                                        <td class="text-end"><span class="badge badge-sm light badge-danger">Bad</span></td>
                                    </tr>
                                    <tr>
                                        <td>Ramen</td>
                                        <td>Basic Art</td>
                                        <td>BA</td>
                                        <td>$ 218.70</td>
                                        <td class="text-end"><span class="badge badge-sm light badge-success">Good</span></td>
                                    </tr>
                                    <tr>
                                        <td>Harry</td>
                                        <td>English</td>
                                        <td>B.Tech</td>
                                        <td>$ 219.70</td>
                                        <td class="text-end"><span class="badge badge-sm light badge-success">Good</span></td>
                                    </tr>
                                    <tr>
                                        <td>Hanu</td>
                                        <td>Programing</td>
                                        <td>B.Tech</td>
                                        <td>$ 217.70</td>
                                        <td class="text-end"><span class="badge badge-sm light badge-success">Good</span></td>
                                    </tr>
                                    <tr>
                                        <td>Jorge</td>
                                        <td>History</td>
                                        <td>BA</td>
                                        <td>$ 212.70</td>
                                        <td class="text-end"><span class="badge badge-sm light badge-success">Good</span></td>
                                    </tr>
                                    <tr>
                                        <td>James</td>
                                        <td>History</td>
                                        <td>B.Com</td>
                                        <td>$ 21.70</td>
                                        <td class="text-end"><span class="badge badge-sm light badge-danger">Bad</span></td>
                                    </tr>
                                    <tr>
                                        <td>Vicky canady</td>
                                        <td>Basic Art</td>
                                        <td>B.Tech</td>
                                        <td>$ 217.70</td>
                                        <td class="text-end"><span class="badge badge-sm light badge-success">Good</span></td>
                                    </tr>
                                    <tr>
                                        <td>Jack Xarma</td>
                                        <td>Programming</td>
                                        <td>B.Tech</td>
                                        <td>$ 19.2.70</td>
                                        <td class="text-end"><span class="badge badge-sm light badge-success">Good</span></td>
                                    </tr>
                                    <tr>
                                        <td>Ramon</td>
                                        <td>Basic Art</td>
                                        <td>BA</td>
                                        <td>$ 217.70</td>
                                        <td class="text-end"><span class="badge badge-sm light badge-success">Good</span></td>
                                    </tr>
                                    <tr>
                                        <td>Harry john</td>
                                        <td>History</td>
                                        <td>B.Tech</td>
                                        <td>$ 18.70</td>
                                        <td class="text-end"><span class="badge badge-sm light badge-success">Good</span></td>
                                    </tr>
                                    <tr>
                                        <td>Hardy</td>
                                        <td>Basic Algorithm</td>
                                        <td>B.E</td>
                                        <td>$ 17.70</td>
                                        <td class="text-end"><span class="badge badge-sm light badge-success">Good</span></td>
                                    </tr>
                                    <tr>
                                        <td>Jeo</td>
                                        <td>English</td>
                                        <td>BA</td>
                                        <td>$ 217.70</td>
                                        <td class="text-end"><span class="badge badge-sm light badge-success">Good</span></td>
                                    </tr>
                                    <tr>
                                        <td>James Brown</td>
                                        <td>History</td>
                                        <td>B.Com</td>
                                        <td>$ 15.70</td>
                                        <td class="text-end"><span class="badge badge-sm light badge-danger">Bad</span></td>
                                    </tr>
                                    <tr>
                                        <td>John</td>
                                        <td>Art</td>
                                        <td>B.Tech</td>
                                        <td>$ 217.70</td>
                                        <td class="text-end"><span class="badge badge-sm light badge-success">Good</span></td>
                                    </tr>
                                    <tr>
                                        <td>Janny</td>
                                        <td>Basic Algorithm</td>
                                        <td>B.Tech</td>
                                        <td>$ 21.70</td>
                                        <td class="text-end"><span class="badge badge-sm light badge-success">Good</span></td>
                                    </tr>
                                    <tr>
                                        <td>Jorge clek</td>
                                        <td>English</td>
                                        <td>BA</td>
                                        <td>$ 22.70</td>
                                        <td class="text-end"><span class="badge badge-sm light badge-success">Good</span></td>
                                    </tr>


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
