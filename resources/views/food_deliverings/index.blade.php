@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-3">Food Deliverings</h1>
        <a href="{{ route('food-deliverings.create') }}" class="btn btn-primary mb-3">Create New Food Delivering</a>

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
                                <th>Food Ordering</th>
                                <th>Delivery Status</th>
                                <th>Delivery Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($foodDeliverings as $foodDelivering)
                                <tr>
                                    <td>Order #{{ $foodDelivering->foodOrdering->id }}</td>
                                    <td>{{ ucfirst($foodDelivering->delivery_status) }}</td>
                                    <td>{{ $foodDelivering->delivery_date }}</td>
                                    <td>
                                        <a href="{{ route('food-deliverings.show', $foodDelivering->id) }}"
                                            class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('food-deliverings.edit', $foodDelivering->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('food-deliverings.destroy', $foodDelivering->id) }}"
                                            method="POST" style="display:inline;">
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
