@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-3">Create Food Item</h1>
        <a href="{{ route('food-items.index') }}" class="btn btn-secondary mb-3">Back to List</a>
        <form action="{{ route('food-items.store') }}" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                    name="description" value="{{ old('description') }}" required>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                    name="price" step="0.01" value="{{ old('price') }}" required>
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="availability">Availability:</label>
                <select class="form-control @error('availability') is-invalid @enderror" id="availability"
                    name="availability" required>
                    <option value="1" {{ old('availability') == '1' ? 'selected' : '' }}>Available</option>
                    <option value="0" {{ old('availability') == '0' ? 'selected' : '' }}>Not Available</option>
                </select>
                @error('availability')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endsection
