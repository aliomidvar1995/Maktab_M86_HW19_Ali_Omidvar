@extends('layouts.app')

@section('title')
    <title>پروفایل</title>
@endsection

@section('content')
    <div class="w-25 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3>{{ Auth::user()->name }}</h3>
            </div>
            <div class="card-body">
                ایمیل: {{ Auth::user()->email }}
            </div>
        </div>
    </div>
@endsection