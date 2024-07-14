@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-3">Create Restaurant Staff</h1>
        <a href="{{ route('restaurant-staff.index') }}" class="btn btn-secondary mb-3">Back to List</a>
        <form action="{{ route('restaurant-staff.store') }}" method="POST" enctype="multipart/form-data"
            class="needs-validation" novalidate>
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
                <label for="role">Role:</label>
                <input type="text" class="form-control @error('role') is-invalid @enderror" id="role" name="role"
                    value="{{ old('role') }}" required>
                @error('role')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="contact">Contact:</label>
                <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact"
                    name="contact" value="{{ old('contact') }}" required>
                @error('contact')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="profile_image">Profile Image:</label>
                <input type="file" class="form-control-file @error('profile_image') is-invalid @enderror"
                    id="profile_image" name="profile_image">
                @error('profile_image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        // JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
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
