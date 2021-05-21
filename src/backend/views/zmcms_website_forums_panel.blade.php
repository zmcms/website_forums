@extends('themes.'.Config('zmcms.frontend.theme_name').'.backend.main')
@section('content')
<h1 class="">{{___('Zarządzanie forami')}}</h1>
<div id="zmcms_website_articles_control_panel" class="control_subbelt_belt" style="text-align: right">
	<button id="btn_forum_new"><span class="fas fa-plus"></span> {{___('Nowe forum')}}</button>
</div>
<div id="zmcms_website_articles_control_panel_content">
	@include('themes.'.Config('zmcms.frontend.theme_name').'.backend.zmcms_website_forums_list')
</div>
{{-- <pre>{{print_r($resultset, true)}}</pre> --}}
@push('custom_js')
	<script type="text/javascript">
		var backend_prefix = $('meta[name="backend-prefix"]').attr('content');
		$('#btn_forum_new').on('click', function(e){
			e.preventDefault();e.stopPropagation();
			var o = $(this).attr('id'); 
			// alert(o);
			location.href = "/"+backend_prefix+"/forums/create/frm";
			return false;
		});
	</script>
@endpush
{{-- location.href = "/"+backend_prefix+"/forums/create/frm"; --}}
@endsection