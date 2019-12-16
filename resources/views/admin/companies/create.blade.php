@extends($type == "company" ? "layouts.company" : "layouts.admin")

@section("content")
    <div class="is-box">
        <h1 class="title">Create</h1>
    
        <form method="POST" action="{{ route("companies.store") }}">
            @csrf
    
            <div class="field">
                <label for="name" class="label">{{ __('Name') }}</label>
    
                <div>
                <input id="name" type="text" class="input" name="name" value="{{ old("name") }}" required autofocus>
    
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            @if($type == "admin")
                <div class="field">
                    <label for="user_id" class="label">{{ __('Manager') }}</label>
        
                    <div>
                        <div class="select">
                            <select name="user_id">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ old("user_id") == $user->id ? "selected" : "" }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
            
                        @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            @else
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }} ">
            @endif
    
            <div class="field">
                <button type="submit" class="button is-outlined is-success">
                    {{ __('Create') }}
                </button>
            </div>
        </form>
    </div>
@endsection