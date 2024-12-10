<?php

namespace App\Http\Controllers;

use App\Models\Subdomain;
use App\Models\Test;
use Illuminate\Http\Request;

class SubdomainController extends Controller
{
    public function index(Request $request)
    {
        $records = Test::all();

        return response()->json([
            'records' => $records
        ]);
    }
}
