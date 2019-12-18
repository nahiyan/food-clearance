@extends("layouts.base")

@section("content")
    <h1 class="title">Cart Items</h1>

    <div class="is-box mb-n">
        <div class="level">
            <div class="level-left">
                <div class="level-item">
                    <b>Net price:</b>&nbsp;0
                </div>
            </div>
            <div class="level-right">
                <div class="level-item">
                    <a href="{{ route("cart.checkout") }}" class="button is-outlined is-success">Checkout</a>
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
@endsection