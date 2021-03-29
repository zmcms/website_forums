<?php
namespace Zmcms\WebsiteForums\Backend\Db;
use Illuminate\Support\Facades\DB;
use Session;
use Request;
class Queries{
	public static function forum_create($data){
		$forum = (Config('database.prefix')??'').'website_forums';
		$forum_name = (Config('database.prefix')??'').'website_forums_names'; // Nazwy forum
		$token = hash ('sha256', date('Ymd').rand(0,1000));
		try{
			DB::beginTransaction();
				DB::table($forum)->insert([
					'token'		=>	$token,
					'access'	=>	$data['access'],
					'active'	=>	$data['active'] ?? 0,
					'obj_type'	=>	$data['obj_type'] ?? null,
					'obj_token'	=>	$data['obj_token'] ?? null,
				]);
				DB::table($forum_name)->insert([
					'token'		=>	$token,
					'langs_id'	=>	$data['langs_id'],
					'name'		=>	$data['name'],
					'slug'		=>	$data['slug'],
					'intro'		=>	$data['intro'],
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
				'code'		=>	$e->getCode().$e->getMessage(),
				'msg' 		=>	___('Nie można utworzyć nowego forum'),
			]);
		}
	}


	/**
	 * USUWANIE FORUM
	 */
	public static function forum_delete($token){
		$forum = (Config('database.prefix')??'').'website_forums';
		try{
			DB::beginTransaction();
				DB::table($forum)->where('token', $token)->delete();
			DB::commit();
			return json_encode([
				'result'	=>	'ok',
				'code'		=>	'ok',
				'msg' 		=>	___('Usunięto forum'),
			]);
		}catch(\Illuminate\Database\QueryException $e){
			DB::rollBack();
			return json_encode([
				'result'	=>	'error',
				'code'		=>	$e->getCode(),
				'msg' 		=>	___('Nie można usunąć forum'),
			]);
		}
	}

	/**
	 * PODPINANIE FORUM POD OBIEKT, NP. ARTYKUŁ
	 */
	public static function forum_connect($token, $obj_type, $obj_token){
		$forum = (Config('database.prefix')??'').'website_forums';
		try{
			DB::beginTransaction();
				DB::table($forum)->where('token', $token)->update([
					'obj_type'	=> $obj_type,
					'obj_token'	=> $obj_token,
				]);
			DB::commit();
			return json_encode([
				'result'	=>	'ok',
				'code'		=>	'ok',
				'msg' 		=>	___('Podłączono forum'),
			]);
		}catch(\Illuminate\Database\QueryException $e){
			DB::rollBack();
			return json_encode([
				'result'	=>	'error',
				'code'		=>	$e->getCode(),
				'msg' 		=>	___('Nie można podłączyć forum'),
			]);
		}
	}

	/**
	 * Aktualizacja danych forum (nie komentarzy)
	 */

	public static function forum_update(){
		$forum = (Config('database.prefix')??'').'website_forums';
		$forum_name = (Config('database.prefix')??'').'website_forums_names'; // Nazwy forum
		try{
			DB::beginTransaction();
				DB::table($forum)->where('token', $token)->update([
					'token'		=>	$data['data']['token'],
					'access'	=>	$data['data']['access'],
					'active'	=>	$data['data']['active'],
					'obj_type'	=>	$data['data']['obj_type'],
					'obj_token'	=>	$data['data']['obj_token'],
				]);
				DB::table($forum_name)->where('token', $token)->update([
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
				'msg' 		=>	___('Zaktualizowano forum'),
			]);
		}catch(\Illuminate\Database\QueryException $e){
			DB::rollBack();
			return json_encode([
				'result'	=>	'error',
				'code'		=>	$e->getCode(),
				'msg' 		=>	___('Nie można zaktualizować forum'),
			]);
		}
	}
}
