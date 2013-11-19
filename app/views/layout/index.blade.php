@extends('admin.layout')

@section('content')
@if(count($layouts) > 0)
<!-- Layout management space -->
	<div class="content_section_title">
		Layouts Listing
	</div>
	<div class="content_section table_center">
		<table id="user_management_table">
			<thead>
				<tr>
					<td width="15%" align="center" style="border-top-left-radius: 5px;">ID</td>
					<td width="30%" align="center">Layout Name</td>
					<td width="30%" align="center">Layout Label</td>
					<td width="25%" align="center" style="border-top-right-radius: 5px;">Action</td>
				</tr>
			</thead>
			<tbody>		
					@foreach($layouts as $key => $layout)
						<tr id="layout_{{ $layout->id }}" @if($key%2) class="event_background" @else class="odd_background" @endif >							
							<td align="center">{{ $layout->id }}</td>
							<td align="center">{{ $layout->name }}</td>
							<td align="center">{{ $layout->label }}</td>
							<td align="center">
								<a class="user_edit" href="{{ URL::route('admin.layout.edit',array('layout' => $layout->id)) }}" ><img src="{{ asset('/images/dashboard/blank.png') }}" alt="Layout Edit" title="Edit layout"/></a>
							</td>
						</tr>
					@endforeach
			</tbody>
		</table>
	</div>
@else
	<!-- No layout found notice -->
	<div id="flash_notice">
		No layout found.
	</div>
@endif
@stop