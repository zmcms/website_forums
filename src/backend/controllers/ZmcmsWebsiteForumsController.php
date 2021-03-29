<?php
namespace Zmcms\WebsiteForums\Backend\Controllers;
use Illuminate\Http\Request;
use Zmcms\WebsiteForums\Backend\Db\Queries as Q;
class ZmcmsWebsiteForumsController extends \App\Http\Controllers\Controller
{
	public function forums_list(Request $request){
		$data = [];
		$settings=[
			'title'	=> ___('Lista forów'),
			'action' => 'create',
			'btnsave' => ___('Zapisz'),
			'btnsave_and_publish' => __('Zapisz i opublikuj'),
		];
		return view('themes.'.(Config('zmcms.frontend.theme_name') ?? 'zmcms').'.backend.zmcms_website_forums_list', compact('data', 'settings'));
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
			case 'create':	{ return Q::forum_create($data); break; }
			case 'update':	{break;}
			case 'delete':	{break;}
			default:		{break;}
		}

		
	}
	public function forums_update_frm(Request $request){
	
	}
	public function forums_configuration_frm(Request $request){
	
	}
	public function forums_create_frm_save(Request $request){

	}
}
