<ul class="navigations_tree">
	@php $i = 0 @endphp
	@foreach($routes as $r)
	<li>
		<input type="checkbox" id="set_forum_linked_{{ $i }}" data-i="{{ $i }}">
		<label for="set_forum_linked_{{ $i }}" id="set_forum_linked_lbl_{{ $i }}" data-i="{{ $i }}" style="color: #fff;">{{ str_replace('/', '|', $r->path) }}</label>
	</li>
	@php $i++ @endphp
	@endforeach
</ul>
<script type="text/javascript">
	$("*[id^='set_forum_linked_'], *[id^='set_forum_linked_lbl_']").on('click', function (e){
		e.preventDefault();e.stopPropagation();
		// alert(this.dataset.i);
		$('#set_forum_linked_'+this.dataset.i).attr("checked", !$('#set_forum_linked_'+this.dataset.i).attr("checked"));
		return false;
	});
</script>
