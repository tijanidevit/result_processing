<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li><a href="{{route('dean.dashboard')}}" aria-expanded="false">
                    <i class="material-symbols-outlined">home</i>
                    <span class="nav-text">Dashboard</span>
                </a>

            </li>

            @if (auth()->user()->isDean())
                <li>
                    <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                        <i class="material-symbols-outlined">list</i>
                        <span class="nav-text">Departments</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('dean.department.index')}}">Departments</a></li>
                        <li><a href="{{route('dean.department.create')}}">Add Department</a></li>
                    </ul>
                </li>

                <li>
                    <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                        <i class="material-symbols-outlined">person</i>
                        <span class="nav-text">HODs</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('dean.hod.index')}}">HODs</a></li>
                        <li><a href="{{route('dean.hod.create')}}">Add New HOD</a></li>
                    </ul>
                </li>

                <li>
                    <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                        <i class="material-symbols-outlined">art_track</i>
                        <span class="nav-text">Results</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('dean.result.index')}}">Results</a></li>
                    </ul>
                </li>

            @endif

        </ul>
        <div class="copyright" style="bottom: 0; position:fixed">
            <p><strong>{{auth()->user()->role}}</strong></p>
        </div>
    </div>
</div>
