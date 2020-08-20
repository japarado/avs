<?php

namespace App\Http\Middleware;

use Closure;

class PollingStationAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		if(session('polling-station-auth'))
		{
			$request->session()->keep(['polling-station-auth']);
		}
		else 
		{
			return redirect()->action('PollingStationController@authpage');
		}

        return $next($request);
    }
}
