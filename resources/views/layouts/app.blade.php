<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="shortcut icon" href="/libs/comvex-template/img/favicon.ico">
    <meta name="description" content="Comvex">
    <meta name="author" content="Theogenes Ferreira Duarte">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DoutorHj: Admin') }}</title>

    <!-- Styles -->
    <!-- Switchery CSS-->
    <link rel="stylesheet" href="/libs/switchery/switchery.min.css">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/libs/comvex-template/css/bootstrap.min.css">
    
    <!-- Icons CSS -->
    <link rel="stylesheet" href="/libs/comvex-template/css/icons.css">
    
    <!-- Template theme CSS -->
    <link rel="stylesheet" href="/libs/comvex-template/css/style_dark.css">
    	
    <!-- DoutorHJ Reset CSS -->
    <link rel="stylesheet" href="/css/doutorhj.style.css">
    
    <!-- modernizr script -->
    <script src="/libs/comvex-template/js/modernizr.min.js"></script>
    
</head>
<body>
    
    <div class="wrapper-page">
    	@include('flash-message')
		    
		@yield('content')
    </div>

    <!-- Scripts -->
    <script>
    	var laravel_token = '{{ csrf_token() }}';
    	var resizefunc = [];
    </script>
    	
	<script src="/libs/comvex-template/js/jquery.min.js"></script>
	<script src="/libs/comvex-template/js/popper.min.js"></script>
	<script src="/libs/comvex-template/js/bootstrap.min.js"></script>
	
	<script src="/libs/comvex-template/js/detect.js"></script>
    <script src="/libs/comvex-template/js/fastclick.js"></script>
    <script src="/libs/comvex-template/js/jquery.slimscroll.js"></script>
    <script src="/libs/comvex-template/js/jquery.blockUI.js"></script>
    <script src="/libs/comvex-template/js/waves.js"></script>
    <script src="/libs/comvex-template/js/wow.min.js"></script>
    <script src="/libs/comvex-template/js/jquery.nicescroll.js"></script>
    <script src="/libs/comvex-template/js/jquery.scrollTo.min.js"></script>
    <script src="/libs/switchery/switchery.min.js"></script>
	
    <!-- Custom main Js -->
    <script src="/libs/comvex-template/js/jquery.core.js"></script>
    <script src="/libs/comvex-template/js/jquery.app.js"></script>
    
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        
    });
    </script>
</body>
</html>
