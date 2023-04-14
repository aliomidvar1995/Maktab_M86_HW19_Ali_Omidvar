@extends('layouts.app')

@section('title')
    <title>ویرایش پروفایل</title>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ویرایش پروفایل') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', ['id' => Auth::user()->id]) }}">
                        @csrf
                        @method('put')
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('نام') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" 
                                class="form-control @error('name') is-invalid @enderror" name="name" 
                                value="{{ Auth::user()->name }}" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('ایمیل') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" 
                                class="form-control @error('email') is-invalid @enderror" name="email" 
                                value="{{ Auth::user()->email }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('رمز عبور') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" 
                                class="form-control @error('password') is-invalid @enderror" 
                                value="{{ old('password') }}"
                                name="password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('تأیید رمز عبور') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" 
                                class="form-control" name="password_confirmation"
                                value="{{ old('password_confirmation') }}">
                            </div>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('ویرایش') }}
                            </button>
                        </div>
                    </form>
                    <form class="d-flex justify-content-center mt-2" action="{{ route('users.delete') }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">حذف</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection