@extends('admin.layout')

@section('title', 'Coffee Shop Details')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Coffee Shop Details</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p><strong>ID:</strong> {{ $coffeeShop->id_coffee_shop }}</p>
                <p><strong>Name:</strong> {{ $coffeeShop->name_coffee_shop }}</p>
                <p><strong>Address:</strong> {{ $coffeeShop->address_coffeeshop }}</p>
                <p><strong>City:</strong> {{ $coffeeShop->city->name_city }}</p>
                <p><strong>Phone:</strong> {{ $coffeeShop->phone_coffeeshop }}</p>
                <p><strong>Opening Hours:</strong> {{ $coffeeShop->opening_hours_coffeeshop }}</p>
            </div>
        </div>
        
        <div class="mt-4">
            <h6>Coffee Menu Items: {{ $coffeeShop->coffeeMenus->count() }}</h6>
            <h6>Menu Sweets: {{ $coffeeShop->menuSweets->count() }}</h6>
        </div>
        
        <div class="mt-3">
            <a href="{{ route('admin.coffee-shops.edit', $coffeeShop) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('admin.coffee-shops.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection