@extends('themes.'.Config('zmcms.frontend.theme_name').'.backend.main')
@section('content')
<h1 class="">{{$settings['title'] ?? ___('Forum')}}</h1>
<div>
    <form class="micro12" id="zmcms_website_forum_frm" method="post" enctype="multipart/form-data">
		<div class="micro12">
		    <input id="wforums_title_txt" type="text" name="name" value="{{$data[0]->name ?? null}}" placeholder=" ">
		    <label>Nazwa</label>
		</div>
		<div class="micro12">
			<input id="wforums_title_slug" type="text" name="slug" value="{{ $data[0]->slug ?? null }}" placeholder=" ">
			<label>Slug</label>
		</div>
		<div class="micro12">
		    <h3>Intro</h3>
		    <textarea class="richeditor" id="wforums_intro" type="text" cols="25" rows="40" name="intro" placeholder=" " >
		        {!! $data[0]->intro ?? null!!}
		    </textarea>
		</div>
		<input id="wforums_token" class="micro12" type="hidden" name="token" value="{{$data[0]->token ?? null}}" placeholder="Token">
		<input id="wforums_action" class="micro12" type="hidden" name="action" value="{{ $settings['action'] }}" placeholder="Akcja">
		<input id="wforums_access" class="micro12" type="hidden" name="access" value="{{ $data[0]->access ?? '*' }}" placeholder="Dostęp">
		<input id="wforums_langs_id" class="micro12" type="hidden" name="langs_id" value="{{ $data[0]->langs_id ?? Session::get('language') }}" placeholder="Język">
		{{-- <div class="micro12"> --}}
			<button>{{ $settings['btnsave'] }}</button>
		{{-- </div> --}}
	</form>
	{{-- @if(isset($data)) --}}
	{{-- {{Session::get('language')}} --}}
	{{-- <pre>{{print_r($data[0], true)}}</pre> --}}
	{{-- @endif --}}
@endsection
@push('custom_js')
<script type="text/javascript">
	var backend_prefix = $('meta[name="backend-prefix"]').attr('content');
	$('#wforums_title_txt').on('keyup', function(e){
		$('#wforums_title_slug').val(str_slug($('#wforums_title_txt').val()));
	});
	$('#zmcms_website_forum_frm>button').on('click', function(e){
		e.preventDefault();e.stopPropagation();
		$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
		$('#ajax_dialog_box').fadeIn( "slow", function() {});
		$('#ajax_dialog_box_content').html('<div class="msg ok"><div class="loader"></div></div>');
		tinymce.triggerSave();
		$.ajax({
			type: 'POST',
			url: "/"+backend_prefix+"/forums/create/save",
			data: new FormData(document.getElementById('zmcms_website_forum_frm')),
			processData: false, contentType: false,
			success: function(data){
				$('#ajax_dialog_box_content').html(data);
			},
			statusCode: {
				500: function(xhr) {$('#ajax_dialog_box_content .msg').html('<div class="msg error">'+xhr.status+'<br>'+xhr.responseText+'</div>');},
				419: function(xhr){$('#ajax_dialog_box_content .msg').html('<div class="msg error"><pre>'+xhr.responseText+'</pre></div>');},
				404: function(xhr){$('#ajax_dialog_box_content .msg').html('<div class="msg error">Nie znaleziono skryptu</div>');},
				405: function(xhr){$('#ajax_dialog_box_content .msg').html('<div class="msg error">'+xhr.status+'<br>'+xhr.responseText+'</div>');}
			}
		});
	})
</script>
@endpush
