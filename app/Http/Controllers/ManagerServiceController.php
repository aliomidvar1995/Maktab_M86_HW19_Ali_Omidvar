<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagerServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request->search);
        if($request->date) {
            $services = Service::where('date', $request->date)
                        ->get();
            $count = Service::where('date', $request->date)
                        ->count();
            return view('managerservice.index', compact('services', 'count'));
        }
        if($request->service) {
            $services = Service::where('service', $request->service)
                        ->get();
            $count = Service::where('service', $request->service)
                        ->count();
            return view('managerservice.index', compact('services', 'count'));
        }
        $services = Service::all();
        $count = Service::all()->count();
        return view('managerservice.index')
        ->with('services', $services)
        ->with('count', $count);
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
