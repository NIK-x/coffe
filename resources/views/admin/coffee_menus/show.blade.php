@extends('admin.layout')

@section('title', 'Coffee Menu Details')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Coffee Menu Details</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p><strong>ID:</strong> {{ $coffeeMenu->id_coffee }}</p>
                <p><strong>Name:</strong> {{ $coffeeMenu->name_coffee }}</p>
                <p><strong>Description:</strong> {{ $coffeeMenu->description_coffee }}</p>
                <p><strong>Price:</strong> {{ number_format($coffeeMenu->price_coffee, 2) }}</p>
                <p><strong>Coffee Shop:</strong> {{ $coffeeMenu->coffeeShop->name_coffee_shop }}</p>
            </div>
        </div>
        <div class="mt-3">
            <a href="{{ route('admin.coffee-menus.edit', $coffeeMenu) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('admin.coffee-menus.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection