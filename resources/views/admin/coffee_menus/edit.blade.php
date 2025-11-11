@extends('admin.layout')

@section('title', 'Редактировать кофе')

@section('content')
<div class="card">
    <h2 style="margin-bottom: 2rem;">Редактировать позицию кофе</h2>
    
    <form action="{{ route('admin.coffee-menus.update', $coffeeMenu) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name_coffee" class="form-label">Название кофе</label>
            <input type="text" class="form-control @error('name_coffee') is-invalid @enderror" 
                   id="name_coffee" name="name_coffee" value="{{ old('name_coffee', $coffeeMenu->name_coffee) }}" required>
            @error('name_coffee')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description_coffee" class="form-label">Описание</label>
            <textarea class="form-control @error('description_coffee') is-invalid @enderror" 
                      id="description_coffee" name="description_coffee" rows="3" required>{{ old('description_coffee', $coffeeMenu->description_coffee) }}</textarea>
            @error('description_coffee')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="price_coffee" class="form-label">Цена (₽)</label>
            <input type="number" step="0.01" class="form-control @error('price_coffee') is-invalid @enderror" 
                   id="price_coffee" name="price_coffee" value="{{ old('price_coffee', $coffeeMenu->price_coffee) }}" required>
            @error('price_coffee')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="address_coffee_bd" class="form-label">Кофейня</label>
            <select class="form-control @error('address_coffee_bd') is-invalid @enderror" 
                    id="address_coffee_bd" name="address_coffee_bd" required>
                <option value="">Выберите кофейню</option>
                @foreach($coffeeShops as $shop)
                    <option value="{{ $shop->id_coffee_shop }}" {{ old('address_coffee_bd', $coffeeMenu->address_coffee_bd) == $shop->id_coffee_shop ? 'selected' : '' }}>
                        {{ $shop->name_coffee_shop }}
                    </option>
                @endforeach
            </select>
            @error('address_coffee_bd')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Обновить позицию</button>
            <a href="{{ route('admin.coffee-menus.index') }}" class="btn btn-warning">Отмена</a>
        </div>
    </form>
</div>
@endsection