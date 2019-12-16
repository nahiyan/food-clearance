@extends($type == "company" ? "layouts.company" : "layouts.admin")

@section("content")
    <div class="is-box">
        <h1 class="title">List of Companies</h1>
    
        <a href="{{ url("$type/companies/create") }}" class="button is-outlined">Create</a>
    
        <hr>
    
        <table class="table is-striped is-fullwidth">
            <tbody>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Manager</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Actions</th>
                </tr>
                @foreach($entries as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->user !== null ? $company->user->name : "nil" }}</td>
                        <td>{{ Carbon\Carbon::parse($company->created_at)->diffForHumans() }}</td>
                        <td>{{ Carbon\Carbon::parse($company->updated_at)->diffForHumans() }}</td>
                        <td>
                            <form action="{{ url("$type/companies/" . $company->id) }}" method="POST">
                                @method("DELETE")
                                @csrf

                                <div class="field is-grouped">
                                    <p class="control">
                                        <a class="button is-outlined" href="{{ url("$type/companies/" . $company->id . "/edit") }}">Edit</a>
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