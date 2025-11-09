@extends('admin.layout')

@section('title', 'Menu Sweets')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Menu Sweets</h3>
    <a href="{{ route('admin.menu-sweets.create') }}" class="btn btn-primary">Add New Menu Sweet</a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Coffee Shop</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menuSweets as $sweet)
                    <tr>
                        <td>{{ $sweet->id_sweet }}</td>
                        <td>{{ $sweet->name_sweet }}</td>
                        <td>{{ Str::limit($sweet->description_sweet, 50) }}</td>
                        <td>{{ number_format($sweet->price_sweet, 2) }}</td>
                        <td>{{ $sweet->coffeeShop->name_coffee_shop }}</td>
                        <td>
                            <a href="{{ route('admin.menu-sweets.show', $sweet) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('admin.menu-sweets.edit', $sweet) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.menu-sweets.destroy', $sweet) }}" method="POST" class="d-inline">
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