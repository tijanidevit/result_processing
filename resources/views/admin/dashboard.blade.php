@extends('admin.layout.app')

@section('title')Dashboard @endsection

@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pb-xl-4 pb-sm-3 pb-0">
                        <div class="row">
                            <div class="col-xl-3 col-6">
                                <div class="content-box">
                                    <div class="icon-box icon-box-xl std-data">
                                        <svg width="25" height="25" viewBox="0 0 30 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.9288 37.75H3.75C1.67875 37.75 0 36.0713 0 34V23.5863C0 21.7738 1.29625 20.2213 3.07875 19.8975C5.72125 19.4163 10.2775 18.5875 12.855 18.12C14.2737 17.8612 15.7263 17.8612 17.145 18.12C19.7225 18.5875 24.2788 19.4163 26.9213 19.8975C28.7038 20.2213 30 21.7738 30 23.5863C30 26.3125 30 31.0825 30 34C30 36.0713 28.3212 37.75 26.25 37.75H12.9288ZM24.785 22.05L24.79 22.0563C25.0088 22.3838 25.06 22.795 24.9287 23.1662L24.0462 25.6662C23.9312 25.9925 23.685 26.2575 23.3675 26.3963L21.7075 27.12L22.3675 28.4412C22.5525 28.81 22.5425 29.2462 22.3425 29.6075L19.2075 35.25H26.25C26.94 35.25 27.5 34.69 27.5 34C27.5 31.0825 27.5 26.3125 27.5 23.5863C27.5 22.9825 27.0675 22.465 26.4738 22.3562L24.785 22.05ZM21.3663 21.4275L16.6975 20.5788C15.575 20.375 14.425 20.375 13.3025 20.5788L8.63375 21.4275L7.63625 22.9238L8.13 24.3213L10.5 25.3537C10.8138 25.4912 11.0575 25.7512 11.175 26.0737C11.2925 26.3962 11.2712 26.7525 11.1175 27.0588L10.1625 28.9688L13.6525 35.25H16.3475L19.8375 28.9688L18.8825 27.0588C18.7288 26.7525 18.7075 26.3962 18.825 26.0737C18.9425 25.7512 19.1862 25.4912 19.5 25.3537L21.87 24.3213L22.3638 22.9238L21.3663 21.4275ZM5.215 22.05L3.52625 22.3562C2.9325 22.465 2.5 22.9825 2.5 23.5863V34C2.5 34.69 3.06 35.25 3.75 35.25H10.7925L7.6575 29.6075C7.4575 29.2462 7.4475 28.81 7.6325 28.4412L8.2925 27.12L6.6325 26.3963C6.315 26.2575 6.06875 25.9925 5.95375 25.6662L5.07125 23.1662C4.94 22.795 4.99125 22.3838 5.21 22.0563L5.215 22.05ZM23.75 29V31.5C23.75 32.19 24.31 32.75 25 32.75C25.69 32.75 26.25 32.19 26.25 31.5V29C26.25 28.31 25.69 27.75 25 27.75C24.31 27.75 23.75 28.31 23.75 29ZM15 0.25C10.5163 0.25 6.875 3.89125 6.875 8.375C6.875 12.8587 10.5163 16.5 15 16.5C19.4837 16.5 23.125 12.8587 23.125 8.375C23.125 3.89125 19.4837 0.25 15 0.25ZM15 2.75C18.105 2.75 20.625 5.27 20.625 8.375C20.625 11.48 18.105 14 15 14C11.895 14 9.375 11.48 9.375 8.375C9.375 5.27 11.895 2.75 15 2.75Z" fill="white"/>
                                        </svg>
                                    </div>
                                    <div  class="chart-num">
                                        <p>Students</p>
                                        <h2 class="font-w700 mb-0">{{ $data['totalStudents'] }}</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-6">
                                <div class="content-box">
                                    <div class="teach-data icon-box icon-box-xl">
                                        <svg width="25" height="25" viewBox="0 0 30 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 34C0 36.0713 1.67875 37.75 3.75 37.75H26.25C28.3212 37.75 30 36.0713 30 34C30 31.0825 30 26.3125 30 23.5863C30 21.7738 28.7038 20.2213 26.9213 19.8975C24.2788 19.4163 19.7225 18.5875 17.145 18.12C15.7263 17.8612 14.2737 17.8612 12.855 18.12C10.2775 18.5875 5.72125 19.4163 3.07875 19.8975C1.29625 20.2213 0 21.7738 0 23.5863V34ZM17.885 20.795L19.7612 27.9288C20.0075 28.865 19.6775 29.8588 18.92 30.4638C18.28 30.9738 17.2713 31.7788 16.5713 32.3388C15.6525 33.0713 14.3475 33.0713 13.4287 32.3388C12.7287 31.7788 11.72 30.9738 11.08 30.4638C10.3225 29.8588 9.9925 28.865 10.2388 27.9288L12.115 20.795L3.52625 22.3562C2.9325 22.465 2.5 22.9825 2.5 23.5863V34C2.5 34.69 3.06 35.25 3.75 35.25C8.98 35.25 21.02 35.25 26.25 35.25C26.94 35.25 27.5 34.69 27.5 34C27.5 31.0825 27.5 26.3125 27.5 23.5863C27.5 22.9825 27.0675 22.465 26.4738 22.3562L17.885 20.795ZM15.2038 20.4288C15.0675 20.425 14.9325 20.425 14.7962 20.4288L12.6663 28.5312L14.9887 30.3837C14.995 30.39 15.005 30.39 15.0113 30.3837L17.3337 28.5312L15.2038 20.4288ZM15 0.25C10.5163 0.25 6.875 3.89125 6.875 8.375C6.875 12.8587 10.5163 16.5 15 16.5C19.4837 16.5 23.125 12.8587 23.125 8.375C23.125 3.89125 19.4837 0.25 15 0.25ZM15 2.75C18.105 2.75 20.625 5.27 20.625 8.375C20.625 11.48 18.105 14 15 14C11.895 14 9.375 11.48 9.375 8.375C9.375 5.27 11.895 2.75 15 2.75Z" fill="white"/>
                                        </svg>
                                    </div>
                                    <div class="chart-num">
                                        <p>Deans</p>
                                        <h2 class="font-w700 mb-0">{{ $data['totalDeans'] }}</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-6">
                                <div class="content-box">
                                    <div class="teach-data icon-box icon-box-xl">
                                        <svg width="25" height="25" viewBox="0 0 30 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 34C0 36.0713 1.67875 37.75 3.75 37.75H26.25C28.3212 37.75 30 36.0713 30 34C30 31.0825 30 26.3125 30 23.5863C30 21.7738 28.7038 20.2213 26.9213 19.8975C24.2788 19.4163 19.7225 18.5875 17.145 18.12C15.7263 17.8612 14.2737 17.8612 12.855 18.12C10.2775 18.5875 5.72125 19.4163 3.07875 19.8975C1.29625 20.2213 0 21.7738 0 23.5863V34ZM17.885 20.795L19.7612 27.9288C20.0075 28.865 19.6775 29.8588 18.92 30.4638C18.28 30.9738 17.2713 31.7788 16.5713 32.3388C15.6525 33.0713 14.3475 33.0713 13.4287 32.3388C12.7287 31.7788 11.72 30.9738 11.08 30.4638C10.3225 29.8588 9.9925 28.865 10.2388 27.9288L12.115 20.795L3.52625 22.3562C2.9325 22.465 2.5 22.9825 2.5 23.5863V34C2.5 34.69 3.06 35.25 3.75 35.25C8.98 35.25 21.02 35.25 26.25 35.25C26.94 35.25 27.5 34.69 27.5 34C27.5 31.0825 27.5 26.3125 27.5 23.5863C27.5 22.9825 27.0675 22.465 26.4738 22.3562L17.885 20.795ZM15.2038 20.4288C15.0675 20.425 14.9325 20.425 14.7962 20.4288L12.6663 28.5312L14.9887 30.3837C14.995 30.39 15.005 30.39 15.0113 30.3837L17.3337 28.5312L15.2038 20.4288ZM15 0.25C10.5163 0.25 6.875 3.89125 6.875 8.375C6.875 12.8587 10.5163 16.5 15 16.5C19.4837 16.5 23.125 12.8587 23.125 8.375C23.125 3.89125 19.4837 0.25 15 0.25ZM15 2.75C18.105 2.75 20.625 5.27 20.625 8.375C20.625 11.48 18.105 14 15 14C11.895 14 9.375 11.48 9.375 8.375C9.375 5.27 11.895 2.75 15 2.75Z" fill="white"/>
                                        </svg>
                                    </div>
                                    <div class="chart-num">
                                        <p>Lecturers</p>
                                        <h2 class="font-w700 mb-0">{{ $data['totalLecturers'] }}</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-6">
                                <div class="content-box">
                                    <div class="event-data icon-box icon-box-xl">
                                        <svg width="20" height="20" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M24 2.75H21.5V1.5C21.5 1.16848 21.3683 0.850537 21.1339 0.616117C20.8995 0.381696 20.5815 0.25 20.25 0.25C19.9185 0.25 19.6005 0.381696 19.3661 0.616117C19.1317 0.850537 19 1.16848 19 1.5V2.75H15.25V1.5C15.25 1.16848 15.1183 0.850537 14.8839 0.616117C14.6495 0.381696 14.3315 0.25 14 0.25C13.6685 0.25 13.3505 0.381696 13.1161 0.616117C12.8817 0.850537 12.75 1.16848 12.75 1.5V2.75H9V1.5C9 1.16848 8.8683 0.850537 8.63388 0.616117C8.39946 0.381696 8.08152 0.25 7.75 0.25C7.41848 0.25 7.10054 0.381696 6.86612 0.616117C6.6317 0.850537 6.5 1.16848 6.5 1.5V2.75H4C3.00544 2.75 2.05161 3.14509 1.34835 3.84835C0.645088 4.55161 0.25 5.50544 0.25 6.5V24C0.25 24.9946 0.645088 25.9484 1.34835 26.6517C2.05161 27.3549 3.00544 27.75 4 27.75H24C24.9946 27.75 25.9484 27.3549 26.6517 26.6517C27.3549 25.9484 27.75 24.9946 27.75 24V6.5C27.75 5.50544 27.3549 4.55161 26.6517 3.84835C25.9484 3.14509 24.9946 2.75 24 2.75ZM2.75 6.5C2.75 6.16848 2.8817 5.85054 3.11612 5.61612C3.35054 5.3817 3.66848 5.25 4 5.25H6.5V6.5C6.5 6.83152 6.6317 7.14946 6.86612 7.38388C7.10054 7.6183 7.41848 7.75 7.75 7.75C8.08152 7.75 8.39946 7.6183 8.63388 7.38388C8.8683 7.14946 9 6.83152 9 6.5V5.25H12.75V6.5C12.75 6.83152 12.8817 7.14946 13.1161 7.38388C13.3505 7.6183 13.6685 7.75 14 7.75C14.3315 7.75 14.6495 7.6183 14.8839 7.38388C15.1183 7.14946 15.25 6.83152 15.25 6.5V5.25H19V6.5C19 6.83152 19.1317 7.14946 19.3661 7.38388C19.6005 7.6183 19.9185 7.75 20.25 7.75C20.5815 7.75 20.8995 7.6183 21.1339 7.38388C21.3683 7.14946 21.5 6.83152 21.5 6.5V5.25H24C24.3315 5.25 24.6495 5.3817 24.8839 5.61612C25.1183 5.85054 25.25 6.16848 25.25 6.5V10.25H2.75V6.5ZM25.25 24C25.25 24.3315 25.1183 24.6495 24.8839 24.8839C24.6495 25.1183 24.3315 25.25 24 25.25H4C3.66848 25.25 3.35054 25.1183 3.11612 24.8839C2.8817 24.6495 2.75 24.3315 2.75 24V12.75H25.25V24Z" fill="white"/>
                                        </svg>
                                    </div>
                                    <div class="chart-num">
                                        <p>Departments</p>
                                        <h2 class="font-w700 mb-0">{{ $data['totalDepartments'] }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-xl-4 wow fadeInUp" data-wow-delay="1.5s">
                <div class="card">
                    <div class="card-header pb-0 border-0 flex-wrap">
                        <div>
                            <div class="mb-3">
                                <h2 class="heading mb-0">Calendar</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center event-calender  py-0 px-1">
                        <input type='text' class="form-control d-none" id='datetimepicker1'>
                    </div>
                </div>
            </div>
            <!--column-->
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header py-3 border-0 px-3">
                        <h4 class="heading m-0">Teacher Deatails</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive basic-tbl">
                            <table id="teacher-table" class="tech-data" style="min-width: 798px">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Subject</th>
                                        <th>Qulification</th>
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
        </div> --}}
    </div>

</div>
@endsection
