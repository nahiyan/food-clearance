@extends($type == "company" ? "layouts.company" : "layouts.admin")

@section("content")
<div class="is-box">
    <h1 class="title">List of Reports</h1>

    <hr>

    <table class="table is-striped is-fullwidth">
        <tbody>
            <tr>
                <th>#</th>
                <th>Type</th>
                <th>Body</th>
                <th>Author</th>
                <th>Target</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Actions</th>
            </tr>
            @foreach($entries as $report)
            <tr>
                <td>{{ $report->id }}</td>
                <td>{{ $report->type }}</td>
                <td>{{ $report->body }}</td>
                <td>{{ $report->user_name }}</td>
                <td>{{ $report->type == 'food' ? $report->food_name : $report->company_name }}</td>
                <td>{{ Carbon\Carbon::parse($report->created_at)->diffForHumans() }}</td>
                <td>{{ Carbon\Carbon::parse($report->updated_at)->diffForHumans() }}</td>
                <td>
                    <form action="{{ url("$type/reports/" . $report->id) }}" method="POST">
                        @method("DELETE")
                        @csrf

                        <div class="field is-grouped">
                            <p class="control">
                                <input type="submit" class="button is-outlined is-danger" }} value="Delete"
                                    onclick="return confirm('Are you sure?')" />
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