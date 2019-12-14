@extends("layouts.admin")

@section("content")
    <h1 class="title">List of Users</h1>

    <a href="{{ url("admin/users/create") }}" class="button is-outlined">Create</a>

    <hr>

    <table class="table is-striped is-fullwidth">
        <tbody>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email Address</th>
                <th>Type</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Actions</th>
            </tr>
            @foreach($entries as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->type }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>
                        <form action="{{ url("admin/users/" . $user->id) }}" method="POST">
                            @method("DELETE")
                            @csrf
                            <a class="button is-outlined" href="{{ url("admin/users/" . $user->id . "/edit") }}">Edit</a>
                            <input type="submit" class="button is-outlined is-danger" }} value="Delete" onclick="return confirm('Are you sure?')"/>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection