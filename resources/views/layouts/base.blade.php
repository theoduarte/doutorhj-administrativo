<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="shortcut icon" href="/libs/comvex-template/img/favicon.ico">
    <meta name="description" content="Comvex">
    <meta name="author" content="Theogenes Ferreira Duarte">
  
    <title>@yield('title', 'Doutor HJ')</title>

    @push('style')
    	<!-- Template css -->
        <link href="/libs/home-template/css/app.css" rel="stylesheet" type="text/css" />
    	    	
    	<!-- DoutorHJ Reset CSS -->
    	<link rel="stylesheet" href="/css/doutorhj.style.css">
    	
    	<script src="/libs/comvex-template/js/jquery.min.js"></script>
    	
    	<!-- modernizr script -->
    	<script src="/libs/comvex-template/js/modernizr.min.js"></script>
    	
    	
    @endpush
    
    @stack('style')
</head>

<body>

	<div id="app">
        

        @yield('content')
    </div>
    @push('scripts')
    	<script>
    		var laravel_token = '{{ csrf_token() }}';
    		var resizefunc = [];
    	</script>
    	
        <!-- <script src="/libs/home-template/js/app.js"></script> -->
    	
        
        <script type="text/javascript">
           
        </script>
    @endpush
    
    @stack('scripts')
    
</body>
</html>
