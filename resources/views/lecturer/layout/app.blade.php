<!DOCTYPE html>
<html lang="en">

@include('lecturer.layout.head')
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

        @include('lecturer.layout.header')

        @include('lecturer.layout.sidebar')


		<!--**********************************
            Content body start
        ***********************************-->
        <!--**********************************
            Content body start
        ***********************************-->
		@yield('content')

        @include('lecturer.layout.footer')


	</div>


    @include('lecturer.layout.scripts')


</body>
</html>
