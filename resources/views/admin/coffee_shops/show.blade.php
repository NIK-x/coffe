@extends('admin.layout')

@section('title', 'Просмотр кофейни')

@section('content')
<div class="card">
    <h2 style="margin-bottom: 2rem;">Информация о кофейне</h2>
    
    <div class="form-group">
        <label class="form-label">ID:</label>
        <div>{{ $coffeeShop->id_coffee_shop }}</div>
    </div>
    
    <div class="form-group">
        <label class="form-label">Название:</label>
        <div>{{ $coffeeShop->name_coffee_shop }}</div>
    </div>

    <div class="form-group">
        <label class="form-label">Адрес:</label>
        <div>{{ $coffeeShop->address_coffeeshop }}</div>
    </div>

    <div class="form-group">
        <label class="form-label">Город:</label>
        <div>{{ $coffeeShop->city->name_city }}</div>
    </div>

    <div class="form-group">
        <label class="form-label">Телефон:</label>
        <div>{{ $coffeeShop->phone_coffeeshop }}</div>
    </div>

    <div class="form-group">
        <label class="form-label">Часы работы:</label>
        <div>{{ $coffeeShop->opening_hours_coffeeshop }}</div>
    </div>

    <div class="form-group">
        <label class="form-label">Позиций кофе:</label>
        <div>{{ $coffeeShop->coffeeMenus->count() }}</div>
    </div>

    <div class="form-group">
        <label class="form-label">Десертов:</label>
        <div>{{ $coffeeShop->menuSweets->count() }}</div>
    </div>
    
    <div class="d-flex gap-2 mt-3">
        <a href="{{ route('admin.coffee-shops.edit', $coffeeShop) }}" class="btn btn-warning">Редактировать</a>
        <a href="{{ route('admin.coffee-shops.index') }}" class="btn btn-primary">Назад к списку</a>
    </div>
</div>
@endsection