@extends('admin.layout')

@section('title', 'Управление десертами')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Десерты</h2>
    <a href="{{ route('admin.menu-sweets.create') }}" class="btn btn-primary">Добавить десерт</a>
</div>

<div class="card">
    @if($menuSweets->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Название десерта</th>
                    <th>Описание</th>
                    <th>Цена</th>
                    <th>Кофейня</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menuSweets as $sweet)
                <tr>
                    <td>{{ $sweet->id_sweet }}</td>
                    <td>{{ $sweet->name_sweet }}</td>
                    <td>{{ Str::limit($sweet->description_sweet, 50) }}</td>
                    <td>{{ number_format($sweet->price_sweet, 2) }} ₽</td>
                    <td>{{ $sweet->coffeeShop->name_coffee_shop }}</td>
                    <td class="actions">
                        <a href="{{ route('admin.menu-sweets.show', $sweet) }}" class="btn btn-info">Просмотр</a>
                        <a href="{{ route('admin.menu-sweets.edit', $sweet) }}" class="btn btn-warning">Редактировать</a>
                        <form action="{{ route('admin.menu-sweets.destroy', $sweet) }}" method="POST" style="display: inline;">
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
            <p>Десертов пока нет.</p>
            <a href="{{ route('admin.menu-sweets.create') }}" class="btn btn-primary">Добавить первый десерт</a>
        </div>
    @endif
</div>
@endsection