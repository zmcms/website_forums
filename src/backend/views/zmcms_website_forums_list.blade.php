<ul class="navigations_tree">
	@foreach($resultset as $r)
	<li>
		<a id="forum_edit_{{$r->token}}" data-token="{{ $r->token }}" data-objslug="{{$r->slug}}"  href="#"><span class="far fa-edit"></span></a>
   		<a id="forum_link_{{$r->token}}" data-token="{{ $r->token }}" data-objslug="{{$r->slug}}"  data-type="articles" href="#"><span class="fas fa-link"></span></a>
   		<a id="forum_del_{{$r->token}}" data-token="{{ $r->token }}"  data-objslug="{{$r->slug}}" href="#"><span class="fas fa-trash-alt"></span></a>
		<a href="#" target="_blank">{{$r->name}} {{$r->slug}}</a>
	</li>
	@endforeach
</ul>
{{-- <pre>{{ --}}
	{{-- print_r($resultset, true) --}}
{{-- }}</pre> --}}