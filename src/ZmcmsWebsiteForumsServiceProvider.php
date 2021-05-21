<?php
namespace Zmcms\WebsiteForums;
use Illuminate\Support\ServiceProvider;
class ZmcmsWebsiteForumsServiceProvider extends ServiceProvider{

	public function register(){
		$this->app->make('Zmcms\WebsiteForums\Backend\Controllers\ZmcmsWebsiteForumsController');
		$this->app->make('Zmcms\WebsiteForums\Frontend\Controllers\ZmcmsWebsiteForumsController');
		require_once(__DIR__.'/helpers.php');
	}

	public function boot(){
		$this->loadMigrationsFrom(__DIR__.'/migrations');
		// $this->loadRoutesFrom(__DIR__.DIRECTORY_SEPARATOR.'backend'.DIRECTORY_SEPARATOR.'routes'.DIRECTORY_SEPARATOR.'website_forums.php');
		// $this->loadRoutesFrom(__DIR__.DIRECTORY_SEPARATOR.'backend'.DIRECTORY_SEPARATOR.'routes'.DIRECTORY_SEPARATOR.'website_forums_console.php');
		$this->publishes([
			__DIR__.'/config' => base_path('config/zmcms/website_forums'),
			__DIR__.'/backend/css' => base_path('public/themes/zmcms/backend/css/'),
			__DIR__.'/backend/js' => base_path('public/themes/zmcms/backend/js/'),
			__DIR__.'/backend/views' => base_path('resources/views/themes/zmcms/backend'),
			__DIR__.'/frontend/css' => base_path('public/themes/zmcms/frontend/css/'),
			__DIR__.'/frontend/js' => base_path('public/themes/zmcms/frontend/js/'),
			__DIR__.'/frontend/views' => base_path('resources/views/themes/zmcms/frontend'),
		]);
	}

}
