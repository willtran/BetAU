@extends('admin.layout')

@section('content')
	<h1>Create New User</h1>
	<!-- Check for error flash var -->
	@if($errors->has())
		@foreach($errors->all() as $message)
			<div id="flash_error">{{ $message }}</div>
		@endforeach
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
		<!-- Confirm Password field -->
		<p>
			{{ Form::label('confirm_password','Confirm Password') }}
			{{ Form::password('confirm_password') }}
		</p>
		<p>
			{{ Form::label('level_id','User Level') }}
			{{ Form::select('level_id', array(
								''	=> '--- Select a level ---',
								'1' => 'Admin',
								'2' => 'Editor')) 
			}}
		</p>
		<!-- Sumbit button -->
		<p>{{ Form::submit('Create')}}</p>
		
	{{ Form::close() }}
@stop
