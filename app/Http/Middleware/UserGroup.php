<?php

namespace App\Http\Middleware;

use Closure;

class UserGroup
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
        $user_groups = App\Group::whereHas('users', function($query) use ($request){
            $query->where('user_id', $request->user()->id);
        })->get();
        
        return $next($request);
    }
}
