@extends('admin.layout')

@section('title', 'Coffee Menus')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Coffee Menus</h3>
    <a href="{{ route('admin.coffee-menus.create') }}" class="btn btn-primary">Add New Coffee Menu</a>
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
                    @foreach($coffeeMenus as $menu)
                    <tr>
                        <td>{{ $menu->id_coffee }}</td>
                        <td>{{ $menu->name_coffee }}</td>
                        <td>{{ Str::limit($menu->description_coffee, 50) }}</td>
                        <td>{{ number_format($menu->price_coffee, 2) }}</td>
                        <td>{{ $menu->coffeeShop->name_coffee_shop }}</td>
                        <td>
                            <a href="{{ route('admin.coffee-menus.show', $menu) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('admin.coffee-menus.edit', $menu) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.coffee-menus.destroy', $menu) }}" method="POST" class="d-inline">
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