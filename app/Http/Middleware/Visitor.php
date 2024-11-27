<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Visitor as VisitorModel;

class Visitor
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip = hash('sha512', $request->ip());
        if (!VisitorModel::query()->where('ip', $ip)->where('date', today())->exists())
            VisitorModel::create([
                'ip' => $ip,
                'date' => today(),
            ]);
        return $next($request);
    }
}
