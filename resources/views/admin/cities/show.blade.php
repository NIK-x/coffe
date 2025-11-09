@extends('admin.layout')

@section('title', 'City Details')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>City Details</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p><strong>ID:</strong> {{ $city->id_city }}</p>
                <p><strong>Name:</strong> {{ $city->name_city }}</p>
            </div>
        </div>
        <div class="mt-3">
            <a href="{{ route('admin.cities.edit', $city) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('admin.cities.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection