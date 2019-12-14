@extends("layouts.admin")

@section("content")
    <h1 class="title">List of Companies</h1>

    <a href="{{ url("admin/companies/create") }}" class="button is-outlined">Create</a>

    <hr>

    <table class="table is-striped is-fullwidth">
        <tbody>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Actions</th>
            </tr>
            @foreach($companies as $company)
                <tr>
                    <td>{{ $company->id }}</td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->created_at }}</td>
                    <td>{{ $company->updated_at }}</td>
                    <td>
                        <form action="{{ url("admin/companies/" . $company->id) }}" method="POST">
                            @method("DELETE")
                            @csrf
                            <a class="button is-outlined" href="{{ url("admin/companies/" . $company->id . "/edit") }}">Edit</a>
                            <input type="submit" class="button is-outlined is-danger" }} value="Delete" onclick="return confirm('Are you sure?')"/>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection