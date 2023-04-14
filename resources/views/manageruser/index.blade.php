@extends('layouts.app')

@section('title')
    <title></title>
@endsection

@section('content')
    <div class="container">
        @foreach ($users as $user)
            <div class="mb-2">
                <p class="d-inline-block">- {{ $user->name }}</p>
                <a class="btn btn-outline-success" href="{{ route('manageruser.show', ['user' => $user]) }}">details</a>
            </div>
        @endforeach
    </div>
@endsection