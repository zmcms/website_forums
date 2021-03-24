<?php
Route::middleware(['BackendUser'])->group(function () {
	/**
	 * WYŚWIETLA LISTA FORÓW W SYSTEMIE
	 */
	Route::get($prefix.'/forums/list', 
		'Zmcms\WebsiteArticles\Backend\Controllers\ZmcmsWebsiteForumsController@forums_list')
		->name('website_forums');
	/**
	 * WYŚWIETLA FORMULARZ W TRYBIE DODAWANIA NOWEGO FORUM 
	 */
	Route::get($prefix.'/forums/create/frm',
		'Zmcms\WebsiteArticles\Backend\Controllers\ZmcmsWebsiteForumsController@forums_create_frm')	
		->name('website_forums');
	/**
	 * WYŚWIETLA FORMULARZ W TRYBIE AKTUALIZACJI FORUM 
	 */
	Route::get($prefix.'/forums/update/frm/{token}',
		'Zmcms\WebsiteArticles\Backend\Controllers\ZmcmsWebsiteForumsController@forums_create_frm')	
		->name('website_forums');
	/**
	 * Konfiguracja forum (plik w katalogu /config/motyw/website_forums.php)
	 */
	Route::get($prefix.'/forums/configuration',
		'Zmcms\WebsiteArticles\Backend\Controllers\ZmcmsWebsiteForumsController@forums_create_frm')	
		->name('website_forums');
});
