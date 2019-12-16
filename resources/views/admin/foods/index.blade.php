@extends("layouts.admin")

@section("content")
    <div class="is-box">
        <h1 class="title">List of Food Items</h1>
    
        <a href="{{ url("admin/foods/create") }}" class="button is-outlined">Create</a>
    
        <hr>
    
        <table class="table is-striped is-fullwidth">
            <tbody>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Manufacturer</th>
                    <th>Expires at</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Actions</th>
                </tr>
                @foreach($entries as $food)
                    <tr>
                        <td>{{ $food->id }}</td>
                        <td>
                            <figure class="image is-64x64">
                                <img src="{{ asset("storage/images/" . $food->image_name) }}">
                            </figure>
                        </td>
                        <td>{{ $food->name }}</td>
                        <td>{{ $food->price }}</td>
                        <td>{{ $food->quantity }}</td>
                        <td>{{ $food->company->name }}</td>
                        <td>{{ $food->expires_at }}</td>
                        <td>{{ Carbon\Carbon::parse($food->created_at)->diffForHumans() }}</td>
                        <td>{{ Carbon\Carbon::parse($food->updated_at)->diffForHumans() }}</td>
                        <td>
                            <form action="{{ url("admin/foods/" . $food->id) }}" method="POST">
                                @method("DELETE")
                                @csrf
    
                                <div class="field is-grouped">
                                    <p class="control">
                                        <a class="button is-outlined" href="{{ url("admin/foods/" . $food->id . "/edit") }}">Edit</a>
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