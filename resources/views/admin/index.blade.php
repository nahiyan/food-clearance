@extends("layouts.admin")

@section("content")
<div class="is-box">
    <h1 class="title">Summary</h1>
    <p>
        <span class="has-text-link">
            <b>{{ $user_count }}</b>
        </span>
        user[s] registered in the site; out of which there are:
        <div class="content">
            <ul>
                <li>
                    <span class="has-text-link">
                        <b>{{ $general_user_count }}</b>
                    </span> general user[s].
                </li>
                <li>
                    <span class="has-text-link">
                        <b>{{ $company_user_count }}</b>
                    </span> company managers.
                </li>
                <li>
                    <span class="has-text-link">
                        <b>{{ $admin_count }}</b>
                    </span> admin[s].
                </li>
            </ul>
        </div>
    </p>
    <p>
        There are
        <span class="has-text-link">
            <b>{{ $food_count }}</b>
        </span>
        food types, manufactured by
        <span class="has-text-link">
            <b>{{ $company_count }}</b>
        </span>
        companies.
    </p>
    <br />
    <p>
        <span class="has-text-link">
            <b>{{ $transaction_count }}</b>
        </span>
        transactions yield
        <span class="has-text-link">
            <b>৳ {{ round($transaction_income, 2) }}</b>
        </span>
        income (10% of total revenue).
    </p>
</div>
@endsection