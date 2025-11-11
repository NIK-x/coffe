@extends('admin.layout')

@section('title', 'Добавить город')

@section('content')
<div class="card">
    <h2 style="margin-bottom: 2rem;">Добавить новый город</h2>
    
    <form action="{{ route('admin.cities.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name_city" class="form-label">Название города</label>
            <input type="text" class="form-control @error('name_city') is-invalid @enderror" 
                   id="name_city" name="name_city" value="{{ old('name_city') }}" required>
            @error('name_city')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Создать город</button>
            <a href="{{ route('admin.cities.index') }}" class="btn btn-warning">Отмена</a>
        </div>
    </form>
</div>
@endsection