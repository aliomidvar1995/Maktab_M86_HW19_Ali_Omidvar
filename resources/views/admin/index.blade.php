@extends('layouts.app')

@section('title')
    
@endsection

@section('content')
    <div class="container">
        @if (session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
        @if (session()->get('delete'))
        <div class="alert alert-danger">
            {{ session()->get('delete') }}
        </div>
        @endif
        <div class="me-5">
            <a class="btn btn-outline-success" href="{{ route('admin.create') }}">ایجاد آیتم جدید</a>
            @foreach ($serviceItems as $serviceItem)
                <div class="d-flex gap-3 mt-3">
                    <ul>
                        <li>{{ $serviceItem->item }} به مدت {{ $serviceItem->time }} دقیقه و به مبلغ {{ $serviceItem->price }}</li>
                    </ul>
                    <a class="btn btn-outline-warning" 
                    href="{{ route('admin.edit', ['serviceItem' => $serviceItem]) }}">ویرایش</a>
                    <form action="{{ route('admin.delete', ['serviceItem' => $serviceItem]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-outline-danger" type="submit">حذف</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection