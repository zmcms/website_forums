<?php
namespace Zmcms\WebsiteForums\Backend\Controllers;
use Illuminate\Http\Request;
use Zmcms\WebsiteForums\Backend\Db\Queries as Q;
class ZmcmsWebsiteForumsController extends \App\Http\Controllers\Controller
{
	public function forums_list(Request $request){
		$r = $request->all();
		$resultset = Q::forum_list();
		return view('themes.'.(Config('zmcms.frontend.theme_name') ?? 'zmcms').'.backend.zmcms_website_forums_panel', compact('resultset'));
	}
	public function forums_create_frm(Request $request){
		$data = $request->all();
		$settings=[
			'title'	=> ___('Nowe forum'),
			'action' => 'create',
			'btnsave' => ___('Zapisz'),
			'btnsave_and_publish' => __('Zapisz i opublikuj'),
		];
		
		return view('themes.'.(Config('zmcms.frontend.theme_name') ?? 'zmcms').'.backend.zmcms_website_forums_frm', compact('data', 'settings'));
	}
	public function forums_save(Request $request){
		$data = $request->all();
		// return '<pre>'.print_r($data, true).'</pre>'; 	
		// GDY AKCJA NIE USTAWIONA
		if(!isset($data['action']))
			return json_encode([
				'result'	=>	'error',
				'code'		=>	$e->getCode(),
				'msg' 		=>	___('Nie można utworzyć nowego forum'),
			]);
		switch ($data['action']) {
			case 'create':	{ return Q::forum_create($data); break; } // Tworzenie nowego forum
			case 'update':	{ return Q::forum_update($data); break; } // Aktualizacja podstawowych danych forum (bez aktywacji i podpięcia pod inne obiekty)
			default:		{break;}
		}

		
	}
	public function forums_delete($token){
		return Q::forum_delete($token);
	}
	public function forums_update_frm($token){
		$data = Q::forum_get($token);
		if(count($data)>1) return json_encode([
				'result'	=>	'error',
				'code'		=>	'to_many_results',
				'msg' 		=>	___('Nie można edytować forum. Spodziewano się pojedynczego rekordu'),
			]);;
		if(count($data)<1) return json_encode([
				'result'	=>	'error',
				'code'		=>	'not_found',
				'msg' 		=>	___('Nie można edytować forum. Nie znaleziono rekordu'),
			]);;

		$settings=[
			'title'	=> ___('Edycja forum'),
			'action' => 'update',
			'btnsave' => ___('Aktualizuj'),
			'btnsave_and_publish' => __('Zapisz i opublikuj'),
		];
		
		return view('themes.'.(Config('zmcms.frontend.theme_name') ?? 'zmcms').'.backend.zmcms_website_forums_frm', compact('data', 'settings'));


		return ':'.$token;
	}
	/**
	 * LINKOWANIE FORUM
	 */
	public function forums_link_frm($token){
		$routes =  \Zmcms\WebsiteNavigations\Backend\Db\Queries::routes_list();
		return view('themes.'.(Config('zmcms.frontend.theme_name') ?? 'zmcms').'.backend.zmcms_website_forums_ajax_routes', compact('routes'));
		// return 'forums_link_frm: <pre>'.print_r($routes, true).'</pre>';	
	}
	public function forums_configuration_frm(Request $request){
	
	}
	public function forums_create_frm_save(Request $request){

	}
}
