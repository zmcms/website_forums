<?php
namespace Zmcms\WebsiteForums\Backend\Db;
use Illuminate\Support\Facades\DB;
use Session;
use Request;
class Queries{
	public static function forum_create(){
		$forum = (Config('database.prefix')??'').'website_forums';
		$forum_name = (Config('database.prefix')??'').'website_forums_names'; // Nazwy forum
		try{
			DB::beginTransaction();
				DB::table($forum)->insert([
					'token'		=>	$data['data']['token'],
					'access'	=>	$data['data']['access'],
					'active'	=>	$data['data']['active'],
					'obj_type'	=>	$data['data']['obj_type'],
					'obj_token'	=>	$data['data']['obj_token'],
				]);
				DB::table($forum_name)->insert([
					'token'		=>	$data['data']['token'],
					'langs_id'	=>	$data['data']['langs_id'],
					'name'		=>	$data['data']['name'],
					'slug'		=>	$data['data']['slug'],
					'intro'		=>	$data['data']['intro'],
				]);
			DB::commit();
			return json_encode([
				'result'	=>	'ok',
				'code'		=>	'ok',
				'msg' 		=>	___('Utworzono nowe forum'),
			]);
		}catch(\Illuminate\Database\QueryException $e){
			DB::rollBack();
			return json_encode([
				'result'	=>	'error',
				'code'		=>	$e->getCode(),
				'msg' 		=>	___('Nie można utworzyć nowego forum'),
			]);
		}
	}
}
