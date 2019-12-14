@extends("layouts.admin")

@section("content")
    <h1 class="title">List of Food Items</h1>

    <a href="{{ url("admin/foods/create") }}" class="button is-outlined">Create</a>

    <hr>

    <table class="table is-striped is-fullwidth">
        <tbody>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Manufacturer</th>
                <th>Expires at</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Actions</th>
            </tr>
            @foreach($foods as $food)
                <tr>
                    <td>{{ $food->id }}</td>
                    <td>
                        <figure class="image is-64x64">
                            <img src="{{ url("images/" . $food->image_name) }}">
                        </figure>
                    </td>
                    <td>{{ $food->name }}</td>
                    <td>{{ $food->company->name }}</td>
                    <td>{{ $food->expires_at }}</td>
                    <td>{{ $food->created_at }}</td>
                    <td>{{ $food->updated_at }}</td>
                    <td>
                        <form action="{{ url("admin/foods/" . $food->id) }}" method="POST">
                            @method("DELETE")
                            @csrf

                            <a class="button is-outlined" href="{{ url("admin/foods/" . $food->id . "/edit") }}">Edit</a>

                            <input type="submit" class="button is-outlined is-danger" }} value="Delete" onclick="return confirm('Are you sure?')"/>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection