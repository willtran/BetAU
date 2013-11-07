<!-- Base layout for an admin page -->
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
		<title>Bet AU Content Management System</title>
		{{ HTML::style('/css/navigator.css') }}
		{{ HTML::script('/js/jquery-1.10.2.min.js') }}
		{{ HTML::script('/js/navigator.js') }}
		{{ HTML::script('/js/dashboard.js') }}
	</head>
    <body>
    	<div id="admin_page_header">
			@include('admin.header')
    	</div>
    	<div id="admin_page_content"></div>
	        <!-- Check for error flash var -->
	        <div id="flash_error">
				@if(Session::has('flash_error'))
					{{ Session::get('flash_error') }}
				@endif
			</div>
			<!-- Check for notice flash var -->
			<div id="flash_notice">
				@if(Session::has('flash_notice'))
					{{ Session::get('flash_notice') }}
				@endif
			</div>
			
			<!-- Content -->
	        @yield('content')
        <div id="admin_page_footer">
        	@include('admin.footer')
        </div>
    </body>
</html>