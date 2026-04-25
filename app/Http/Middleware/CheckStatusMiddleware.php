<?php

namespace App\Http\Middleware;

use App\Models\Task;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckStatusMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Task::where('due_date', '<', now())
            ->where('status', '!=', 'complete')
            ->update(['status' => 'overdue']);


        return $next($request);
    }
}
