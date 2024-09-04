@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-3">Food Item List</h1>
        <a href="{{ route('food-items.create') }}" class="btn btn-primary mb-3">Create New Food Item</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Availability</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($foodItems as $foodItem)
                                <tr>
                                    <td>{{ $foodItem->name }}</td>
                                    <td>{{ $foodItem->description }}</td>
                                    <td>{{ $foodItem->price }}</td>
                                    <td>
                                        @if ($foodItem->availability)
                                            <span class="badge badge-success">Available</span>
                                        @else
                                            <span class="badge badge-warning">Not Available</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($foodItem->image)
                                            <img src="{{ asset('storage/' . $foodItem->image) }}"
                                                alt="{{ $foodItem->name }}"
                                                style="width: 70px; height: 70px; object-fit: cover;">
                                        @else
                                            <p>No image</p>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('food-items.edit', $foodItem->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('food-items.destroy', $foodItem->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
