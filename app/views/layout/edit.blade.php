@extends('admin.layout')

@section('content')
	<!-- Check for error flash var -->
	@if($errors->has())
		@foreach($errors->all() as $message)
			<div id="flash_error">{{ $message }}</div>
		@endforeach
	@endif
	<div class="content_section_title">
		Edit Layout
	</div>
	<div class="content_section">
		<!-- Layout form edit -->
		{{ Form::open(array('id'=>'layout_edit_form', 'action'=>array('LayoutController@update',$layout->id), 'method' =>'put', 'enctype'=> "multipart/form-data")) }}
		<table cellspacing="10">
			<!-- Layout Name -->
			<tr>
				<td class="form_label">
					{{ Form::label('name','Name') }}
					<span class="required">(*)</span>
				</td>
				<td class="form_field">
					{{ Form::text('name', $layout->name)}}
				</td>
			</tr>
			<!-- Layout Part Select -->
			<tr>
				<td class="form_label">
					{{ Form::label('layout_type', 'Layout Type')}}
					<span class="required">(*)</span>
				</td>
				<td class="form_field">
					{{ Form::select('layout_type', array(
									'header' => 'Header',
									'footer' => 'Footer',
									'home' => 'Home Page',
									'article' => 'Article Page',
									), $layout_type,
									array('onChange' =>'layout.updateLayoutEdit()')
									) }}
				</td>
			</tr>
			<!-- Header -->
			<tr class="layout_header_block">
				<td class="form_label part_label">
					Header Bar
				</td>
				<td class="form_field"></td>
			</tr>
				<!-- Header background -->
				<tr class="layout_header_block">
					<td class="form_label">
						{{ Form::label('header_background','Header Background') }}
					</td>
					<td class="form_field">
						{{ Form::file('header_background') }}
						<br/>
						<small>(Background image for header, <b>size (2x68)</b>. Leave this field empty if you want to use the current one.)</small>
					</td>
				</tr>
				<!-- Header CSS -->
				<tr class="layout_header_block">
					<td class="form_label">
						{{ Form::label('header_css', 'Header CSS')}}
						<span class="required">(*)</span>
					</td>
					<td class="form_field">
						{{ Form::textarea('header_css', $layout->header_css, array('cols'=>60,'rows'=>30)) }}
					</td>
				</tr>
			<!-- Footer -->
			<tr class="layout_footer_block">
				<td class="form_label part_label">
					Footer Bar
				</td>
				<td class="form_field"></td>
			</tr>
				<!-- class="layout_footer_block" background -->
				<tr class="layout_footer_block">
					<td class="form_label">
						{{ Form::label('footer_background','Footer Background') }}
					</td>
					<td class="form_field">
						{{ Form::file('footer_background') }}
						<br/>
						<small>(Background image for footer, size <b>(2x140)</b>. Leave this field empty if you want to use the current one.)</small>
					</td>
				</tr>
				<!-- Footer CSS -->
				<tr class="layout_footer_block">
					<td class="form_label">
						{{ Form::label('footer_css', 'Footer CSS')}}
						<span class="required">(*)</span>
					</td>
					<td class="form_field">
						{{ Form::textarea('footer_css', $layout->footer_css, array('cols'=>60,'rows'=>30)) }}
					</td>
				</tr>
			<!-- Home Page -->
			<tr class="layout_home_block">
				<td class="form_label part_label">Home Page</td>
				<td class="form_field"></td>
			</tr>
				<!-- Bookmarker background -->
				<tr class="layout_home_block">
					<td class="form_label">Bookmarker Background</td>
					<td class="form_field">
						{{ Form::file('bookmarker_background') }}
						<br/>
						<small>(Background image for bookmarker list, size <b>(980x432)</b>. Leave this field empty if you want to use the current one.)</small>
					</td>
				</tr>
				<!-- Article background -->
				<tr class="layout_home_block">
					<td class="form_label">Article Background</td>
					<td class="form_field">
						{{ Form::file('article_background') }}
						<br/>
						<small>(Background image for article list, size <b>(980x567)</b>. Leave this field empty if you want to use the current one..)</small>
						<br/>
						<small>(This image will be used for the background in article page too.)</small>
					</td>
				</tr>
				<!-- Home Page CSS -->
				<tr class="layout_home_block">
					<td class="form_label">
						{{ Form::label('home_css', 'Home Page CSS')}}
						<span class="required">(*)</span>
					</td>
					<td class="form_field">
						{{ Form::textarea('home_css', $layout->home_css, array('cols'=>60,'rows'=>30)) }}
					</td>
				</tr>
			<!-- Article Page -->
			<tr class="layout_article_block">
				<td class="form_label part_label">Article Page</td>
				<td class="form_field"></td>
			</tr>
			<!-- Article Page CSS -->
				<tr class="layout_article_block">
					<td class="form_label">
						{{ Form::label('article_css', 'Article Page CSS')}}
						<span class="required">(*)</span>
					</td>
					<td class="form_field">
						{{ Form::textarea('article_css', $layout->article_css, array('cols'=>60,'rows'=>30)) }}
					</td>
				</tr>
			<!-- Sumbit Button -->
			<tr>
				<td class="form_label"></td>
				<td class="form_field">
					{{ Form::submit('Edit Layout')}}
					{{ Form::button('Cancel', array(
							'onclick' => "document.location.href='".URL::route('admin.layout.index')."'" )
						)}}
				</td>
			</tr>
		</table>
		{{ Form::close() }}
	</div>
@stop