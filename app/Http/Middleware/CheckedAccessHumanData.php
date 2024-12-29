<?php

namespace App\Http\Middleware;

use App\Models\Human;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckedAccessHumanData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $humanId = $request->route('human');
        $human = Human::find($humanId);
        if (isset($human)) {
            if ($human->user->id !== auth()->user()->id) {
                return abort(403);
            }
        }
        return $next($request);
    }
}
