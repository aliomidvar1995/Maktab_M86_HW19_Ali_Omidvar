@extends('layouts.app')

@section('title')
    
@endsection

@section('content')
    @php
        $newServices = array_unique(array_column($services->toArray(), 'service'));
        $dates = array_unique(array_column($services->toArray(), 'date'));
    @endphp
    <div class="container">
        <div class="w-25 my-3">
            <form action="{{ route('managerservice.index') }}">
                <div class="row">
                    <div class="col">
                        <select class="form-control" name="service" id="">
                            @foreach ($newServices as $newService)
                                <option value="{{ $newService }}">{{ $newService }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <button class="btn btn-outline-success" type="submit">search</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="w-25 my-3">
            <form action="{{ route('managerservice.index') }}">
                <div class="row">
                    <div class="col">
                        <select class="form-control" name="date" id="">
                            @foreach ($dates as $date)
                                <option value="{{ $date }}">{{ $date }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <button class="btn btn-outline-success" type="submit">search</button>
                    </div>
                </div>
            </form>
        </div>
        <p>تعداد: {{ $count }}</p>
        @foreach ($services as $service)
            <ul>
                <li>
                    {{ $service->service }} به مدت {{ $service->time }} و به مبلغ {{ $service->price }} در تاریخ {{ $service->date }} از {{ $service->start }} تا {{ $service->end }}
                </li>
            </ul>
        @endforeach
    </div>
@endsection