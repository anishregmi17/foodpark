@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-3">Create Customer</h1>
        <a href="{{ route('customers.index') }}" class="btn btn-secondary mb-3">Back to List</a>
        <form action="{{ route('customers.store') }}" method="POST" class="needs-validation" novalidate>
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
                <label for="email">Email:</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                    name="phone" value="{{ old('phone') }}" required>
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                    name="address" value="{{ old('address') }}" required>
                @error('address')
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
                var validation = Array.prototype.filter.call(forms, function(form) {
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
