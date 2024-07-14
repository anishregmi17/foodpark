@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-3">Food Item Details</h1>
        <a href="{{ route('food-items.index') }}" class="btn btn-secondary mb-3">Back to List</a>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $foodItem->name }}</h5>
                <p class="card-text"><strong>Description:</strong> {{ $foodItem->description }}</p>
                <p class="card-text"><strong>Price:</strong> {{ $foodItem->price }}</p>
                <p class="card-text"><strong>Availability:</strong>
                    {{ $foodItem->availability ? 'Available' : 'Not Available' }}</p>
                @if ($foodItem->image)
                    <img src="{{ asset('storage/' . $foodItem->image) }}" alt="Food Item Image" class="img-fluid mb-3">
                @else
                    <p>No image</p>
                @endif
                <a href="{{ route('food-items.edit', $foodItem->id) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
@endsection
