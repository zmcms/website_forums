@extends('themes.zmcms.backend.main')
@section('content')
<h1 class="">{{___('Zarządzanie forami')}}</h1>
<div id="zmcms_website_articles_control_panel" class="control_belt">
	<div class="micro12 ">
	<button class="back_btn"><span class="fas fa-angle-left"></span>{{___('Powrót')}}</button>
	</div>
</div>
<div id="zmcms_website_articles_control_panel" class="control_subbelt_belt">
	<button id="btn_article_new"><span class="fas fa-plus"></span> {{___('Nowy artykuł')}}</button>
	<button id="btn_article_sort"><span class="fas fa-sort"></span> {{___('Sortowanie')}}</button>
	<input type="text" id="txt_filter" name="filter" placeholder="Szukaj"><button id="btn_article_filter"><span class="fas fa-search"></span> {{___('Szukaj')}}</button>
</div>
<div id="zmcms_website_articles_control_panel_content">
	@include('themes.'.Config('zmcms.frontend.theme_name').'.backend.zmcms_website_forums_list')
</div>
{{-- <pre>{{print_r($resultset, true)}}</pre> --}}
@endsection