<form id="zwf_comment_frm" class="micro12" id="zmcms_website_forum_frm" method="post" enctype="multipart/form-data">
	<input type="hidden" name="_id" value="website_forums_comment_form" >
	@if(isset($settings['_action']))
		<input type="hidden" name="_action" value="{{$settings['_action']}}" >
	@endif
	<input type="email" id="zwf_mail" name="zwf_mail" placeholder="{{___('Podaj swój e-mail')}}" required="required" />
	<input type="text" id="zwf_nick" name="zwf_nick" placeholder="{{___('Przedstaw się')}}" required="required" />
	<textarea class="richeditor micro12" id="wforums_intro" type="text" cols="25" rows="10" name="intro" placeholder="{{___('Twój komentarz')}}" ></textarea>
	<button id="df45ff">{{___('Publikuj')}}</button>
</form>
<div class="zwf_comments">
	
</div>