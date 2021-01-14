@extends('layouts.base')

@section("title")
    Homepage
@endsection

@section('content')
    <div id="search-results" class="hidden">
        <i>No food items found!</i>
    </div>
    
    <div id="results">
        <h1 class="title">Food Items</h1>

        <div class="columns is-multiline">
            @foreach($foods as $food)
                @include('foods.show', ['food' => $food])
            @endforeach
        </div>
    </div>
@endsection