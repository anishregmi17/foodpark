@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Food Ordering</h1>
        <form action="{{ route('food-orderings.update', $foodOrdering->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="customer_id">Customer:</label>
                <select id="customer_id" name="customer_id" class="form-control" required>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}"
                            {{ $foodOrdering->customer_id == $customer->id ? 'selected' : '' }}>
                            {{ $customer->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="food_item_id">Food Item:</label>
                <select id="food_item_id" name="food_item_id" class="form-control" required>
                    @foreach ($foodItems as $foodItem)
                        <option value="{{ $foodItem->id }}"
                            {{ $foodOrdering->food_item_id == $foodItem->id ? 'selected' : '' }}>
                            {{ $foodItem->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" class="form-control"
                    value="{{ $foodOrdering->quantity }}" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="delivered" {{ $foodOrdering->status == 'delivered' ? 'selected' : '' }}>Delivered
                    </option>
                    <option value="notdelivered" {{ $foodOrdering->status == 'notdelivered' ? 'selected' : '' }}>Not
                        Delivered</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
