@extends('admin.layout')

@section('title', 'Edit Coffee Shop')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Edit Coffee Shop</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.coffee-shops.update', $coffeeShop) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name_coffee_shop" class="form-label">Coffee Shop Name</label>
                <input type="text" class="form-control @error('name_coffee_shop') is-invalid @enderror" 
                       id="name_coffee_shop" name="name_coffee_shop" value="{{ old('name_coffee_shop', $coffeeShop->name_coffee_shop) }}" required>
                @error('name_coffee_shop')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="address_coffeeshop" class="form-label">Address</label>
                <input type="text" class="form-control @error('address_coffeeshop') is-invalid @enderror" 
                       id="address_coffeeshop" name="address_coffeeshop" value="{{ old('address_coffeeshop', $coffeeShop->address_coffeeshop) }}" required>
                @error('address_coffeeshop')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="city_coffeeshop_bd" class="form-label">City</label>
                <select class="form-control @error('city_coffeeshop_bd') is-invalid @enderror" 
                        id="city_coffeeshop_bd" name="city_coffeeshop_bd" required>
                    <option value="">Select City</option>
                    @foreach($cities as $city)
                        <option value="{{ $city->id_city }}" {{ old('city_coffeeshop_bd', $coffeeShop->city_coffeeshop_bd) == $city->id_city ? 'selected' : '' }}>
                            {{ $city->name_city }}
                        </option>
                    @endforeach
                </select>
                @error('city_coffeeshop_bd')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone_coffeeshop" class="form-label">Phone</label>
                <input type="text" class="form-control @error('phone_coffeeshop') is-invalid @enderror" 
                       id="phone_coffeeshop" name="phone_coffeeshop" value="{{ old('phone_coffeeshop', $coffeeShop->phone_coffeeshop) }}" required>
                @error('phone_coffeeshop')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="opening_hours_coffeeshop" class="form-label">Opening Hours</label>
                <input type="text" class="form-control @error('opening_hours_coffeeshop') is-invalid @enderror" 
                       id="opening_hours_coffeeshop" name="opening_hours_coffeeshop" value="{{ old('opening_hours_coffeeshop', $coffeeShop->opening_hours_coffeeshop) }}" required>
                @error('opening_hours_coffeeshop')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update Coffee Shop</button>
            <a href="{{ route('admin.coffee-shops.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection