@extends('admin.layout')

@section('title', 'Add Coffee Menu')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Add New Coffee Menu Item</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.coffee-menus.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name_coffee" class="form-label">Coffee Name</label>
                <input type="text" class="form-control @error('name_coffee') is-invalid @enderror" 
                       id="name_coffee" name="name_coffee" value="{{ old('name_coffee') }}" required>
                @error('name_coffee')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description_coffee" class="form-label">Description</label>
                <textarea class="form-control @error('description_coffee') is-invalid @enderror" 
                          id="description_coffee" name="description_coffee" rows="3" required>{{ old('description_coffee') }}</textarea>
                @error('description_coffee')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price_coffee" class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control @error('price_coffee') is-invalid @enderror" 
                       id="price_coffee" name="price_coffee" value="{{ old('price_coffee') }}" required>
                @error('price_coffee')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="address_coffee_bd" class="form-label">Coffee Shop</label>
                <select class="form-control @error('address_coffee_bd') is-invalid @enderror" 
                        id="address_coffee_bd" name="address_coffee_bd" required>
                    <option value="">Select Coffee Shop</option>
                    @foreach($coffeeShops as $shop)
                        <option value="{{ $shop->id_coffee_shop }}" {{ old('address_coffee_bd') == $shop->id_coffee_shop ? 'selected' : '' }}>
                            {{ $shop->name_coffee_shop }}
                        </option>
                    @endforeach
                </select>
                @error('address_coffee_bd')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create Menu Item</button>
            <a href="{{ route('admin.coffee-menus.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection