@extends('admin.layout')

@section('title', 'Add Menu Sweet')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Add New Menu Sweet</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.menu-sweets.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name_sweet" class="form-label">Sweet Name</label>
                <input type="text" class="form-control @error('name_sweet') is-invalid @enderror" 
                       id="name_sweet" name="name_sweet" value="{{ old('name_sweet') }}" required>
                @error('name_sweet')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description_sweet" class="form-label">Description</label>
                <textarea class="form-control @error('description_sweet') is-invalid @enderror" 
                          id="description_sweet" name="description_sweet" rows="3" required>{{ old('description_sweet') }}</textarea>
                @error('description_sweet')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price_sweet" class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control @error('price_sweet') is-invalid @enderror" 
                       id="price_sweet" name="price_sweet" value="{{ old('price_sweet') }}" required>
                @error('price_sweet')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="coffeeshop_sweet_bd" class="form-label">Coffee Shop</label>
                <select class="form-control @error('coffeeshop_sweet_bd') is-invalid @enderror" 
                        id="coffeeshop_sweet_bd" name="coffeeshop_sweet_bd" required>
                    <option value="">Select Coffee Shop</option>
                    @foreach($coffeeShops as $shop)
                        <option value="{{ $shop->id_coffee_shop }}" {{ old('coffeeshop_sweet_bd') == $shop->id_coffee_shop ? 'selected' : '' }}>
                            {{ $shop->name_coffee_shop }}
                        </option>
                    @endforeach
                </select>
                @error('coffeeshop_sweet_bd')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create Sweet Item</button>
            <a href="{{ route('admin.menu-sweets.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection