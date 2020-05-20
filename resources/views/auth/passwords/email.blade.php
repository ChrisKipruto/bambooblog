@extends('layouts.app')

@section('content')
<title>{{config('app.name', 'Bamboo-Blog')}} &bull; Password Reset</title>
<div class="container">
    <div class="row d-flex justify-content-center pt-5">
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
            @if (session('status'))
                <div class="w-full bg-green-200 border-l-4 border-green-500 mb-2 p-3 shadow-md" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" placeholder="e.g me@mydomain.com" class="w-full shadow-md bg-white border border-white rounded px-3 py-3 leading-tight focus:bg-white focus:outline-none @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-pink">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
