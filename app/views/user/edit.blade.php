@extends('admin.layout')

@section('content')
	<h1>Edit User</h1>
	<!-- Check for error flash var -->
	@if($errors->has())
		@foreach($errors->all() as $message)
			<div id="flash_error">{{ $message }}</div>
		@endforeach
	@endif
	
	<!-- User create form -->

	{{ Form::open(array('id'=> 'user_create_form')) }}
		<p>
			{{ Form::hidden('user_id', $user->id) }}
		</p>
		<!-- Email field -->
		<p>
			{{ Form::label('email', 'Email') }}
			{{ Form::email('email', $user->email) }}
		</p>
		<!-- Username field -->
		<p>
			{{ Form::label('username', 'Username') }}
			{{ Form::text('username', $user->username) }}
		</p>
		<p>
			{{ Form::label('level_id','User Level') }}
			{{ Form::select('level_id', array(
								''	=> '--- Select a level ---',
								'1' => 'Admin',
								'2' => 'Editor'), 
							$user->level_id) 
			}}
		</p>
		<!-- Sumbit button -->
		<p>{{ Form::submit('Edit')}}
		   {{ Form::button('Cancel', array(
				'onclick' => "document.location.href='".URL::previous()."'" )
		)}}
		</p>
	{{ Form::close() }}
@stop
