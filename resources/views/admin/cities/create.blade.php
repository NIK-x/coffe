@extends('admin.layout')

@section('title', 'Add City')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Add New City</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.cities.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name_city" class="form-label">City Name</label>
                <input type="text" class="form-control @error('name_city') is-invalid @enderror" 
                       id="name_city" name="name_city" value="{{ old('name_city') }}" required>
                @error('name_city')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create City</button>
            <a href="{{ route('admin.cities.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection