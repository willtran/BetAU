@extends('admin.layout')

@section('content')
	<div class="content_section_title">
		Welcome to Bet AU Administration System
	</div>
	<div class="content_section">
	<br>
	<!-- Check for  login error flash var -->
	@if(Session::has('flash_error_login'))
		<div id="flash_error">
				{{ Session::get('flash_error_login') }}
		</div>
	@endif
	<!-- Check for notice flash var -->
	@if(Session::has('flash_notice_login'))
		<div id="flash_notice">
				{{ Session::get('flash_notice_login') }}
		</div>
	@endif
	<!-- Login form -->
	{{ Form::open(array('id'=> 'login_form')) }}
		<table cellspacing="10" style="text-align: center;">
			<!-- Description field -->
			<tr>
				<td class="login_field"><strong>Sign in to your account</strong></td>
			</tr>
			<!-- Username field -->
			<tr>
				<td class="login_field">
					{{ Form::text('username', Input::old('username'), array('id'=>'login_username', 'placeholder'=>'Username')) }}
				</td>
			</tr>
			<!-- Password field -->
			<tr>
				<td class="login_field">{{ Form::password('password', array('id'=>'login_password', 'placeholder'=>'Password')) }}</td>
			</tr>
			<!-- Sumbit button -->
			<tr>
				<td class="login_field">{{ Form::submit('SIGN IN', array('id'=> 'sign_in_button')) }}</td>
			</tr>
		</table>
	{{ Form::close() }}
@stop
