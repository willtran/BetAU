@extends('admin.layout')

@section('content')
	<h1>Create New User</h1>
	<!-- Check for error flash var -->
	@if(Session::has('flash_error'))
		<div id="flash_error">{{ Session::get('flash_error') }}</div>
	@endif
	
	<!-- User create form -->
	{{ Form::open(array('id'=> 'user_create_form')) }}
		<!-- Email field -->
		<p>
			{{ Form::label('email','Email') }}
			{{ Form::text('email', Input::old('email')) }}
		</p>
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
		<p>{{ Form::submit('Create')}}</p>
		
	{{ Form::close() }}
@stop
