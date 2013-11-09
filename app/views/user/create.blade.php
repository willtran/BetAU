@extends('admin.layout')

@section('content')
	<!-- Check for error flash var -->
	@if($errors->has())
		@foreach($errors->all() as $message)
			<div id="flash_error">{{ $message }}</div>
		@endforeach
	@endif
	<div class="content_section_title">
		Create New User
	</div>
	<div class="content_section">
	<!-- User create form -->
	{{ Form::open(array('id'=> 'user_create_form')) }}
		<!-- Email field -->
		<table cellspacing="10">
			<tr>
				<td class="form_label">
					{{ Form::label('email','Email') }}
					<span class="required">(*)</span>
				</td>
				<td class="form_field">
					{{ Form::text('email', Input::old('email'))}}
				</td>
			</tr>
			<!-- Username field -->
			<tr>
				<td class="form_label">
					{{ Form::label('username','Username') }}
					<span class="required">(*)</span>
				</td>
				<td class="form_field">
					{{ Form::text('username', Input::old('username')) }}
				</td>
			</tr>
			<!-- Password field -->
			<tr>
				<td class="form_label">
					{{ Form::label('password','Password') }}
					<span class="required">(*)</span>
				</td>
				<td class="form_field">
					{{ Form::password('password') }}
				</td>
			</tr>
			<!-- Confirm Password field -->
			<tr>
				<td class="form_label">
					{{ Form::label('confirm_password','Confirm Password') }}
					<span class="required">(*)</span>
				</td>
				<td class="form_field">
					{{ Form::password('confirm_password') }}
				</td>
			</tr>
			<tr>
				<td class="form_label">
					{{ Form::label('level_id','User Level') }}
					<span class="required">(*)</span>
				</td>
				<td class="form_field">
					{{ Form::select('level_id', array(
										''	=> '--- Select a level ---',
										'1' => 'Admin',
										'2' => 'Editor'
										),Input::old('level_id')) 
				}}</td>
			</tr>
			<!-- Sumbit button -->
			<tr>
				<td></td>
				<td>{{ Form::submit('Create User')}}</td>
			</tr>
		</table>
	{{ Form::close() }}
	</div>
@stop
