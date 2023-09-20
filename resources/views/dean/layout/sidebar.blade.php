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
                        <i class="material-symbols-outlined">person</i>
                        <span class="nav-text">HODs</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('dean.hod.index')}}">HODs</a></li>
                        <li><a href="{{route('dean.hod.store')}}">Add New HOD</a></li>
                    </ul>
                </li>


                <li>
                    <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                        <i class="material-symbols-outlined">art_track</i>
                        <span class="nav-text">Results</span>
                    </a>
                    <ul aria-expanded="false">
                        {{-- <li><a href="{{route('dean.result.index')}}">Results</a></li> --}}
                    </ul>
                </li>

            @endif

            <li>
                <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                    <i class="material-symbols-outlined">school</i>
                    <span class="nav-text">Student</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="student.html">Student</a></li>
                    <li><a href="student-detail.html">Student Detail</a></li>
                    <li><a href="add-student.html">Add New Student</a></li>

                </ul>
            </li>


            {{-- <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                <i class="material-symbols-outlined">restaurant_menu</i>
                <span class="nav-text">Food</span>
            </a>
                <ul aria-expanded="false">
                    <li><a href="food.html">Food menu</a></li>
                    <li><a href="food-details.html">Food Detail</a></li>
                </ul>

            </li>

            <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                <i class="material-icons">folder</i>
                <span class="nav-text">File Manager</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="file-manager.html">File Manager</a></li>
                <li><a href="user.html">User</a></li>
                <li><a href="celandar.html">Calendar</a></li>
                <li><a href="chat.html">Chat</a></li>
                <li><a href="activity.html">Activity</a></li>
            </ul>
            </li>
            <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                <i class="material-icons"> app_registration </i>
                <span class="nav-text">Apps</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="app-profile.html">Profile</a></li>
                    <li><a href="edit-profile.html">Edit Profile</a></li>
                    <li><a href="post-details.html">Post Details</a></li>
                    <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">Email</a>
                        <ul aria-expanded="false">
                            <li><a href="email-compose.html">Compose</a></li>
                            <li><a href="email-inbox.html">Inbox</a></li>
                            <li><a href="email-read.html">Read</a></li>
                        </ul>
                    </li>
                    <li><a href="app-calender.html">Calendar</a></li>
                    <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">Shop</a>
                        <ul aria-expanded="false">
                            <li><a href="ecom-product-grid.html">Product Grid</a></li>
                            <li><a href="ecom-product-list.html">Product List</a></li>
                            <li><a href="ecom-product-detail.html">Product Details</a></li>
                            <li><a href="ecom-product-order.html">Order</a></li>
                            <li><a href="ecom-checkout.html">Checkout</a></li>
                            <li><a href="ecom-invoice.html">Invoice</a></li>
                            <li><a href="ecom-customers.html">Customers</a></li>
                        </ul>
                    </li>
                </ul>
            </li> --}}
        </ul>
        <div class="copyright" style="bottom: 0; position:fixed">
            <p><strong>{{auth()->user()->role}}</strong></p>
        </div>
    </div>
</div>
