<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // dd(now()->toTimeString('minute'));
        $serviceItems = ServiceItem::all();
        return view('dashboard')
        ->with('serviceItems', $serviceItems);
    }
}
