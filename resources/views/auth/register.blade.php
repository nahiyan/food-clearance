@extends('layouts.base')

@section('content')
<h1 class="title">Register</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="field">
            <label for="name" class="label">{{ __('Name') }}</label>

            <div>
                <input id="name" type="text" class="input" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="field">
            <label for="email" class="label">{{ __('E-Mail Address') }}</label>

            <div>
                <input id="email" type="email" class="input" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                <input id="password" type="password" class="input" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="field">
            <label for="password-confirm" class="label">{{ __('Confirm Password') }}</label>

            <div>
                <input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="field">
            <button type="submit" class="button is-outlined is-success">
                {{ __('Register') }}
            </button>
        </div>
    </form>
@endsection
