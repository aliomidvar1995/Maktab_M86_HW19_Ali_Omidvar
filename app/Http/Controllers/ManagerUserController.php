<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ManagerUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('is_admin', false)
                    ->get();
        
        return view('manageruser.index', compact('users'));
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
    public function show(User $user)
    {
        $three = date('Y-m-d', strtotime("-3 months"));
        $now = date('Y-m-d', time());
        // dd($now);
        $count = $user->services->whereBetween('date', [$three, $now])->count();
        // dd($count);
        return view('manageruser.show', compact('user', 'count'));
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
