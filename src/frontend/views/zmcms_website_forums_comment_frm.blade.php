<div class="zmcms_website_forum">
	<input type="checkbox" id="zwf_comment_frm_open" name="check_show_email" >
	<label class="btn open_frm" for="zwf_comment_frm_open">{{ ___('Dodaj komentarz') }}</label>
	<label class="btn close_frm" for="zwf_comment_frm_open">{{ ___('Ukryj formularz') }}</label>
	<form id="zwf_comment_frm" class="micro12" id="zmcms_website_forum_frm" method="post" enctype="multipart/form-data">
		<input type="hidden" name="_id" value="comment_form" >
		<input type="hidden" name="_action" value="{{$settings['_action']}}" >
		<input type="email" id="zwf_mail" name="zwf_mail" placeholder="{{___('Podaj swój e-mail')}}" required="required" />
		<input type="text" id="zwf_nick" name="zwf_nick" placeholder="{{___('Przedstaw się')}}" required="required" />
		<textarea class="richeditor micro12" id="wforums_intro" type="text" cols="25" rows="10" name="comment" placeholder="{{___('Twój komentarz')}}" ></textarea>
		<input type="checkbox" id="check_agreement" name="check_agreement" >
		<label for="check_agreement">{{ ___('Zgadzam się z postanowieniami regulaminu obowiązującego w ramach niniejszego serwisu.') }}</label>
		<input type="checkbox" id="check_show_email" name="check_show_email" >
		<label for="check_show_email">{{ ___('Pokaż mój mail przy komentarzu.') }}</label>
		<button id="df45ff">{{___('Publikuj')}}</button>
	</form>
	<div class="zwf_comments">
		
	</div>
</div>
