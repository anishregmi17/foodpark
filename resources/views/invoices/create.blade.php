@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-3">Create Invoice</h1>
        <a href="{{ route('invoices.index') }}" class="btn btn-secondary mb-3">Back to List</a>
        <form action="{{ route('invoices.store') }}" method="POST" class="needs-validation" novalidate>
            @csrf
            <div class="form-group">
                <label for="food_ordering_id">Food Ordering:</label>
                <select class="form-control @error('food_ordering_id') is-invalid @enderror" id="food_ordering_id"
                    name="food_ordering_id" required>
                    @foreach ($foodOrderings as $foodOrdering)
                        <option value="{{ $foodOrdering->id }}">{{ $foodOrdering->id }} -
                            {{ $foodOrdering->customer->name }}</option>
                    @endforeach
                </select>
                @error('food_ordering_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" class="form-control @error('amount') is-invalid @enderror" id="amount"
                    name="amount" required>
                @error('amount')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                    <option value="paid">Paid</option>
                    <option value="unpaid">Unpaid</option>
                </select>
                @error('status')
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
