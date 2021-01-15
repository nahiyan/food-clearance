@extends("layouts.base")

@section("content")
<div class="is-box">
    <h1 class="title">Create</h1>

    <form method="POST" action="{{ route("reports.store") }}" enctype="multipart/form-data">
        @csrf

        <div class="field">
            <label for="type" class="label">{{ __('Type') }}</label>

            <div>
                <div class="select">
                    <select name="type" id='report-type' required>
                        <option value="food">Food</option>
                        <option value="company">Company</option>
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
            <label for="Target" class="label">{{ __('Target') }}</label>

            <div>
                <div class="select" id='target-selection-food'>
                    <select name="target-food">
                        @foreach($foods as $food)
                        <option value='{{ $food->id }}'>{{ $food->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="select hidden" id='target-selection-company'>
                    <select name="target-company">
                        @foreach($companies as $company)
                        <option value='{{ $company->id }}'>{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>

                @error('Target')
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