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
				<!-- Header background -->
				<tr>
					<td class="form_label">Header Background</td>
					<td class="form_field">
						{{ Form::file('header_background') }}
						<br/>
						<small>(Background image for header, <b>size (2x68)</b>. Leave this field empty if you want to use default background.)</small>
					</td>
				</tr>
				<!-- Header text color -->
				<tr>
					<td class="form_label">
						{{ Form::label('header_text_color','Text Color') }}
					</td>
					<td class="form_field">
						{{ Form::text('header_text_color', Input::old('header_text_color'))}}
						<br/>
						<small>(Hexadecimal color code for the text inside the header, default color is White)</small>
					</td>
				</tr>
				<!-- Header hover text color -->
				<tr>
					<td class="form_label">
						{{ Form::label('header_hover_color','Text Hover Color') }}
					</td>
					<td class="form_field">
						{{ Form::text('header_hover_color', Input::old('header_hover_color'))}}
						<br/>
						<small>(Hexadecimal color code for the hovering text inside the header, default color is <font style="color:#ff6600;">Orange</font>)</small>
					</td>
				</tr>
			<!-- Footer -->
			<tr>
				<td class="form_label part_label">Footer Bar</td>
				<td class="form_field"></td>
			</tr>
				<!-- Footer background -->
				<tr>
					<td class="form_label">Footer Background</td>
					<td class="form_field">
						{{ Form::file('footer_background') }}
						<br/>
						<small>(Background image for footer, size <b>(2x140)</b>. Leave this field empty if you want to use default background.)</small>
					</td>
				</tr>
				<!-- Footer text color -->
				<tr>
					<td class="form_label">
						{{ Form::label('footer_text_color','Text Color') }}
					</td>
					<td class="form_field">
						{{ Form::text('footer_text_color', Input::old('footer_text_color'))}}
						<br/>
						<small>(Hexadecimal color code for the text inside the footer, default color is <font style="color:#767676;">Grey</font>)</small>
					</td>
				</tr>
				<!-- Footer hover text color -->
				<tr>
					<td class="form_label">
						{{ Form::label('footer_hover_color','Text Hover Color') }}
					</td>
					<td class="form_field">
						{{ Form::text('footer_hover_color', Input::old('footer_hover_color'))}}
						<br/>
						<small>(Hexadecimal color code for the hovering text inside the footer, default color is <font style="color:#ffa303;"> Light Orange</font>)</small>
					</td>
				</tr>
			<!-- Home Page -->
			<tr>
				<td class="form_label part_label">Home Page</td>
				<td class="form_field"></td>
			</tr>
				<!-- Bookmarker background -->
				<tr>
					<td class="form_label">Bookmarker Background</td>
					<td class="form_field">
						{{ Form::file('bookmarker_background') }}
						<br/>
						<small>(Background image for bookmarker list, size <b>(980x432)</b>. Leave this field empty if you want to use default background.)</small>
					</td>
				</tr>
				<!-- Bookmarker text color -->
				<tr>
					<td class="form_label">
						{{ Form::label('bookmarker_text_color','Bookmarker Text Color') }}
					</td>
					<td class="form_field">
						{{ Form::text('bookmarker_text_color', Input::old('bookmarker_text_color'))}}
						<br/>
						<small>(Hexadecimal color code for the text inside the bookmarker list, default color is White)</small>
					</td>
				</tr>
				<!-- Article background -->
				<tr>
					<td class="form_label">Article Background</td>
					<td class="form_field">
						{{ Form::file('article_background') }}
						<br/>
						<small>(Background image for article list, size <b>(980x567)</b>. Leave this field empty if you want to use default background.)</small>
						<br/>
						<small>(This image will be used for the background in article page too.)</small>
					</td>
				</tr>
				<!-- Article title color -->
				<tr>
					<td class="form_label">
						{{ Form::label('article_title_color','Article Title Color') }}
					</td>
					<td class="form_field">
						{{ Form::text('article_title_color', Input::old('article_title_color'))}}
						<br/>
						<small>(Hexadecimal color code for the article title, default color is <font style="color:#001e3a;">Dark Blue</font>)</small>
					</td>
				</tr>
				<!-- Article title hover color -->
				<tr>
					<td class="form_label">
						{{ Form::label('article_title_hover_color','Article Title Hover Color') }}
					</td>
					<td class="form_field">
						{{ Form::text('article_title_hover_color', Input::old('article_title_hover_color'))}}
						<br/>
						<small>(Hexadecimal color code for the hovering article title, default color is <font style="color:#ffa303;">Dark Blue</font>)</small>
					</td>
				</tr>
				<!-- Article description color -->
				<tr>
					<td class="form_label">
						{{ Form::label('article_description_color','Article Description Color') }}
					</td>
					<td class="form_field">
						{{ Form::text('article_description_color', Input::old('article_description_color'))}}
						<br/>
						<small>(Hexadecimal color code for the article description text, default color is <font style="color:#004b20;">Green</font>)</small>
						<br/>
						<small>(This will be used for the description in article page too.)</small>
					</td>
				</tr>
			<!-- Article Page -->
			<tr>
				<td class="form_label part_label">Article Page</td>
				<td class="form_field"></td>
			</tr>
			<!-- Article title color -->
				<tr>
					<td class="form_label">
						{{ Form::label('article_page_title_color','Article Page Title Color') }}
					</td>
					<td class="form_field">
						{{ Form::text('article_page_title_color', Input::old('article_page_title_color'))}}
						<br/>
						<small>(Hexadecimal color code for the article title in article page, default color is White)</small>
					</td>
				</tr>
				<!-- Article title hover color -->
				<tr>
					<td class="form_label">
						{{ Form::label('article_title_background_color','Article Title Background Color') }}
					</td>
					<td class="form_field">
						{{ Form::text('article_title_background_color', Input::old('article_title_background_color'))}}
						<br/>
						<small>(Hexadecimal color code for the background of article title, default color is <font style="color:#ff742c;">Light Orange</font>)</small>
					</td>
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
