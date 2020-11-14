<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;

class CheckDate
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param $year
     * @param $month
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->year || !$request->month) {
            return redirect()->route('dashboard.index', [ Carbon::now()->year, Carbon::now()->month]);
        }
        return $next($request);
    }
}
