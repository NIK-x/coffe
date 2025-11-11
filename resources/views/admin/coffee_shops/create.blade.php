@extends('admin.layout')

@section('title', 'Добавить кофейню')

@section('content')
<div class="card">
    <h2 style="margin-bottom: 2rem;">Добавить новую кофейню</h2>
    
    <form action="{{ route('admin.coffee-shops.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name_coffee_shop" class="form-label">Название кофейни</label>
            <input type="text" class="form-control @error('name_coffee_shop') is-invalid @enderror" 
                   id="name_coffee_shop" name="name_coffee_shop" value="{{ old('name_coffee_shop') }}" required>
            @error('name_coffee_shop')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="address_coffeeshop" class="form-label">Адрес</label>
            <input type="text" class="form-control @error('address_coffeeshop') is-invalid @enderror" 
                   id="address_coffeeshop" name="address_coffeeshop" value="{{ old('address_coffeeshop') }}" required>
            @error('address_coffeeshop')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="city_coffeeshop_bd" class="form-label">Город</label>
            <select class="form-control @error('city_coffeeshop_bd') is-invalid @enderror" 
                    id="city_coffeeshop_bd" name="city_coffeeshop_bd" required>
                <option value="">Выберите город</option>
                @foreach($cities as $city)
                    <option value="{{ $city->id_city }}" {{ old('city_coffeeshop_bd') == $city->id_city ? 'selected' : '' }}>
                        {{ $city->name_city }}
                    </option>
                @endforeach
            </select>
            @error('city_coffeeshop_bd')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone_coffeeshop" class="form-label">Телефон</label>
            <input type="text" class="form-control @error('phone_coffeeshop') is-invalid @enderror" 
                   id="phone_coffeeshop" name="phone_coffeeshop" value="{{ old('phone_coffeeshop') }}" required>
            @error('phone_coffeeshop')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="opening_hours_coffeeshop" class="form-label">Часы работы</label>
            <input type="text" class="form-control @error('opening_hours_coffeeshop') is-invalid @enderror" 
                   id="opening_hours_coffeeshop" name="opening_hours_coffeeshop" value="{{ old('opening_hours_coffeeshop') }}" required>
            @error('opening_hours_coffeeshop')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Создать кофейню</button>
            <a href="{{ route('admin.coffee-shops.index') }}" class="btn btn-warning">Отмена</a>
        </div>
    </form>
</div>
@endsection