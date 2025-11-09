@extends('admin.layout')

@section('title', 'Cities')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Cities</h3>
    <a href="{{ route('admin.cities.create') }}" class="btn btn-primary">Add New City</a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cities as $city)
                    <tr>
                        <td>{{ $city->id_city }}</td>
                        <td>{{ $city->name_city }}</td>
                        <td>
                            <a href="{{ route('admin.cities.show', $city) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('admin.cities.edit', $city) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.cities.destroy', $city) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection