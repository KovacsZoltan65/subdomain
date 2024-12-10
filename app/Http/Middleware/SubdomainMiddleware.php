<?php

namespace App\Http\Middleware;

use App\Models\Subdomain;
use Closure;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class SubdomainMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Alapértelmezett aldomain kiszűrése
        $subdomain = explode('.', $request->getHost())[0];

        $subdomainData = Cache::remember("subdomain_{$subdomain}", 3600, function () use ($subdomain) {
            return Subdomain::where('subdomain', $subdomain)->first();
        });

        if (!$subdomainData) {
            return response()->json(['error' => 'Érvénytelen aldomain!'], 404);
        }
\Log::info('$subdomainData: ' . print_r($subdomainData, true));
        // Adatbázis-kapcsolat dinamikus konfigurálása
        config([
            'database.connections.tenant' => [
                'driver'    => 'mysql',
                'host'      => $subdomainData->db_host,
                'port'      => $subdomainData->db_port,
                'database'  => $subdomainData->db_name,
                'username'  => $subdomainData->db_user,
                'password'  => $subdomainData->db_password,
                'charset'   => 'utf8mb4',
                'collation' => 'utf8mb4_unicode_ci',
                'prefix'    => '',
            ],
        ]);

        // Átállás a dinamikus adatbázis-kapcsolatra
        DB::purge('tenant');
        DB::setDefaultConnection('tenant');

        return $next($request);
    }
}
