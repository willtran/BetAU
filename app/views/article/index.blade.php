@extends('admin.layout')

@section('content')
@if(count($articles) > 0)
<!-- Layout management space -->
	<div class="content_section_title">
		Articles Listing
	</div>
	<div class="content_section table_center">
		<table id="management_table" class="extend_width">
			<thead>
				<tr>
					<td width="5%" align="center" style="border-top-left-radius: 5px;">ID</td>
					<td width="20%" align="center">Title</td>
					<td width="20%" align="center">Layout Label</td>
					<td width="20%" align="center">Domain</td>
					<td width="20%" align="center">Updated</td>
					<td width="15%" align="center" style="border-top-right-radius: 5px;">Action</td>
				</tr>
			</thead>
			<tbody>		
					@foreach($articles as $key => $article)
						<tr id="article_{{ $article->id }}" @if($key%2) class="event_background" @else class="odd_background" @endif >							
							<td align="center">{{ $article->id }}</td>
							<td align="center">{{ $article->title }}</td>
							<td align="center">{{ $article->label }}</td>
							<td align="center">{{ $article->domain_name }}</td>
							<td align="center">{{ $article->updated_at }}</td>
							<td align="center">
								<a class="item_edit" href="{{ URL::route('admin.article.edit',array('article' => $article->id)) }}" ><img src="{{ asset('/images/dashboard/blank.png') }}" alt="Layout Edit" title="Edit article"/></a>
								<a class="item_delete" href="javascript:void(0);" onclick="article.articleDelete('{{ URL::route('admin.article.destroy', array('article'=>$article->id)) }}',{{ $article->id }});" ><img src="{{ asset('/images/dashboard/blank.png') }}" alt="Layout Edit" title="Edit article"/></a>
							</td>
						</tr>
					@endforeach
			</tbody>
		</table>
	</div>
@else
	<!-- No layout found notice -->
	<div id="flash_notice">
		No article found.
	</div>
@endif
@stop