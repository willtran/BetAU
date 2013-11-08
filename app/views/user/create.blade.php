@extends('admin.layout')

@section('content')
	<!-- Check for error flash var -->
	@if($errors->has())
		@foreach($errors->all() as $message)
			<div id="flash_error">{{ $message }}</div>
		@endforeach
	@endif
	
	<!-- User create form -->
	{{ Form::open(array('id'=> 'user_create_form')) }}
		<!-- Email field -->
		<table>
			<tr>
				<td>{{ Form::label('email','Email') }}</td>
				<td>{{ Form::text('email', Input::old('email'))}}</td>
			</tr>
			<!-- Username field -->
			<tr>
				<td>{{ Form::label('username','Username') }}</td>
				<td>{{ Form::text('username', Input::old('username')) }}</td>
			</tr>
			<!-- Password field -->
			<tr>
				<td>{{ Form::label('password','Password') }}</td>
				<td>{{ Form::password('password') }}</td>
			</tr>
			<!-- Confirm Password field -->
			<tr>
				<td>{{ Form::label('confirm_password','Confirm Password') }}</td>
				<td>{{ Form::password('confirm_password') }}</td>
			</tr>
			<tr>
				<td>{{ Form::label('level_id','User Level') }}</td>
				<td>{{ Form::select('level_id', array(
									''	=> '--- Select a level ---',
									'1' => 'Admin',
									'2' => 'Editor')) 
				}}</td>
			</tr>
			<!-- Sumbit button -->
			<tr>
				<td></td>
				<td>{{ Form::submit('Create')}}</td>
			</tr>
		</table>
	{{ Form::close() }}
@stop
