<!DOCTYPE html>
<html class="loading semi-dark-layout" lang="en" data-layout="semi-dark-layout" data-textdirection="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
		<meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
		<meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
		<title>{{$appname}}</title>
		<link rel="apple-touch-icon" href="{{ url('app/app-assets/images/ico/apple-icon-120.png')}}">
		<link rel="shortcut icon" type="image/x-icon" href="{{ url('app/app-assets/images/ico/favicon.ico')}}">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="{{ url('app/app-assets/vendors/css/vendors.min.css')}}">
		@yield('css')
		<link rel="stylesheet" type="text/css" href="{{ url('app/app-assets/css/bootstrap.css')}}">
		<link rel="stylesheet" type="text/css" href="{{ url('app/app-assets/css/bootstrap-extended.css')}}">
		<link rel="stylesheet" type="text/css" href="{{ url('app/app-assets/css/colors.css')}}">
		<link rel="stylesheet" type="text/css" href="{{ url('app/app-assets/css/components.css')}}">
		<link rel="stylesheet" type="text/css" href="{{ url('app/app-assets/css/themes/dark-layout.css')}}">
		<link rel="stylesheet" type="text/css" href="{{ url('app/app-assets/css/themes/bordered-layout.css')}}">
		<link rel="stylesheet" type="text/css" href="{{ url('app/app-assets/css/themes/semi-dark-layout.css')}}">
		<link rel="stylesheet" type="text/css" href="{{ url('app/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
		<link rel="stylesheet" type="text/css" href="{{ url('app/assets/css/style.css')}}">
	</head>
	<body class="vertical-layout vertical-menu-modern navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="">
    @include('panels.toolbar')
    @include('panels.sidebar')
		<div class="app-content content ">
			<div class="content-overlay"></div>
			<div class="header-navbar-shadow"></div>
			<div class="content-wrapper container-xxl p-0">
				<div class="content-body">
					<div class="row">
						<div class="col-12">
              				@yield('content')
            			</div>
					</div>
				</div>
			</div>
		</div>
		<div class="sidenav-overlay"></div>
		<div class="drag-target"></div>
    @include('panels.footer')
		<script src="{{ url('app/app-assets/vendors/js/vendors.min.js')}}"></script>
		<script src="{{ url('app/app-assets/js/core/app-menu.js')}}"></script>
		<script src="{{ url('app/app-assets/js/core/app.js')}}"></script>
    @yield('js')
		<script>
			$(window).on('load', function () {
                if (feather) {
                    feather.replace({width: 14, height: 14});
                }
            })
		</script>
	</body>
</html>
