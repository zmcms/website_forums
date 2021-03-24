@extends('themes.zmcms.backend.main')
@section('content')
<h1 class="">{{$settings['title'] ?? ___('Forum')}}</h1>
<div class="control_belt">
    <div class="micro12 ">
        <button class="back_btn"><span class="fas fa-angle-left"></span>Powrót</button>
    </div>
</div>
<div>
    <form class="micro12" id="zmcms_website_offer_frm" method="post" enctype="multipart/form-data">
		<label class="micro12">
		    <span class="micro12 mini2">Nazwa</span>
		    <input id="wforums_title_txt" class="micro12 mini10 required" type="text" name="names[name]" value="{{$data['data']->name ?? null}}" placeholder="Tytuł">
		    <input id="wforums_title_slug" class="micro12 mini10 required" type="text" name="names[slug]" value="{{$data['data']->slug ?? null}}" placeholder="Slug">
		</label>
				<label class="micro12">
		    <span class="micro12 mini2">Nazwa</span>
		    
		</label>
		<label class="micro12">
		    <span class="micro12">Intro</span>
		    <textarea class="richeditor micro12" type="text" cols="25" rows="40" name="names[intro]" placeholder="Wstęp do właściwej treści artykułu" >
		        {{$data['data']->intro ?? null}}
		    </textarea>
		</label>
	</form>
	@if(isset($data))
	<pre>{{print_r($data, true)}}</pre>
	@endif
@endsection
