@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Food Delivering Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Food Ordering: Order #{{ $foodDelivering->foodOrdering->id }}</h5>
                <p class="card-text">
                    <strong>Delivery Status:</strong> {{ ucfirst($foodDelivering->delivery_status) }}<br>
                    <strong>Delivery Date:</strong> {{ $foodDelivering->delivery_date }}
                </p>
            </div>
            <div class="card-footer">
                <a href="{{ route('food-deliverings.index') }}" class="btn btn-primary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
