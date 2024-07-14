@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-3">Customer Details</h1>
        <a href="{{ route('customers.index') }}" class="btn btn-secondary mb-3">Back to List</a>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $customer->name }}</h5>
                <p class="card-text"><strong>Email:</strong> {{ $customer->email }}</p>
                <p class="card-text"><strong>Phone:</strong> {{ $customer->phone }}</p>
                <p class="card-text"><strong>Address:</strong> {{ $customer->address }}</p>
                <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
@endsection
