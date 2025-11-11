@extends('admin.layout')

@section('title', 'Управление меню кофе')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Меню кофе</h2>
    <a href="{{ route('admin.coffee-menus.create') }}" class="btn btn-primary">Добавить кофе</a>
</div>

<div class="card">
    @if($coffeeMenus->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Название кофе</th>
                    <th>Описание</th>
                    <th>Цена</th>
                    <th>Кофейня</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($coffeeMenus as $menu)
                <tr>
                    <td>{{ $menu->id_coffee }}</td>
                    <td>{{ $menu->name_coffee }}</td>
                    <td>{{ Str::limit($menu->description_coffee, 50) }}</td>
                    <td>{{ number_format($menu->price_coffee, 2) }} ₽</td>
                    <td>{{ $menu->coffeeShop->name_coffee_shop }}</td>
                    <td class="actions">
                        <a href="{{ route('admin.coffee-menus.show', $menu) }}" class="btn btn-info">Просмотр</a>
                        <a href="{{ route('admin.coffee-menus.edit', $menu) }}" class="btn btn-warning">Редактировать</a>
                        <form action="{{ route('admin.coffee-menus.destroy', $menu) }}" method="POST" style="display: inline;">
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
            <p>Позиций кофе пока нет.</p>
            <a href="{{ route('admin.coffee-menus.create') }}" class="btn btn-primary">Добавить первую позицию</a>
        </div>
    @endif
</div>
@endsection