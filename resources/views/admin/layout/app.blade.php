<!DOCTYPE html>
<html lang="en">

@include('admin.layout.head')
<body>

	<div id="preloader">
	  <div class="loader">
		<div class="dots">
			  <div class="dot mainDot"></div>
			  <div class="dot"></div>
			  <div class="dot"></div>
			  <div class="dot"></div>
			  <div class="dot"></div>
		</div>

		</div>
	</div>

    <div id="main-wrapper" class="active">

        @include('admin.layout.header')

        @include('admin.layout.sidebar')


		<!--**********************************
            Content body start
        ***********************************-->
        <!--**********************************
            Content body start
        ***********************************-->
		@yield('content')

        @include('admin.layout.footer')


	</div>


    @include('admin.layout.scripts')


</body>
</html>
