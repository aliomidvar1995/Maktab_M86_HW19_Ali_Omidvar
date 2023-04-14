<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        return view('users.index')
        ->with('user', $user);
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
    public function store(UpdateUserRequest $request)
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
    public function edit()
    {
        $user = Auth::user();
        return view('users.edit')
        ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request)
    {
        $id = auth()->user()->id;
        User::where('id', $id)
                    ->Update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->password)
                    ]);
        return to_route('users.index')->with('success', 'پروفایل با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        User::destroy(Auth::user()->id);
        // Auth::guard()->logout();
        session()->flush();
        session()->regenerateToken();


        return to_route('home.index');
    }
}
