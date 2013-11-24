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
		{{ Form::open(array('id'=>'article_edit_form', 'action'=>array('ArticleController@update', $article->id), 'method' =>'put', 'enctype'=> "multipart/form-data")) }}
		<table cellspacing="10">
			<!-- Domain 's Article-->
			<tr>
				<td class="form_label">
					{{ Form::label('domain_id','Domain') }}
				</td>
				<td class="form_field">
					{{ Form::select('domain_id', $domain_list, $article->domain_id, array('disabled')) }}
				</td>
			</tr>
			<!-- Article title -->
			<td class="form_label">
				{{ Form::label('title', 'Title') }}
				<span class="required">(*)</span>
			</td>
			<td class="form_field">
				{{ Form::text('title', $article->title) }}
			</td>
			<!-- Header background -->
			<tr>
				<td class="form_label">
					{{ Form::label('image', 'Cover Image') }}
				</td>
				<td class="form_field">
					@if($article->cover_image)
						<img width=440 height=112 src="{{ asset($article->cover_image) }}"/>
						<br/>
					@endif
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
				{{ Form::textarea('description', $article->description) }}
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
					{{ Form::textarea('content', $article->content, array('cols'=>60,'rows'=>30)) }}
					<br/>
					<small>(Add "a" tag with href link if you want to make a link)</small>
				</td>
			</tr>
			<!-- Sumbit Button -->
			<tr>
				<td class="form_label"></td>
				<td class="form_field">
					{{ Form::submit('Edit Article')}}
				</td>
			</tr>
		</table>
		{{ Form::close() }}
	</div>
@stop