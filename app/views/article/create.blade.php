@extends('admin.layout')

@section('content')
	<!-- Check for error flash var -->
	@if($errors->has())
		@foreach($errors->all() as $message)
			<div id="flash_error">{{ $message }}</div>
		@endforeach
	@endif
	<div class="content_section_title">
		Add New Article
	</div>
	<div class="content_section">
		<!-- Layout create form -->
		{{ Form::open(array('id'=>'article_create_form', 'action'=>'ArticleController@store', 'method' =>'post','enctype'=> "multipart/form-data")) }}
		<table cellspacing="10">
			<tr>
				<td>
					<input type="hidden" id="domain" name="domain" value="{{ $domain?$domain:0 }}"/>
				</td>
			</tr>
			<!-- Domain 's Article-->
			<tr>
				<td class="form_label">
					{{ Form::label('domain_id','Domain') }}
					<span class="required">(*)</span>
				</td>
				<td class="form_field">
					{{ Form::select('domain_id', $domain_list, $domain ? $domain : Input::old('domain_id'), $domain?array('disabled'):array()) }}
				</td>
			</tr>
			<!-- Article title -->
			<td class="form_label">
				{{ Form::label('title', 'Title') }}
				<span class="required">(*)</span>
			</td>
			<td class="form_field">
				{{ Form::text('title',Input::old('title')) }}
			</td>
			<!-- Header background -->
			<tr>
				<td class="form_label">
					{{ Form::label('image', 'Cover Image') }}
				</td>
				<td class="form_field">
					{{ Form::file('image') }}
					<br/>
					<small>(Top cover image for article, <b>size (440x112)</b>)</small>
				</td>
			</tr>
			<!-- Article short description -->
			<td class="form_label">
				{{ Form::label('description', 'Short Description') }}
				<span class="required">(*)</span>
			</td>
			<td class="form_field">
				{{ Form::textarea('description',Input::old('description')) }}
				<br/>
				<small>(Maximum: 256 characters.)</small>
			</td>
			<!-- Article content -->
			<tr>
				<td class="form_label">
					{{ Form::label('content', 'Content') }}
					<span class="required">(*)</span>
				</td>
				<td class="form_field">
					{{ Form::textarea('content',Input::old('content'), array('cols'=>60,'rows'=>30)) }}
					<br/>
					<small>(Add "a" tag with href link if you want to make a link)</small>
				</td>
			</tr>
			<!-- Sumbit Button -->
			<tr>
				<td class="form_label"></td>
				<td class="form_field">
					{{ Form::submit('Add Article')}}
				</td>
			</tr>
		</table>
		{{ Form::close() }}
	</div>
@stop