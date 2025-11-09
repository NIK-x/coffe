@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $stats['cities_count'] }}</h4>
                        <p>Cities</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-city fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-success">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $stats['coffee_shops_count'] }}</h4>
                        <p>Coffee Shops</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-coffee fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $stats['coffee_menus_count'] }}</h4>
                        <p>Coffee Menu Items</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-mug-hot fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-info">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $stats['menu_sweets_count'] }}</h4>
                        <p>Menu Sweets</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-cookie fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5>Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-2">
                        <a href="{{ route('admin.cities.create') }}" class="btn btn-outline-primary w-100">
                            Add New City
                        </a>
                    </div>
                    <div class="col-md-3 mb-2">
                        <a href="{{ route('admin.coffee-shops.create') }}" class="btn btn-outline-success w-100">
                            Add Coffee Shop
                        </a>
                    </div>
                    <div class="col-md-3 mb-2">
                        <a href="{{ route('admin.coffee-menus.create') }}" class="btn btn-outline-warning w-100">
                            Add Coffee Menu
                        </a>
                    </div>
                    <div class="col-md-3 mb-2">
                        <a href="{{ route('admin.menu-sweets.create') }}" class="btn btn-outline-info w-100">
                            Add Menu Sweet
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection