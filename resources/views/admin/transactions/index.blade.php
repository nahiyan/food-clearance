@extends("layouts.admin")

@section("content")
    <div class="is-box">
        <h1 class="title">List of Transactions</h1>
    
        <a href="{{ url("admin/transactions/create") }}" class="button is-outlined">Create</a>
    
        <hr>
    
        <table class="table is-striped is-fullwidth">
            <tbody>
                <tr>
                    <th>#</th>
                    <th>Food</th>
                    <th>User</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
                @foreach($entries as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->food->name }}</td>
                        <td>{{ $transaction->user->name }}</td>
                        <td>{{ $transaction->price }}</td>
                        <td>{{ $transaction->quantity }}</td>
                        <td>{{ $transaction->created_at }}</td>
                        <td>{{ $transaction->updated_at }}</td>
                        <td>
                            <form action="{{ url("admin/companies/" . $transaction->id) }}" method="POST">
                                @method("DELETE")
                                @csrf

                                <div class="field is-grouped">
                                    <p class="control">
                                        <a class="button is-outlined" href="{{ url("admin/companies/" . $transaction->id . "/edit") }}">Edit</a>
                                    </p>
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