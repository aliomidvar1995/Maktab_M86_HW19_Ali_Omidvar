<?php

namespace App\Http\Controllers;

use App\Models\ServiceItem;
use App\Http\Requests\StoreServiceItemRequest;
use App\Http\Requests\UpdateServiceItemRequest;

class ManagerServiceItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serviceItems = ServiceItem::all();
        return view('admin.index')
        ->with('serviceItems', $serviceItems);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceItemRequest $request)
    {
        // dd($request->validated());
        ServiceItem::create([
            'item' => $request->item,
            'time' => $request->time,
            'price' => $request->price
        ]);
        return to_route('admin.index')->with('success', 'آیتم با موفقیت ایجاد شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceItem $serviceItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceItem $serviceItem)
    {
        return view('admin.edit')
        ->with('serviceItem', $serviceItem);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceItemRequest $request, ServiceItem $serviceItem)
    {
        $serviceItem->update([
            'item' => $request->item,
            'time' => $request->time,
            'price' => $request->price
        ]);
        return to_route('admin.index')->with('success', 'آیتم با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceItem $serviceItem)
    {
        $serviceItem->delete();
        return to_route('admin.index')->with('delete', 'آیتم با موفقیت حذف شد');
    }
}
