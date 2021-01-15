<div class="columns is-multiline">
    @foreach($foods as $food)
        @include('foods.show', ['food' => $food])
    @endforeach
</div>