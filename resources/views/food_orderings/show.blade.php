@extends('layouts.app')

@section('content')
    <h1>Food Ordering Details</h1>
    <p><strong>ID:</strong> {{ $foodOrdering->id }}</p>
    <p><strong>Customer:</strong> {{ $foodOrdering->customer->name }}</p>
    <p><strong>Food Item:</strong> {{ $foodOrdering->foodItem->name }}</p>
    <p><strong>Quantity:</strong> {{ $foodOrdering->quantity }}</p>
    <p><strong>Status:</strong> {{ $foodOrdering->status }}</p>
    <a href="{{ route('food-orderings.edit', $foodOrdering->id) }}">Edit</a>
    <form action="{{ route('food-orderings.destroy', $foodOrdering->id) }}" method="POST" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    <a href="{{ route('food-orderings.index') }}">Back to List</a>
@endsection
