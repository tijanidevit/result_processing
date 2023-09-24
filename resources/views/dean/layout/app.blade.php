<!DOCTYPE html>
<html lang="en">

@include('dean.layout.head')
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

        @include('dean.layout.header')

        @include('dean.layout.sidebar')


		<!--**********************************
            Content body start
        ***********************************-->
        <!--**********************************
            Content body start
        ***********************************-->
		@yield('content')

        @include('dean.layout.footer')


	</div>


    @include('dean.layout.scripts')
    @yield('extra-scripts')

</body>
</html>
