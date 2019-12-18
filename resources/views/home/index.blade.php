@extends('layouts.base')

@section("title")
    Homepage
@endsection

@section('content')
    <script>
        async function buy(e, id) {
            let quantity = e.parentElement.querySelector("input[name='quantity']").value;

            let response = await axios({
                method: 'post',
                url: 'foods/' + id + '/buy',
                data: {
                    quantity: quantity
                }
            });

            if (response.status == 200) {
                document.getElementById("results").classList.remove("hidden");
                document.getElementById("search-results").classList.add("hidden");

                document.getElementById("results").innerHTML = response.data;

                document.getElementById("modal").classList.add("is-active");
                document.getElementById("modal").querySelector(".modal-content .box").innerHTML = "Order placed successfully!";
            }
        }

        async function addToCart(e, id) {
            let quantity = parseInt(e.parentElement.querySelector("input[name='quantity']").value);

            let response = await axios({
                method: 'post',
                url: "{{ route("cart.store") }}",
                data: {
                    quantity: quantity,
                    food_id: id
                }
            });

            if (response.status == 200) {
                // document.getElementById("results").classList.remove("hidden");
                // document.getElementById("search-results").classList.add("hidden");

                // document.getElementById("results").innerHTML = response.data;

                document.getElementById("modal").classList.add("is-active");
                document.getElementById("modal").querySelector(".modal-content .box").innerHTML = "Added to cart successfully!";
            }
        }
    </script>

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
@endsection