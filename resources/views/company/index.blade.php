@extends("layouts.company")

@section("content")
    <div class="is-box">
        <h1 class="title">Summary</h1>
        <p>
            <span class="has-text-link"><b>{{ $food_count }}</b></span> food types in <span class="has-text-link"><b>{{ $company_count }}</b></span> companies.
        </p>
        <br/>
        <p>
            <span class="has-text-link"><b>{{ $transaction_count }}</b></span> transactions carried out so far.
        </p>
    </div>
@endsection