@extends('layouts.app')

@section('content')
    <h1>Staff Details</h1>
    <p><strong>ID:</strong> {{ $restaurantStaff->id }}</p>
    <p><strong>Name:</strong> {{ $restaurantStaff->name }}</p>
    <p><strong>Role:</strong> {{ $restaurantStaff->role }}</p>
    <p><strong>Contact:</strong> {{ $restaurantStaff->contact }}</p>
    @if ($restaurantStaff->profile_image)
        <p><strong>Profile Image:</strong></p>
        <img src="{{ asset('storage/' . $restaurantStaff->profile_image) }}" alt="{{ $restaurantStaff->name }}"
            style="max-width: 200px;">
    @endif
    <a href="{{ route('restaurant-staff.edit', $restaurantStaff->id) }}" class="btn btn-sm btn-warning">Edit</a>
    <form action="{{ route('restaurant-staff.destroy', $restaurantStaff->id) }}" method="POST" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
    </form>
    <a href="{{ route('restaurant-staff.index') }}" class="btn btn-sm btn-secondary">Back to List</a>
@endsection
