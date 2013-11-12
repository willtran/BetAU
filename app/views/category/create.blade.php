@extends('admin.layout')

@section('content')	
	<div class="content_section_title">
		Add New Category
	</div>
	<div class="content_section">
	<!-- Check for error flash var -->
	@if($errors->has())
		@foreach($errors->all() as $message)
			<div id="flash_error">{{ $message }}</div>
		@endforeach
	@endif
	<!-- User create form -->
	{{ Form::open(array('id'=> 'category_create_form', 'action'=>'CategoryController@store', 'method' =>'post')) }}
		<!-- Email field -->
		<table cellspacing="10">
			<tr>
				<td class="form_label">
					{{ Form::label('name','Category Name') }}
					<span class="required">(*)</span>
				</td>
				<td class="form_field">
					{{ Form::text('name', Input::old('name'))}}
				</td>
			</tr>
			<!-- Sumbit button -->
			<tr>
				<td></td>
				<td>{{ Form::submit('Add Category')}}</td>
			</tr>
		</table>
	{{ Form::close() }}
	</div>
@stop
