<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $subdomain;
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $subdomain)
    {
        //dd($request->all(), $subdomain);
        return view('home');
    }

    public function getData(Request $request, $subdomain){
        //\Log::info('$request->all(): ' . print_r($request->all(), true));
        //\Log::info('$subdomain: ' . $subdomain);
        return response()->json([
            'name' => 'USER 01',
            'email' => 'USER_01@COMPANY.COM',
        ]);
    }
    
    public function saveData(Request $request, $subdomain){
        //\Log::info('$request->all(): ' . print_r($request->all(), true));
        //\Log::info('$subdomain: ' . $subdomain);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
