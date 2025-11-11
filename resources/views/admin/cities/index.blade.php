@extends('admin.layout')

@section('title', 'Управление городами')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Города</h2>
    <a href="{{ route('admin.cities.create') }}" class="btn btn-primary">Добавить город</a>
</div>

<div class="card">
    @if($cities->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Название города</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cities as $city)
                <tr>
                    <td>{{ $city->id_city }}</td>
                    <td>{{ $city->name_city }}</td>
                    <td class="actions">
                        <a href="{{ route('admin.cities.show', $city) }}" class="btn btn-info">Просмотр</a>
                        <a href="{{ route('admin.cities.edit', $city) }}" class="btn btn-warning">Редактировать</a>
                        <form action="{{ route('admin.cities.destroy', $city) }}" method="POST" style="display: inline;">
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
            <p>Городов пока нет.</p>
            <a href="{{ route('admin.cities.create') }}" class="btn btn-primary">Добавить первый город</a>
        </div>
    @endif
</div>
@endsection