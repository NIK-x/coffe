@extends('admin.layout')

@section('title', 'Редактировать город')

@section('content')
<div class="card">
    <h2 style="margin-bottom: 2rem;">Редактировать город</h2>
    
    <form action="{{ route('admin.cities.update', $city) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name_city" class="form-label">Название города</label>
            <input type="text" class="form-control @error('name_city') is-invalid @enderror" 
                   id="name_city" name="name_city" value="{{ old('name_city', $city->name_city) }}" required>
            @error('name_city')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Обновить город</button>
            <a href="{{ route('admin.cities.index') }}" class="btn btn-warning">Отмена</a>
        </div>
    </form>
</div>
@endsection