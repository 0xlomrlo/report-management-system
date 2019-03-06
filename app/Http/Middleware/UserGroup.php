<?php

namespace App\Http\Middleware;

use Closure;

class UserGroup
{
    public function handle($request, Closure $next)
    {
        $report = \App\Report::where('id', $request->route('uuid'))->with('group')->first();
        if (!is_null($report->group)) {
            if ($request->user()->hasGroup($report->group->id)) {
                return $next($request);
            }
        }
        abort(403);
    }
}
