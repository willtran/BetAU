@extends('admin.layout')

@section('content')
<!-- User management space -->
	<div class="content_section_title">
		Categories Listing
	</div>
	<div class="content_section">
		@if(count($categories)>0)
			<table id="category_management_table">
				<thead>
					<tr>
						<td width="5%" align="center" style="border-top-left-radius: 5px;">ID</td>
						<td width="35%" align="center">Domain Name</td>
						<td width="30%" align="center">Updated</td>						
						<td width="30%" align="center" style="border-top-right-radius: 5px;">Action</td>
					</tr>
				</thead>
				<tbody>
					@foreach($categories as $key => $cat)
						<tr id="cat_{{ $cat->id }}" @if($key%2) class="event_background" @else class="odd_background" @endif >							
							<td align="center">{{ $cat->id }}</td>
							<td align="center">{{ $cat->name }}</td>
							<td align="center">{{ $cat->updated_at }}</td>
							<td align="center">
								<a class="user_edit" href="{{ URL::route('admin.category.edit',array('category' => $cat->id)) }}" ><img src="{{ asset('/images/dashboard/blank.png') }}" alt="Category Edit" title="Edit category"/></a>
								<a class="user_delete" href="javascript:void(0);" onclick="user.userDelete('{{ URL::route('admin.category.destroy', array('category'=>$cat->id)) }}',{{ $cat->id }});"><img class="user_delete" src="{{asset('images/dashboard/blank.png')}}" alt="Category Delete" title="Delete category"/></a>
							</td>
						</tr>
					@endforeach
		
				</tbody>
			</table>
		@else
			<!-- No domain found notice -->
			<div id="flash_notice">
				No category had been added. 
				<strong>
					<a href="{{URL::route('admin.category.create')}}">Create the first one here</a>
				</strong>
			</div>
		@endif
	</div>
@stop 