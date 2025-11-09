@extends('admin.layout')

@section('title', 'Edit City')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Edit City</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.cities.update', $city) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name_city" class="form-label">City Name</label>
                <input type="text" class="form-control @error('name_city') is-invalid @enderror" 
                       id="name_city" name="name_city" value="{{ old('name_city', $city->name_city) }}" required>
                @error('name_city')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update City</button>
            <a href="{{ route('admin.cities.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection