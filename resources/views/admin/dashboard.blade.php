@extends('admin.layout')

@section('title', 'Дашборд')

@section('content')
<div class="card">
    <h2 style="margin-bottom: 2rem;">Статистика системы</h2>
    
    <div class="stats-grid">
        <!-- Города -->
        <div class="stat-card" style="background: linear-gradient(135deg, #007bff, #0056b3);">
            <div class="stat-number">{{ $stats['cities_count'] }}</div>
            <div style="font-size: 1.1rem;">🏙️ Городов</div>
        </div>
        
        <!-- Кофейни -->
        <div class="stat-card" style="background: linear-gradient(135deg, #28a745, #1e7e34);">
            <div class="stat-number">{{ $stats['coffee_shops_count'] }}</div>
            <div style="font-size: 1.1rem;">☕ Кофеен</div>
        </div>
        
        <!-- Позиции кофе -->
        <div class="stat-card" style="background: linear-gradient(135deg, #ffc107, #e0a800);">
            <div class="stat-number">{{ $stats['coffee_menus_count'] }}</div>
            <div style="font-size: 1.1rem;">📋 Позиций кофе</div>
        </div>
        
        <!-- Десерты -->
        <div class="stat-card" style="background: linear-gradient(135deg, #dc3545, #c82333);">
            <div class="stat-number">{{ $stats['menu_sweets_count'] }}</div>
            <div style="font-size: 1.1rem;">🍰 Десертов</div>
        </div>
    </div>
</div>

<div class="card">
    <h3 style="margin-bottom: 1.5rem;">Быстрые действия</h3>
    <div class="actions-grid">
        <a href="{{ route('admin.cities.create') }}" class="action-card">
            <div class="action-icon">🏙️</div>
            <div>Добавить город</div>
        </a>
        
        <a href="{{ route('admin.coffee-shops.create') }}" class="action-card">
            <div class="action-icon">☕</div>
            <div>Добавить кофейню</div>
        </a>
        
        <a href="{{ route('admin.coffee-menus.create') }}" class="action-card">
            <div class="action-icon">📋</div>
            <div>Добавить кофе</div>
        </a>
        
        <a href="{{ route('admin.menu-sweets.create') }}" class="action-card">
            <div class="action-icon">🍰</div>
            <div>Добавить десерт</div>
        </a>
    </div>
</div>
@endsection