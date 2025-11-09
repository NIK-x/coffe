@extends('admin.layout')

@section('title', 'Menu Sweet Details')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Menu Sweet Details</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p><strong>ID:</strong> {{ $menuSweet->id_sweet }}</p>
                <p><strong>Name:</strong> {{ $menuSweet->name_sweet }}</p>
                <p><strong>Description:</strong> {{ $menuSweet->description_sweet }}</p>
                <p><strong>Price:</strong> {{ number_format($menuSweet->price_sweet, 2) }}</p>
                <p><strong>Coffee Shop:</strong> {{ $menuSweet->coffeeShop->name_coffee_shop }}</p>
            </div>
        </div>
        <div class="mt-3">
            <a href="{{ route('admin.menu-sweets.edit', $menuSweet) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('admin.menu-sweets.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection