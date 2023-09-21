<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li><a href="{{route('admin.dashboard')}}" aria-expanded="false">
                    <i class="material-symbols-outlined">home</i>
                    <span class="nav-text">Dashboard</span>
                </a>

            </li>

            @if (auth()->user()->isAdmin())
                <li>
                    <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                        <i class="material-symbols-outlined">person</i>
                        <span class="nav-text">Deans</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('admin.dean.index')}}">Deans</a></li>
                        <li><a href="{{route('admin.dean.store')}}">Add New Dean</a></li>
                    </ul>
                </li>


                <li>
                    <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                        <i class="material-symbols-outlined">art_track</i>
                        <span class="nav-text">Results</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('admin.result.index')}}">Results</a></li>
                        <li><a href="{{route('admin.result.analysis')}}">Results</a></li>
                    </ul>
                </li>

            @endif

        </ul>
        <div class="copyright" style="bottom: 0; position:fixed">
            <p><strong>{{auth()->user()->role}}</strong></p>
        </div>
    </div>
</div>
