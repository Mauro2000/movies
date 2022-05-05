<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\IPBLOCK;
use Error;
use Illuminate\Http\Request;

class ipBlocksMidleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {


        $IpBlocks=IPBLOCK::where('IpAdress','=',request()->getClientIp())->where('status','=','1')->count();

        if($IpBlocks == '1'){
            return abort(429);
        }
        //return $IpBlocks;
        return $next($request);

    }
}
