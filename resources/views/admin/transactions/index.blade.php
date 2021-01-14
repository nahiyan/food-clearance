@extends($type == "company" ? "layouts.company" : "layouts.admin")

@section("content")
    <div class="is-box">
        <h1 class="title">List of Transactions</h1>
    
        <hr>
    
        <table class="table is-striped is-fullwidth">
            <tbody>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Food</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Actions</th>
                </tr>
                @foreach($entries as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->user_name }}</td>
                        <td>{{ $transaction->food_name }}</td>
                        <td>{{ $transaction->price }}</td>
                        <td>{{ $transaction->quantity }}</td>
                        <td>{{ Carbon\Carbon::parse($transaction->created_at)->diffForHumans() }}</td>
                        <td>{{ Carbon\Carbon::parse($transaction->updated_at)->diffForHumans() }}</td>
                        <td>
                            <form action="{{ url("$type/transactions/" . $transaction->id) }}" method="POST">
                                @method("DELETE")
                                @csrf

                                <div class="field is-grouped">
                                    <p class="control">
                                        <input type="submit" class="button is-outlined is-danger" }} value="Delete" onclick="return confirm('Are you sure?')"/>
                                    </p>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection