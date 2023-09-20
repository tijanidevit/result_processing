<!DOCTYPE html>
<html lang="en">

@include('department.layout.head')
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

        @include('department.layout.header')

        @include('department.layout.sidebar')


		<!--**********************************
            Content body start
        ***********************************-->
        <!--**********************************
            Content body start
        ***********************************-->
		@yield('content')

        @include('department.layout.footer')


	</div>


    @include('department.layout.scripts')


</body>
</html>
