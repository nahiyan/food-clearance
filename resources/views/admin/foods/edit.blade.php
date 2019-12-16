@extends("layouts.admin")

@section("stylesheets")
    <link rel="stylesheet" href="https://unpkg.com/buefy/dist/buefy.min.css">
    @parent
@endsection

@section("content")
    <div class="is-box">
        <h1 class="title">Edit</h1>
    
        <form method="POST" action="{{ route("foods.update", $entry) }}" enctype="multipart/form-data">
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
                <label for="price" class="label">{{ __('Price') }}</label>
    
                <div>
                    <input type="number" class="input" value="{{ $entry->price }}" name="price" required>
    
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="field">
                <label for="quantity" class="label">{{ __('Quantity') }}</label>
    
                <div>
                    <input type="number" class="input" value="{{ $entry->quantity }}" name="quantity" required>
    
                    @error('quantity')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
    
            <div class="field">
                <label for="expires_at" class="label">{{ __('Expires At') }}</label>
    
                <div id="datepicker" class="container">
                    <section>
                        <b-field>
                            <b-datepicker
                                v-model="date"
                                required
                                name="expires_at"
                                placeholder="Click to select..."
                                icon="calendar-today">
                            </b-datepicker>
                        </b-field>
                    </section>
    
                    @error('expires_at')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>            
            </div>
    
            <div class="field">
                <label for="image" class="label">{{ __('Image') }}</label>
    
                <div id="image-upload">
                    <b-field class="file">
                        <b-upload v-model="file" name="image">
                            <a class="button is-outlined">
                                <b-icon icon="upload"></b-icon>
                                <span>Click to upload</span>
                            </a>
                        </b-upload>
                        <span class="file-name" v-if="file">
                            @{{ file.name }}
                        </span>
                    </b-field>
    
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>            
            </div>
            
            <div class="field">
                <label for="company_id" class="label">{{ __('Company') }}</label>
    
                <div id="image-upload">
                    <div class="select">
                        <select name="company_id">
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}" {{ $entry->company->id == $company->id ? "selected" : "" }}>{{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div>
    
                    @error('company_id')
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

    {{-- VueJS --}}
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    {{-- Buefy --}}
    <script src="https://unpkg.com/buefy/dist/buefy.min.js"></script>

    {{-- Vue Apps --}}
    <script type="text/javascript">
        // Date Picker
        const datePickerData = {
            data() {
                return {
                    date: new Date("{{ $entry->expires_at }}")
                }
            }
        }
        const datepicker = new Vue(datePickerData)
        datepicker.$mount('#datepicker')
        
        // Image Upload
        const imageUploadData = {
            data() {
                return {
                    file: null
                }
            }
        }

        const imageUpload = new Vue(imageUploadData)
        imageUpload.$mount('#image-upload')
    </script>
@endsection