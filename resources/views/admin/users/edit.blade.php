@extends("layouts.admin")

@section("content")
    <h1 class="title">Edit</h1>

    <form method="POST" action="{{ route("users.update", $entry) }}">
        @csrf
        @method("PUT")

        <div class="field">
            <label for="name" class="label">{{ __('Name') }}</label>

            <div>
            <input id="name" type="text" class="input" name="name" value="{{ $entry->name }}" required autocomplete="name" autofocus>

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
                <input id="email" type="email" class="input" name="email" value="{{ $entry->email }}" required autocomplete="email">

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
                <input id="password" type="password" class="input" name="password" autocomplete="new-password">

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
                <input id="password-confirm" type="password" class="input" name="password_confirmation" autocomplete="new-password">
            </div>

            @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="field">
            <label for="type" class="label">{{ __('Type') }}</label>

            <div class="select">
                <select name="type">
                    <option value="general" {{ $entry->type == "general" ? "selected" : "" }}>General</option>
                    <option value="company" {{ $entry->type == "company" ? "selected" : "" }}>Company</option>
                    <option value="admin" {{ $entry->type == "admin" ? "selected" : "" }}>Admin</option>
                </select>
            </div>

            @error('type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="field">
            <button type="submit" class="button is-outlined is-success">
                {{ __('Save Changes') }}
            </button>
        </div>
    </form>
@endsection