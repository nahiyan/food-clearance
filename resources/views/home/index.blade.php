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
                @include('foods.show', ['food' => $food])
            @endforeach
        </div>
    </div>
    
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/flouthoc/minAjax.js@master/minify/index.min.js"></script>
@endsection