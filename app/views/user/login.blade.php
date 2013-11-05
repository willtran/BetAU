@extends('admin.layout')

@section('content')
	<h1>Login</h1>
	<!-- Check for  login error flash var -->
	@if(Session::has('flash_error'))
		<div id="flash_error">{{ Session::get('flash_error') }}</div>
	@endif
	
	<!-- Login form -->
	{{ Form::open(array('id'=> 'login_form')) }}
		<!-- Username field -->
		<p>
			{{ Form::label('username','Username') }}
			{{ Form::text('username', Input::old('username')) }}
		</p>
		<!-- Password field -->
		<p>
			{{ Form::label('password','Password') }}
			{{ Form::password('password') }}
		</p>
		<!-- Sumbit button -->
		<p>{{ Form::submit('Login')}}</p>
		
	{{ Form::close() }}
@stop
