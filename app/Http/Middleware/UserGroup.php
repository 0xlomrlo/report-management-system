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
        $report = \App\Report::findOrFail($request->route('uuid'))->with('group')->first();
            if ($request->user()->hasGroup($report->group)) {
                return $next($request);
        }
        abort(403);
    }
}
