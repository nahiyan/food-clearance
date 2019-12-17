<div class="column is-one-quarter">
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="{{ asset("storage/images/" . $food->image_name) }}">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        {{ $food->name }}
                        <span class="subtitle is-6"> x {{ $food->quantity }}</span>
                    </p>
                    <hr/>
                    <p class="subtitle is-6 price">৳ {{ $food->price }}</p>
                    <p class="subtitle is-6">Expires {{ $food->expires_at }}.</p>
                    <p class="subtitle is-6">Manufactured by <a href="#">{{ ($food->company_name == null) ? $food->company->name : $food->company_name }}</a>.</p>
                </div>
            </div>
            <hr/>
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <input type="number" name="quantity" class="input" value="1">
                    </div>

                    <input type="submit" class="button is-outlined" onclick="add_to_cart(this)" value="Add to Cart"/>

                    <input type="submit" class="button is-outlined is-success" value="Buy" onclick="if(confirm('Are you sure?')) buy(this)"/>

                    {{-- <form action="{{ route("foods.buy", $food->id) }}" method="POST"> --}}
                        {{-- @csrf --}}
                        
                    {{-- </form> --}}

                    {{-- <form action="{{ route("cart.store") }}" method="POST">
                        @csrf
                        @method("PUT") --}}
        
                        
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>