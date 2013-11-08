<!-- Base layout for an admin page -->
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
		<title>Bet AU Content Management System</title>
		{{ HTML::style('/css/dashboard.css') }}
		{{ HTML::script('/js/jquery-1.10.2.min.js') }}
		{{ HTML::script('/js/dashboard.js') }}
	</head>
    <body>
    	<!-- Page Header -->
		@include('admin.header')
		<!-- Page Content -->
    	<div id="wrapper">
    		@include('admin.sidebar')
    		<div id="content_wrapper">
    			<div id="page_alert">
			        <!-- Check for error flash var -->
			        @if(Session::has('flash_error'))
				        <div id="flash_error">
								{{ Session::get('flash_error') }}	
						</div>
					@endif
					<!-- Check for notice flash var -->
					@if(Session::has('flash_notice'))
						<div id="flash_notice">
								{{ Session::get('flash_notice') }}
						</div>
					@endif
				</div>
				<!-- Content -->
		        @yield('content')
	    	</div>
	    </div>
	    <!-- Page Footer -->
        @include('admin.footer')
    </body>
</html>