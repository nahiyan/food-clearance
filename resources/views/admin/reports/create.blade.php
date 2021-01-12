@extends($type == "company" ? "layouts.company" : "layouts.admin")

@section("content")
<div class="is-box">
    <h1 class="title">Create</h1>

    <form method="POST" action="{{ route("reports.store") }}" enctype="multipart/form-data">
        @csrf

        <div class="field">
            <label for="type" class="label">{{ __('Type') }}</label>

            <div>
                <div class="select">
                    <select name="type" required>
                        <option value="food">Food</option>
                        <option value="food">Company</option>
                    </select>
                </div>

                @error('type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="field">
            <label for="body" class="label">{{ __('Body') }}</label>

            <div>
                <textarea id="body" class="textarea" name="body" value="{{ old("name") }}" required></textarea>

                @error('body')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="field">
            <button type="submit" class="button is-outlined is-success">
                {{ __('Create') }}
            </button>
        </div>
    </form>
</div>
@endsection