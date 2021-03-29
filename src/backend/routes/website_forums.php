<?php
Route::middleware(['BackendUser'])->group(function () {
	$prefix = Config('zmcms.main.backend_prefix');
	/**
	 * WYŚWIETLA LISTA FORÓW W SYSTEMIE
	 */
	Route::any($prefix.'/forums/list', 
		'Zmcms\WebsiteForums\Backend\Controllers\ZmcmsWebsiteForumsController@forums_list')
		->name('website_forums');
	/**
	 * WYŚWIETLA FORMULARZ W TRYBIE DODAWANIA NOWEGO FORUM 
	 */
	Route::any($prefix.'/forums/create/frm',
		'Zmcms\WebsiteForums\Backend\Controllers\ZmcmsWebsiteForumsController@forums_create_frm')	
		->name('website_forums');
	/**
	 * WYŚWIETLA FORMULARZ W TRYBIE AKTUALIZACJI FORUM 
	 */
	Route::any($prefix.'/forums/update/frm/{token}',
		'Zmcms\WebsiteForums\Backend\Controllers\ZmcmsWebsiteForumsController@forums_update_frm')	
		->name('website_forums');
	/**
	 * Zapisywanie zmian w formularzu 
	 */
	Route::post($prefix.'/forums/create/save',
		'Zmcms\WebsiteForums\Backend\Controllers\ZmcmsWebsiteForumsController@forums_save')
		->name('website_forums');
	/**
	 * Konfiguracja forum (plik w katalogu /config/motyw/website_forums.php)
	 */
	Route::any($prefix.'/forums/configuration',
		'Zmcms\WebsiteForums\Backend\Controllers\ZmcmsWebsiteForumsController@forums_configuration_frm')	
		->name('website_forums');
});
