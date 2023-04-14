@extends('layouts.app')

@section('title')
    <title></title>
@endsection

@section('content')
    <div class="container">
        <div class="mb-2">
            @if($count <= 1 && $count >= 0)
                <p class="text-danger">- {{ $user->name }}</p>
            @endif
            @if($count <= 5 && $count >= 2)
                <p class="text-warning">- {{ $user->name }}</p>
            @endif
            @if($count > 5)
                <p class="text-success">- {{ $user->name }}</p>
            @endif
            <p>تعداد: {{ $count }}</p>
            @foreach($user->services as $service)
                <p>{{ $service->service }} به مدت {{ $service->time }} و به مبلغ {{ $service->price }} در تاریخ {{ $service->date }} از {{ $service->start }} تا {{ $service->end }}</p>
            @endforeach
        </div>
    </div>
@endsection