@extends('admin.layout')

@section('content')
	<div class="content_section_title">
		Domains Listing
	</div>
	<div class="content_section">
		@if(count($domains)>0)
		<!-- Domain listing space -->
		<table id="domain_listing_table">
			@foreach($domains as $key => $domain)
				@if($key == 0 || $key%3 == 0)
					<tr>
				@endif
				<td class="domain_item">
					<img class="domain_item_icon" src="{{asset('/images/dashboard/blank.png')}}"/>
					<div class="domain_item_block">
						<a class="domain_link" href="http://{{ $domain->name }}" target="_blank" title="{{ $domain->name }}">{{ $domain->name }}</a>
						<div class="domain_item_menu">
							<a class="domain_build_link" href="#" alt="" title="Domain Built Link">
								<img src="{{asset('/images/dashboard/blank.png')}}"/>
							</a>
							<a class="domain_edit_link" href="{{ URL::route('admin.domain.edit',array('domain'=>$domain->id)) }}">
								<img src="{{asset('/images/dashboard/blank.png')}}" alt="" title="Domain Edit"/>
							</a>
						</div>
					</div>
					
				</td>
				@if($key==count($domains)-1 || ($key+1)%3 == 0)	
					</tr>
				@endif
			@endforeach	
		</table>
		<!-- Page paginator -->
		<div class="domain_paginator">
			{{ $domains->links() }}
		</div>
		
		@else
		<!-- No domain found notice -->
			<div id="flash_notice">
				No domain found.
			</div>
		@endif
	</div>
@stop
