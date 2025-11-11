@extends('admin.layout')

@section('title', 'Просмотр кофе')

@section('content')
<div class="card">
    <h2 style="margin-bottom: 2rem;">Информация о кофе</h2>
    
    <div class="form-group">
        <label class="form-label">ID:</label>
        <div>{{ $coffeeMenu->id_coffee }}</div>
    </div>
    
    <div class="form-group">
        <label class="form-label">Название:</label>
        <div>{{ $coffeeMenu->name_coffee }}</div>
    </div>

    <div class="form-group">
        <label class="form-label">Описание:</label>
        <div>{{ $coffeeMenu->description_coffee }}</div>
    </div>

    <div class="form-group">
        <label class="form-label">Цена:</label>
        <div>{{ number_format($coffeeMenu->price_coffee, 2) }} ₽</div>
    </div>

    <div class="form-group">
        <label class="form-label">Кофейня:</label>
        <div>{{ $coffeeMenu->coffeeShop->name_coffee_shop }}</div>
    </div>
    
    <div class="d-flex gap-2 mt-3">
        <a href="{{ route('admin.coffee-menus.edit', $coffeeMenu) }}" class="btn btn-warning">Редактировать</a>
        <a href="{{ route('admin.coffee-menus.index') }}" class="btn btn-primary">Назад к списку</a>
    </div>
</div>
@endsection