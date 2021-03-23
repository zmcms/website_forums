<?php
namespace Zmcms\WebsiteForums\Backend\Middleware;
use Closure;use Session;use URL;class ZmcmsWebsiteForums
{
	public function handle($request, Closure $next){
		return $next($request);
	}
}
