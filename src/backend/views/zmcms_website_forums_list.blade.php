<ul class="navigations_tree">
	@foreach($resultset as $r)
	<li id="forum_item_{{ $r->token }}">
		<a id="forum_edit_{{$r->token}}" data-token="{{ $r->token }}" data-objslug="{{$r->slug}}"  href="#"><span class="far fa-edit"></span></a>
   		<a id="forum_link_{{$r->token}}" data-token="{{ $r->token }}" data-objslug="{{$r->slug}}"  data-type="articles" href="#"><span class="fas fa-link"></span></a>
   		<a id="forum_del_{{$r->token}}" data-token="{{ $r->token }}"  data-objslug="{{$r->slug}}" href="#"><span class="fas fa-trash-alt"></span></a>
		<a href="#" target="_blank">{{$r->name}}</a>
	</li>
	@endforeach
</ul>

@push('custom_js')
<script type="text/javascript">
	$("a[id^='forum_edit_']").on('click', function (e){
		e.preventDefault();e.stopPropagation();
		location.href = "/"+backend_prefix+"/forums/update/frm/"+this.dataset.token;
		return false;
	});
	$("a[id^='forum_link_']").on('click', function (e){
		e.preventDefault();e.stopPropagation();
		$('#ajax_dialog_box').fadeIn( "slow", function() {});
		$('#ajax_dialog_box_content').html('<div class="msg ok"><div class="loader"></div></div>');
		$.get(
			"/"+backend_prefix+"/forums/link/"+this.dataset.token,
			function (data){
				$('#ajax_dialog_box_content').html('<div class="msg">'+data+'</div>');					
			}
		);

		return false;
	});
	$("a[id^='forum_del_']").on('click', function (e){
		e.preventDefault();e.stopPropagation();
		var t = this.dataset.token;
		if(!confirm("{{ ___('Czy na pewno chcesz usunąć forum wraz z komenatrzami użytkowników?') }}")) return false;
		$('#ajax_dialog_box').fadeIn( "slow", function() {});
		$('#ajax_dialog_box_content').html('<div class="msg ok"><div class="loader"></div></div>');
		$.get(
			"/"+backend_prefix+"/forums/delete/"+this.dataset.token,
			function (data){
				// alert(data);
				$('#ajax_dialog_box_content').html('<div class="msg">'+data+'</div>');	
				$('#forum_item_'+t).fadeOut( "slow", function() {});
			}
		);

		return false;
	});
</script>
@endpush

{{-- <pre>{{ --}}
	{{-- print_r($resultset, true) --}}
{{-- }}</pre> --}}