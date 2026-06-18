<html lang="en">
@include('crreAdmin.includes.head')

<body>

	<!--Header-part-->
	@include('crreAdmin.includes.header')
	<!--close-top-Header-menu-->

	<!--sidebar-menu-->
	@include('crreAdmin.includes.sidebar')
	<!--sidebar-menu-->

	<!--main-container-part-->
	<div id="content">
		@yield('content')
	</div>
	<!--end-main-container-part-->

	<!--Footer-part-->
	@include('crreAdmin.includes.footer')
	<!--end-Footer-part-->

	<!--Footer links part-->
	@include('crreAdmin.includes.footer-links')
	<!--end-Footer-links-part-->

</body>

</html>