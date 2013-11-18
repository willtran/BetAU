@extends('admin.layout')

@section('content')
	<!-- Check for error flash var -->
	@if($errors->has())
		@foreach($errors->all() as $message)
			<div id="flash_error">{{ $message }}</div>
		@endforeach
	@endif
	<div class="content_section_title">
		Create New Layout
	</div>
	<div class="content_section">
	<!-- User create form -->
	{{ Form::open(array('id'=> 'layout_create_form', 'action'=>'LayoutController@store', 'method' =>'post', 'enctype'=> "multipart/form-data")) }}
		<table cellspacing="10">
			<tr>
				<!-- Layout Name -->
				<td class="form_label">
					{{ Form::label('name','Name') }}
					<span class="required">(*)</span>
				</td>
				<td class="form_field">
					{{ Form::text('name', Input::old('name'))}}
				</td>
			</tr>
			<!-- Header -->
			<tr>
				<td class="form_label part_label">
					Header Bar
				</td>
				<td class="form_field"></td>
			</tr>
			<tr>
				<td class="form_label">Header Background</td>
				<td class="form_field">
					{{ Form::file('header_background') }}
				</td>
			</tr>
			<!-- Footer -->
			<tr>
				<td class="form_label part_label">Footer Bar</td>
				<td class="form_field"></td>
			</tr>
			<!-- Home Page -->
			<tr>
				<td class="form_label part_label">Home Page</td>
				<td class="form_field"></td>
			</tr>
			<!-- Article Page -->
			<tr>
				<td class="form_label part_label">Article Page</td>
				<td class="form_field"></td>
			</tr>
			<!-- Sumbit button -->
			<tr>
				<td></td>
				<td>{{ Form::submit('Create Layout')}}</td>
			</tr>
		</table>
	{{ Form::close() }}
	</div>
@stop
