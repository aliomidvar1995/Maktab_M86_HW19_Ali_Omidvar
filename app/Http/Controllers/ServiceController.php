<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\ServiceItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all()
                ->where('user_id', '=', Auth::user()->id);

        // dd($services);

        return view('services.index')
        ->with('services', $services);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        $service = explode('-', $request->service);

        $start = $request->validated()['time'];
        $end = date("H:i", strtotime($start . "+$service[1] minutes"));

        $count = 0;
        $comp = Service::select('date', 'start', 'end')->get();
        
        foreach ($comp->toArray() as $key => $value) {
            if($request->validated()['date'] == $value['date']) {
                if(($start >= $value['start'] && $end >= $value['end'] && $start <= $value['end']) 
                || ($start <= $value['start'] && $end <= $value['end'] && $end >= $value['start']) 
                || ($start <= $value['start'] && $end >= $value['end']) 
                || ($start >= $value['start'] && $end <= $value['end'])) {
                    $count++;
                    if($count == 2) {
                        return to_route('dashboard')->with('time', "you can't reserve this time");
                    }
                }
            }
        }

        Service::create([
            'service' => $service[0],
            'date' => $request->validated()['date'],
            'time' => $service[1],
            'price' => $service[2],
            'start' => $start,
            'end' => $end,
            'tracking_code' => Str::random(20),
            'user_id' => Auth::user()->id
        ]);
        return to_route('services.index')
        ->with('success', 'اطلاعات با موفقیت ثبت شدند');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $service = Service::find($id);

        return view('services.show')
        ->with('service', $service);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $service = Service::find($id);

        return view('services.edit')
        ->with('service', $service);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Service::destroy($id);

        return to_route('services.index')->with('success', 'سرویس با موفقیت لغو شد');
    }
}
