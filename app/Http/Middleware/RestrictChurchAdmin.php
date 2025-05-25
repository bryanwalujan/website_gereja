<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestrictChurchAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('church_admin')->check()) {
            $churchAdmin = Auth::guard('church_admin')->user();
            $churchId = $request->route()->parameter('record')?->church_id ?? $request->input('church_id');

            if ($churchId && $churchAdmin->church_id != $churchId) {
                abort(403, 'Anda tidak memiliki akses ke data gereja ini.');
            }
        }

        return $next($request);
    }
}