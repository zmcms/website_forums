<?php
namespace Zmcms\WebsiteForums\Frontend\Db;
use Illuminate\Support\Facades\DB;
use Session;
use Request;
class Queries{
	public static function create_comment($data){
		$forum = (Config('database.prefix')??'').'website_forums';
		$forum_name = (Config('database.prefix')??'').'website_forums_names'; // Nazwy forum
		$website_forums_comments = (Config('database.prefix')??'').'website_forums_comments'; // Nazwy forum
		$token = hash ('sha256', date('Ymd').rand(0,1000));
		$activation_token = hash ('sha256', date('Ymd').rand(0,1000));
		try{
			DB::beginTransaction();
			DB::table($website_forums_comments)->insert([
				'token'				=> $token,
				'token_reply'		=> $data['token_reply'] ?? null,
				'forum_token'		=> $data['forum_token'],
				'langs_id'			=> $data['langs_id'] ?? Session::get('language'),
				'active'			=> $data['active'],
				'activation_token'	=> $activation_token,
				'email'				=> $data['email'],
				'show_email'		=> $data['show_email'] ?? 0,
				'nick'				=> $data['nick'],
				'comment'			=> $data['comment'],
				]);
			DB::commit();
			return json_encode([
				'result'	=>	'ok',
				'code'		=>	'ok',
				'msg' 		=>	___('Utworzono nowe forum'),
			]);
		}catch(\Illuminate\Database\QueryException $e){
			DB::rollBack();
		}
		
	}
}


/**
 * 
token
token_reply
forum_token
langs_id
active
activation_token
email
show_email
nick
comment
 */