@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Food Ordering</h1>
        <form action="{{ route('food-orderings.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="customer_id">Customer:</label>
                <select id="customer_id" name="customer_id" class="form-control" required>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="food_item_id">Food Item:</label>
                <select id="food_item_id" name="food_item_id" class="form-control" required>
                    @foreach ($foodItems as $foodItem)
                        <option value="{{ $foodItem->id }}">{{ $foodItem->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="delivered">Delivered</option>
                    <option value="notdelivered">Not Delivered</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
