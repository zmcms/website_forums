$(document).ready(function(){
	$('#zwf_comment_frm').on('submit', function(e){
		var backend_prefix = $('meta[name="backend-prefix"]').attr('content');
		e.preventDefault();e.stopPropagation();
		$('#ajax_dialog_box').fadeIn( "slow", function() {});
		$('#ajax_dialog_box_content').html('<div class="msg ok"><div class="loader"></div></div>');
		$.ajax({
			type: 'POST',
				url: "/forums/comment/create",
				data: new FormData(document.getElementById('zwf_comment_frm')),
				processData: false,
				contentType: false,
				success: function(data){

					// var resultset = JSON.parse(data);
					// $('#ajax_dialog_box_content').html('<div class="msg '+resultset.result+'">'+resultset.code+': '+resultset.msg+'</div>');
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
	});
});
