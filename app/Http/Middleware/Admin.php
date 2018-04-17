<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class admin
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
        if (! Auth::user()->admin)
        {
            $notification = ['message'=>'You don\'t have the permission' ,'alert-type'=>'error'];
            return redirect()->back()->with($notification);
        }

        return $next($request);
    }
}
