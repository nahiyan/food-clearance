<div class="column is-one-quarter">
    <div
        class="card {{ ($item->quantity > $item->food->quantity) ? "is-danger" : "" }}">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="{{ asset("storage/images/" . $item->food->image_name) }}">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-4">
                        <span>
                            {{ $item->food->name }}
                        </span>
                        <span class="subtitle is-6">
                            x {{ $item->quantity }}
                        </span>
                    </p>
                    <hr />
                    <p class="subtitle is-6 price">৳ {{ $item->food->price }}</p>
                    <p class="subtitle is-6">Expires
                        {{ Carbon\Carbon::parse($item->food->expires_at)->diffForHumans() }}.</p>
                    <p class="subtitle is-6">Manufactured by <a
                            href="#">{{ ($item->food->company_name == null) ? $item->food->company->name : $item->food->company_name }}</a>.
                    </p>
                </div>
            </div>
            <hr />
            <div class="columns">
                <div class="column">
                    <form action="{{ route("cart.destroy", $item->id) }}" method="post">
                        @csrf
                        @method("DELETE")

                        <input type="submit" class="button is-outlined is-danger"
                            onclick="return confirm('Are you sure?')" value="Remove" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
