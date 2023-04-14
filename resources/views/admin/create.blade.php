@extends('layouts.app')

@section('title')
    
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ایجاد آیتم') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.store') }}">
                        @csrf
                        <div class="row mb-3 gap-3">
                            <label for="item" 
                            class="col-md-4 col-form-label text-md-start">
                                {{ __('آیتم') }}
                            </label>
                            <div class="col-md-6">
                                <input id="item" type="text" 
                                class="form-control @error('item') is-invalid @enderror" 
                                name="item" value="{{ old('item') }}" autofocus>
                                @error('item')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="tracking_code" 
                            class="col-md-4 col-form-label text-md-start">{{ __('مدت') }}</label>
                            <div class="col-md-6">
                                <input id="time" type="text" 
                                class="form-control @error('time') is-invalid @enderror" 
                                name="time" value="{{ old('time') }}" autofocus>
                                @error('time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="tracking_code" 
                            class="col-md-4 col-form-label text-md-start">{{ __('هزینه') }}</label>
                            <div class="col-md-6">
                                <input id="price" type="text" 
                                class="form-control @error('price') is-invalid @enderror" 
                                name="price" value="{{ old('price') }}" autofocus>
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-center">
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ارسال') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection