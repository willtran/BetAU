@extends('admin.layout')

@section('content')
		<h1>Authentication Require</h1>
		<div id="login_form_description">The server requires username and password for the administration.</div>
		<!-- Check for  login error flash var -->
		@if(Session::has('flash_error'))
			<div id="flash_error">{{ Session::get('flash_error') }}</div>
		@endif
		<!-- Login form -->
		{{ Form::open(array('id'=> 'login_form')) }}
			
			<!-- Username field -->
			<table>
				<tr>
					<td>{{ Form::label('username','Username') }}</td>
					<td>{{ Form::text('username', Input::old('username'))}}</td>
				</tr>
			<!-- Password field -->
			<tr>
				<td>{{ Form::label('password','Password') }}</td>
				<td>{{ Form::password('password') }}</td>
			</tr>
			<!-- Sumbit button -->
			<tr>
				<td></td>
				<td>{{ Form::submit('Login')}}</td>
			</tr>
			</table>
		{{ Form::close() }}
@stop
