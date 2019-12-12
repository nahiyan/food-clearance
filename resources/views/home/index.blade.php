@extends('layouts.base')

@section("title")
    Homepage
@endsection

@section('content')
    <h1 class="title">Food Items</h1>

    <div id="search-results" class="hidden">
        <i>No food items found!</i>
    </div>
    
    <div id="results">
        <div class="columns is-multiline">
            @foreach($foods as $food)
                <div class="column is-one-quarter">
                    <div class="card">
                        <div class="card-image">
                            <figure class="image is-4by3">
                                <img src="images/{{ $food->image_name }}">
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="media">
                                {{-- <div class="media-left">
                                    <figure class="image is-128x128">
                                        <img src="images/{{ $food->image_name }}">
                                    </figure>
                                </div> --}}
                                <div class="media-content">
                                    <p class="title is-4">{{ $food->name }}</p>
                                    <p class="subtitle is-6">Expires {{ $food->expires_at }}.</p>
                                    <p class="subtitle is-6">Manufactured by <a href="#">{{ $food->company->name }}</a>.</p>
                                </div>
                            </div>
                        
                            {{-- <div class="content">
                                
                            </div> --}}
                        </div>
                        <footer class="card-footer">
                            <a href="#" class="card-footer-item">Buy</a>
                        </footer>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
@endsection