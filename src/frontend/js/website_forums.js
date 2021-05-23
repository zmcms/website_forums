$(document).ready(function(){
	$('#zwf_comment_frm').on('submit', function(e){
		var backend_prefix = $('meta[name="backend-prefix"]').attr('content');
		e.preventDefault();e.stopPropagation();
		action = $("input[name='_action']").val();
		switch(action){
			case 'forms.comment_form.create.comment' :{ return create_comment(); break;}
			case 'forms.comment_form.create.comment2' :{alert(2); break;}
		}
		return false;
	});
	function create_comment(){
		// alert(11); 
		$('#ajax_dialog_box').fadeIn( "slow", function() {});
		$('#ajax_dialog_box_content').html('<div class="msg ok"><div class="loader"></div></div>');
		$.ajax({
			type: 'POST',
				url: "/forums/comment/create",
				data: new FormData(document.getElementById('zwf_comment_frm')),
				processData: false,
				contentType: false,
				success: function(data){
					$('#ajax_dialog_box_content').html('<div class="msg ok">'+data+'</div>');
				},
				statusCode: {
					500: function(xhr) {$('#ajax_dialog_box_content').html('<div class="msg error">'+xhr.status+'<br>'+xhr.responseText+'</div>');},
					419: function(xhr){$('#ajax_dialog_box_content').html('<div class="msg error"><pre>'+xhr.responseText+'</pre></div>');},
					404: function(xhr){$('#ajax_dialog_box_content').html('<div class="msg error">Nie znaleziono skryptu</div>');},
					405: function(xhr){$('#ajax_dialog_box_content').html('<div class="msg error">'+xhr.status+'<br>'+xhr.responseText+'</div>');}
				}
		});
		return false;
	}
});
