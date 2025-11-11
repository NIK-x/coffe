@extends('admin.layout')

@section('title', 'Управление кофейнями')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Кофейни</h2>
    <a href="{{ route('admin.coffee-shops.create') }}" class="btn btn-primary">Добавить кофейню</a>
</div>

<div class="card">
    @if($coffeeShops->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Адрес</th>
                    <th>Город</th>
                    <th>Телефон</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($coffeeShops as $shop)
                <tr>
                    <td>{{ $shop->id_coffee_shop }}</td>
                    <td>{{ $shop->name_coffee_shop }}</td>
                    <td>{{ $shop->address_coffeeshop }}</td>
                    <td>{{ $shop->city->name_city }}</td>
                    <td>{{ $shop->phone_coffeeshop }}</td>
                    <td class="actions">
                        <a href="{{ route('admin.coffee-shops.show', $shop) }}" class="btn btn-info">Просмотр</a>
                        <a href="{{ route('admin.coffee-shops.edit', $shop) }}" class="btn btn-warning">Редактировать</a>
                        <form action="{{ route('admin.coffee-shops.destroy', $shop) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены?')">Удалить</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="text-center" style="padding: 2rem;">
            <p>Кофеен пока нет.</p>
            <a href="{{ route('admin.coffee-shops.create') }}" class="btn btn-primary">Добавить первую кофейню</a>
        </div>
    @endif
</div>
@endsection