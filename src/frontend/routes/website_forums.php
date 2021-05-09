<?php
Route::middleware(['FrontendUser'])->group(function () {
	Route::post('/forums/comment/create',
		'Zmcms\WebsiteForums\Frontend\Controllers\ZmcmsWebsiteForumsController@create_comment')
		->name('website_forums');
	
});
