<!DOCTYPE html>
<html lang="en">

<!-- Head Section Here -->
@include('frontEnd.includes.head')



<body>
	<!-- main container of all the page elements -->
	<div id="wrapper">
		<!-- Page Loader -->
    <div id="pre-loader" class="loader-container">
      <div class="loader">
        <img src="images/svg/rings.svg" alt="loader">
      </div>
    </div>
		<!-- W1 start here -->
		<div class="w1">
			

<!-- Header Section Here -->
@include('frontEnd.includes.header')			
			

<!-- Slider Section Here -->	

		

<!-- Main Content Section Here -->	
@yield('content')



<!-- Footer Section Here -->
@include('frontEnd.includes.footer')

<!-- Footer Section Here -->
@include('frontEnd.includes.messenger')
		

		</div><!-- W1 end here -->
		<span id="back-top" class="fa fa-arrow-up"></span>
	</div>
	<!-- Messenger JS -->
	<script src="{{ url('public/admin/custom/frontMessenger.js') }}"></script>
	<!-- include jQuery -->
	<script src="{{ url('public/frontEnd/js/jquery.js') }}"></script>
	<!-- include jQuery -->
	<script src="{{ url('public/frontEnd/js/plugins.js') }}"></script>
	<!-- include jQuery -->
	<script src="{{ url('public/frontEnd/js/jquery.main.js') }}"></script>
	

<!-- Page JS Section Here -->
@yield('js')

@yield('messegeJs')
	
</body>
</html>