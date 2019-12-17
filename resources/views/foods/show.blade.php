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
                    <p class="title is-4">{{ $food->name }}</p>
                    <p class="subtitle is-6">Expires {{ $food->expires_at }}.</p>
                    <p class="subtitle is-6">Manufactured by <a href="#">{{ $food->company_name }}</a>.</p>
                    <p class="subtitle is-6 price">৳ {{ $food->price }}</p>
                </div>
            </div>
        </div>
        <footer class="card-footer">
            <a href="#" class="card-footer-item">Buy</a>
        </footer>
    </div>
</div>