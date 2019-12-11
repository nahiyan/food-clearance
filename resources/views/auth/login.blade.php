@extends('layouts.base')

@section('content')
    <h1 class="title">Login</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="field">
            <label for="email" class="label">{{ __('E-Mail Address') }}</label>

            <div>
                <input id="email" type="email" class="input" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="field">
            <label for="password" class="label">{{ __('Password') }}</label>

            <div>
                <input id="password" type="password" class="input" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="field">
            <div class="control">
                <label class="checkbox" for="remember">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    Remember me
                </label>
            </div>
        </div>

        <div class="field">
            <button type="submit" class="button is-outlined">
                {{ __('Login') }}
            </button>
        </div>
    </form>
@endsection
