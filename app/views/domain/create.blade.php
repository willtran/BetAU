@extends('admin.layout')

@section('content')
	<!-- Check for error flash var -->
	@if($errors->has())
		@foreach($errors->all() as $message)
			<div id="flash_error">{{ $message }}</div>
		@endforeach
	@endif
	<div class="content_section_title">
		Create New Domain
	</div>
	<div class="content_section">
	<!-- Domain form create -->
	{{ Form::open(array('id'=>'domain_create_form', 'action'=>'DomainController@store', 'method' =>'post')) }}
		<table cellspacing="10">
			<!-- Domain Name Field -->
			<tr>
				<td class="form_label">
					{{ Form::label('name','Domain Name') }}
					<span class="required">(*)</span>
				</td>
				<td class="form_field">
					{{ Form::text('name',Input::old('name')) }}
					<br/>
					<small>(example: exampledomain.com.au)</small>
				</td>
			</tr>
			<!-- Google Analytics Id field -->
			<tr>
				<td class="form_label">
					{{ Form::label('analytic_id', 'Analytics Id')}}
				</td>
				<td class="form_field">
					{{ Form::text('analytic_id', Input::old('analytic_id')) }}
					<br>
					<small>(Google analytics id that used for domain tracking, for example: UA-28254526-X)</small>
				</td>
			</tr>
			<!-- Category type -->
			<tr>
				<td class="form_label">
					{{ Form::label('category_id', 'Category')}}
					<span class="required">(*)</span>
				</td>
				<td class="form_field">
					{{ Form::select('category_id', $cat_data, Input::old('category_id')) }}
				</td>
			</tr>
			<!-- Template type -->
			<tr>
				<td class="form_label">
					{{ Form::label('template_id', 'Template')}}
					<span class="required">(*)</span>
				</td>
				<td class="form_field">
					{{ Form::select('template_id', array(
									'0'	=> '--- Select a template ---',
									'3' => '3 Bookmarkers',
									'4' => '4 Bookmarkers',
									'5' => '5 Bookmarkers'
									), Input::old('template_id')) }}
				</td>
			</tr>
			<!-- Article Column -->
			<tr>
				<td class="form_label">
					{{ Form::label('article_columns', 'Article Column(s)')}}
					<span class="required">(*)</span>
				</td>
				<td class="form_field">
					{{ Form::select('article_columns', array(
									''	=> '--- Select an amount ---',
									'1' => '1 Column',
									'2' => '2 Columns'
									), Input::old('article_column')) }}
				</td>
			</tr>
			<!-- Heading field -->
			<tr>
				<td class="form_label">
					{{ Form::label('heading', 'Page Heading')}}
				</td>
				<td class="form_field">
					{{ Form::text('heading', Input::old('heading')) }}
					<br>
					<small>(Example: Check These Our Promotions)</small>
				</td>
			</tr>
			<!-- Title field -->
			<tr>
				<td class="form_label">
					{{ Form::label('title', 'Page Title')}}
					<span class="required">(*)</span>
				</td>
				<td class="form_field">
					{{ Form::text('title', Input::old('title')) }}
					<br>
					<small>(The title of the page, example: example domain keyword)</small>
				</td>
			</tr>
			<!-- keywords field -->
			<tr>
				<td class="form_label">
					{{ Form::label('keyword', 'Meta Keyword')}}
				</td>
				<td class="form_field">
					{{ Form::textarea('keyword', Input::old('keyword')) }}
					<br>
					<small>(Example: keyword1, keyword 2, keyword 3 ...)</small>
				</td>
			</tr>
			<!-- Description field -->
			<tr>
				<td class="form_label">
					{{ Form::label('description', 'Page Description')}}
				</td>
				<td class="form_field">
					{{ Form::textarea('description', Input::old('description')) }}
				</td>
			</tr>
			<!-- Sumbit Button -->
			<tr>
				<td class="form_label"></td>
				<td class="form_field">
					{{ Form::submit('Add Domain')}}
				</td>
			</tr>
		</table>
	{{ Form::close() }}
	</div>
@stop
