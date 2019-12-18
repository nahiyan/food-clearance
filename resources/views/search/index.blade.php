<h1 class="title">Search Results</h1>

@if(count($foods) > 0)
    <div class="columns is-multiline">
        @foreach($foods as $food)
            @include('foods.show', ['food' => $food])
        @endforeach
    </div>
@else
    <i>No search results found.</i>
@endif