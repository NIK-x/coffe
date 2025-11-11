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
                    <input type="text" class="form-control @error('name_sweet') is-invalid @enderror" id="namesweet"
                        name="namesweet" value="{{ old('name_sweet') }}" required>
                    @error('name_sweet')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description_sweet" class="form-label">Description</label>
                    <textarea class="form-control @error('description_sweet') is-invalid @enderror" id="descriptionsweet"
                        name="descriptionsweet" rows="3" required>{{ old('description_sweet') }}</textarea>
                    @error('description_sweet')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price_sweet" class="form-label">Price</label>
                    <input type="number" step="0.01" class="form-control @error('price_sweet') is-invalid @enderror"
                        id="pricesweet" name="pricesweet" value="{{ old('price_sweet') }}" required>
                    @error('price_sweet')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="coffeeshopsweetbd" class="form-label">Coffee Shop</label>
                    <select class="form-control @error('coffeeshopsweetbd') is-invalid @enderror" id="coffeeshopsweetbd"
                        name="coffeeshopsweetbd" required>
                        <option value="">Select Coffee Shop</option>
                        @foreach($coffeeShops as $shop)
                            <option value="{{ $shop->idcoffeeshop }}" {{ old('coffeeshopsweetbd') == $shop->idcoffeeshop ? 'selected' : '' }}>
                                {{ $shop->namecoffeeshop }}
                            </option>
                        @endforeach
                    </select>
                    @error('coffeeshopsweetbd')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Create Sweet Item</button>
                <a href="{{ route('admin.menu-sweets.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection