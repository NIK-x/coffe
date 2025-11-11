@extends('admin.layout')

@section('title', 'Просмотр города')

@section('content')
<div class="card">
    <h2 style="margin-bottom: 2rem;">Информация о городе</h2>
    
    <div class="form-group">
        <label class="form-label">ID:</label>
        <div>{{ $city->id_city }}</div>
    </div>
    
    <div class="form-group">
        <label class="form-label">Название города:</label>
        <div>{{ $city->name_city }}</div>
    </div>
    
    <div class="d-flex gap-2 mt-3">
        <a href="{{ route('admin.cities.edit', $city) }}" class="btn btn-warning">Редактировать</a>
        <a href="{{ route('admin.cities.index') }}" class="btn btn-primary">Назад к списку</a>
    </div>
</div>
@endsection