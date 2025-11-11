@extends('layouts.app')

@section('title', 'Добро пожаловать')

@section('content')
<div class="card text-center">
    <h1 style="font-size: 2.5rem; margin-bottom: 1rem;">☕ Coffee Guide</h1>
    <p style="font-size: 1.2rem; margin-bottom: 2rem;">Добро пожаловать! Откройте для себя лучшие кофейни вашего города</p>
    
    @auth
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary" style="display: inline-block;">
            Перейти в админ-панель
        </a>
    @else
        <div style="display: flex; gap: 1rem; justify-content: center;">
            <a href="{{ route('login') }}" class="btn btn-primary">Войти</a>
            <a href="{{ route('register') }}" class="btn btn-primary">Зарегистрироваться</a>
        </div>
    @endauth
</div>
@endsection