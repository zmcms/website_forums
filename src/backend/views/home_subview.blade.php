<div class="home_module micro12 small6 medium3">
    <h1><span class="fas fa-bars"></span> Fora</h1>
    <h2>Backend</h2>
    <button id="btn_zfha1">Lista</button>
    <button id="btn_zfha2">Nowe forum</button>
</div>
@push('custom_js')
<script type="text/javascript">
	var backend_prefix = $('meta[name="backend-prefix"]').attr('content');
	$('#btn_zfha1').on('click', function(e){
		e.preventDefault();e.stopPropagation();
		var o = $(this).attr('id'); 
		// alert(o);
		location.href = "/"+backend_prefix+"/forums/list";
		return false;
	});
	$('#btn_zfha2').on('click', function(e){
		e.preventDefault();e.stopPropagation();
		var o = $(this).attr('id'); 
		// alert(o);
		location.href = "/"+backend_prefix+"/forums/create/frm";
		return false;
	});
</script>
@endpush