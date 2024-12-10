<?php

namespace App\Http\Controllers;

use App\Models\Subdomain;
use Illuminate\Http\Request;

class SubdomainController extends Controller
{
    public function index(Request $request)
    {
        $subdomain = $request->route('subdomain'); // Hozzáférés az aldomainhez
        $record = Subdomain::where('subdomain', $subdomain)->first();
        
        if(!$record) {
            return response()->json([
                'error' => 'Érvénytelen aldomain',
            ], 404);
        }

        return response()->json([
            'message' => "Üdvözlünk az $subdomain aldomainen!",
            'details' => $record,
        ]);
        
        /*
        return response()->json([
            'message' => "Üdvözlünk az $subdomain aldomainen!",
        ]);
        */
    }
}
