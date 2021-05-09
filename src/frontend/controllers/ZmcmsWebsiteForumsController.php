<?php
namespace Zmcms\WebsiteForums\Frontend\Controllers;
use Illuminate\Http\Request;
use Zmcms\WebsiteForums\Frontend\Db\Queries as Q;
use View;
class ZmcmsWebsiteForumsController extends \App\Http\Controllers\Controller
{
	public function connect_forum($obj_type, $obj_token, $params){
		$settings=[
			'_action' => 'forms.comment_form.create.comment',
		];
		return '<pre>
		'.print_r([$obj_type, $obj_token, $params], true).'
		</pre>';
		return view('themes.'.(Config('zmcms.frontend.theme_name') ?? 'zmcms').'.frontend.zmcms_website_forums_comment_frm', compact('settings'));

		return 'forum connected';
	}

	public function create_comment(Request $request){
		$err=[];
		$data = $request->all();
		if(!isset($data['check_agreement'])){$err[]=___('Musisz potwierdzic zgodę z postanowieniami regulaminu.');}
		if($err!=[]){
			$str =  '<ul>';
			foreach ($err as $e)
				$str.='<li>'.$e.'</li>';
			$str .= '</ul>';
			return $str;
		}
		$data['email'] = $data['zwf_mail'];
		$data['nick'] = $data['zwf_nick'];
		$data['show_email'] = (isset($data['check_show_email']))?1:0;
		return Q::create_comment($data);
		return '<pre>'.print_r($data, true).'</pre>';
	}
}


/**
 * Array
(
    [_id] => comment_form
    [_action] => forms.comment_form.create.comment
    [zwf_mail] => dfg@adres.pl
    [zwf_nick] => sdf
    [comment] => sadf
    [check_agreement] => on
    [check_show_email] => on






)
 */