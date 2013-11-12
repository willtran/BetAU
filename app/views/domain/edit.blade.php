@extends('admin.layout')

@section('content')
	<!-- Check for error flash var -->
	@if($errors->has())
		@foreach($errors->all() as $message)
			<div id="flash_error">{{ $message }}</div>
		@endforeach
	@endif
	<div class="content_section_title">
		Edit Domain
	</div>
	<div class="content_section">
	<!-- Domain form create -->
	{{ Form::open(array('id'=>'domain_edit_form', 'action'=>array('DomainController@update',$domain->id), 'method' =>'put')) }}
		<table cellspacing="10">
			<!-- Domain Name Field -->
			<tr>
				<td class="form_label">
					{{ Form::label('name','Domain Name') }}
					<span class="required">(*)</span>
				</td>
				<td class="form_field">
					{{ Form::text('name', $domain->name) }}
					<br/>
					<small>(Example: exampledomain.com.au)</small>
				</td>
			</tr>
			<!-- Domain mode field -->
			<tr>
				<td class="form_label">
					{{ Form::label('is_active', 'Domain Mode')}}
				</td>
				<td class="form_field">
					{{ Form::select('is_active', array(
									'1' => 'Active',
									'0' => 'Inactive',
									), $domain->is_active) }}
					<br>
					<small>(Domain mode will show domains that are running and not running)</small>
				</td>
			</tr>
			<!-- Google Analytics Id field -->
			<tr>
				<td class="form_label">
					{{ Form::label('analytic_id', 'Analytics Id')}}
				</td>
				<td class="form_field">
					{{ Form::text('analytic_id', $domain->analytic_id) }}
					<br>
					<small>(Google analytics id that used for domain tracking, for example: UA-28254526-X)</small>
				</td>
			</tr>
			<!-- Category type -->
			<tr>
				<td class="form_label">
					{{ Form::label('category_id', 'Category')}}
				</td>
				<td class="form_field">
					{{ Form::select('category_id', array(
									'0'	=> '--- Select a category ---',
									'1' => 'Baseball',
									'2' => 'Basketball',
									'3' => 'Boxing',
									'4' => 'Cricket',
									'5' => 'Soccer',
									'6' => 'Horse Racing'
									), $domain->category_id) }}
				</td>
			</tr>
			<!-- Template type -->
			<tr>
				<td class="form_label">
					{{ Form::label('template_id', 'Template')}}
				</td>
				<td class="form_field">
					{{ Form::select('template_id', array(
									'0'	=> '--- Select a template ---',
									'1' => 'Template A',
									'2' => 'Template B',
									'3' => 'Template C',
									'4' => 'Template D'
									), $domain->template_id) }}
				</td>
			</tr>
			<!-- Heading field -->
			<tr>
				<td class="form_label">
					{{ Form::label('heading', 'Page Heading')}}
				</td>
				<td class="form_field">
					{{ Form::text('heading', $domain->heading) }}
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
					{{ Form::text('title', $domain->title) }}
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
					{{ Form::textarea('keyword', $domain->keyword) }}
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
					{{ Form::textarea('description', $domain->description) }}
				</td>
			</tr>
			<!-- Sumbit Button -->
			<tr>
				<td class="form_label"></td>
				<td class="form_field">
					{{ Form::submit('Edit Domain')}}
					{{ Form::button('Cancel', array(
							'onclick' => "document.location.href='".URL::previous()."'" )
						)}}
				</td>
			</tr>
		</table>
	{{ Form::close() }}
	</div>
@stop
