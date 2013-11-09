@extends('admin.layout')

@section('content')
	<!-- Check for error flash var -->
	@if($errors->has())
		@foreach($errors->all() as $message)
			<div id="flash_error">{{ $message }}</div>
		@endforeach
	@endif
	<div class="content_section_title">
		Edit User
	</div>
	<div class="content_section">
	<!-- User create form -->
	{{ Form::open(array('id'=> 'user_edit_form')) }}
		<table cellspacing="10">
			<tr>
				<td class="form_label"> </td>
				<td class="form_field">{{ Form::hidden('user_id', $user->id) }}</td>
			</tr>
			<!-- Email field -->
			<tr>
				<td class="form_label">
					{{ Form::label('email', 'Email') }}
					<span class="required">(*)</span>
				</td>
				<td class="form_field">
					{{ Form::email('email', $user->email) }}
				</td>
			</tr>
			<!-- Username field -->
			<tr>
				<td class="form_label">
					{{ Form::label('username', 'Username') }}
					<span class="required">(*)</span>
				</td>
				<td class="form_field">
					{{ Form::text('username', $user->username) }}
				</td>
			</tr>
			<tr>
				<td class="form_label">
					{{ Form::label('level_id','User Level') }}
					<span class="required">(*)</span>
				</td>
				<td class="form_field">{{ Form::select('level_id', array(
									''	=> '--- Select a level ---',
									'1' => 'Admin',
									'2' => 'Editor'), 
								$user->level_id)}}</td>
			</tr>
			<!-- Sumbit button -->
			<tr>
				<td class="form_label"></td>
				<td class="form_field">{{ Form::submit('Edit User')}}
					   {{ Form::button('Cancel', array(
							'onclick' => "document.location.href='".URL::previous()."'" )
						)}}
				</td>
			</tr>
		</table>
	{{ Form::close() }}
	</div>
@stop
