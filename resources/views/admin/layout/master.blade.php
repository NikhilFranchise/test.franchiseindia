<html lang="en">
<head>
@include('admin.includes.head')
</head>
<body>

<!--Header-part-->
@include('admin.includes.header')
<!--close-top-Header-menu-->

<!--sidebar-menu-->
@include('admin.includes.sidebar')
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
	@yield('content')
</div>
<!--end-main-container-part-->

<!--Footer-part-->
@include('admin.includes.footer')
<!--end-Footer-part-->

<!--Footer links part-->
@include('admin.includes.footer-links')
<!--end-Footer-links-part-->

</body>
</html>
