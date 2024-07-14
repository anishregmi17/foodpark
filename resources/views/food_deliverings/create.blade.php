@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Food Delivering</h1>
        <form action="{{ route('food-deliverings.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="food_ordering_id">Food Ordering:</label>
                <select id="food_ordering_id" name="food_ordering_id" class="form-control" required>
                    @foreach ($foodOrderings as $foodOrdering)
                        <option value="{{ $foodOrdering->id }}">Order #{{ $foodOrdering->id }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="delivery_status">Delivery Status:</label>
                <select id="delivery_status" name="delivery_status" class="form-control" required>
                    <option value="pending">Pending</option>
                    <option value="delivered">Delivered</option>
                </select>
            </div>
            <div class="form-group">
                <label for="delivery_date">Delivery Date:</label>
                <input type="date" id="delivery_date" name="delivery_date" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
