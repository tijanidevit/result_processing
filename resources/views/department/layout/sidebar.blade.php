<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li><a href="{{route('department.dashboard')}}" aria-expanded="false">
                    <i class="material-symbols-outlined">home</i>
                    <span class="nav-text">Dashboard</span>
                </a>

            </li>

            @if (auth()->user()->isDepartment())
                <li>
                    <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                        <i class="material-symbols-outlined">person</i>
                        <span class="nav-text">Lecturers</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('department.lecturer.index')}}">Lecturers</a></li>
                        <li><a href="{{route('department.lecturer.create')}}">Add New Lecturer</a></li>
                    </ul>
                </li>

                <li>
                    <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                        <i class="material-symbols-outlined">school</i>
                        <span class="nav-text">Students</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('department.student.index')}}">Students</a></li>
                        <li><a href="{{route('department.student.create')}}">Add New Student</a></li>

                    </ul>
                </li>



                <li>
                    <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                        <i class="material-symbols-outlined">book</i>
                        <span class="nav-text">Courses</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('department.course.index')}}">Courses</a></li>
                        <li><a href="add-{{route('department.course.index')}}">Add New Course</a></li>

                    </ul>
                </li>



                <li>
                    <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                        <i class="material-symbols-outlined">art_track</i>
                        <span class="nav-text">Results</span>
                    </a>
                    <ul aria-expanded="false">
                        {{-- <li><a href="{{route('department.result.index')}}">Results</a></li> --}}
                    </ul>
                </li>

            @endif


        </ul>
        <div class="copyright" style="bottom: 0; position:fixed">
            <p><strong>{{auth()->user()->role}}</strong></p>
        </div>
    </div>
</div>
