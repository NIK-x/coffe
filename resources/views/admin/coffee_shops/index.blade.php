@extends('admin.layout')

@section('title', 'Coffee Shops')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Coffee Shops</h3>
    <a href="{{ route('admin.coffee-shops.create') }}" class="btn btn-primary">Add New Coffee Shop</a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($coffeeShops as $shop)
                    <tr>
                        <td>{{ $shop->id_coffee_shop }}</td>
                        <td>{{ $shop->name_coffee_shop }}</td>
                        <td>{{ $shop->address_coffeeshop }}</td>
                        <td>{{ $shop->city->name_city }}</td>
                        <td>{{ $shop->phone_coffeeshop }}</td>
                        <td>
                            <a href="{{ route('admin.coffee-shops.show', $shop) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('admin.coffee-shops.edit', $shop) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.coffee-shops.destroy', $shop) }}" method="POST" class="d-inline">
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