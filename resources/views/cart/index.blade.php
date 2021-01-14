@extends("layouts.base")

@section("content")
    <div id="search-results" class="hidden">

    </div>
    <div id="results">
        <h1 class="title">Cart Items</h1>
    
        @if(!$can_checkout)
            <article class="message is-danger">
                <div class="message-body">
                    One or many of the cart items are in quantities more than that available; please remove them to be able to checkout.
                </div>
            </article>
        @endif
    
        <div class="is-box mb-n">
            <div class="level">
                <div class="level-left">
                    <div class="level-item">
                        <b>Net price:</b>
                        &nbsp;
                        <span>৳ {{ number_format($net_price, 0) }}</span>
                    </div>
                </div>
                <div class="level-right">
                    <div class="level-item">
                        @if($can_checkout)
                            <a href="{{ route("cart.checkout") }}" class="button is-outlined is-success">Checkout</a>
                        @else
                            <button class="button is-outlined is-success" disabled>Checkout</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    
        @if(count($entries) > 0)
            <div class="columns is-multiline">
                @foreach($entries as $item)
                    @include('cart.show', ['item' => $item])
                @endforeach
            </div>
        @else
            <div class="is-box">
                <i>There is no item in your cart.</i>
            </div>
        @endif
    </div>
@endsection