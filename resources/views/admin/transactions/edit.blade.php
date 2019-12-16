@extends("layouts.admin")

@section("content")
    <div class="is-box">
        <h1 class="title">Edit</h1>
    
        <form method="POST" action="{{ route("companies.update", $entry) }}">
            @csrf
            @method("PUT")
    
            <div class="field">
                <label for="name" class="label">{{ __('Name') }}</label>
    
                <div>
                <input id="name" type="text" class="input" name="name" value="{{ $entry->name }}" required autofocus>
    
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
    
            <div class="field">
                <button type="submit" class="button is-outlined is-success">
                    {{ __('Update') }}
                </button>
            </div>
        </form>
    </div>
@endsection