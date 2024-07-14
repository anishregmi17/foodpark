@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-3">Food Orderings</h1>
        <a href="{{ route('food-orderings.create') }}" class="btn btn-primary mb-3">Create New Food Ordering</a>

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
                                <th>Customer</th>
                                <th>Food Item</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($foodOrderings as $foodOrdering)
                                <tr>
                                    <td>{{ $foodOrdering->customer->name }}</td>
                                    <td>{{ $foodOrdering->foodItem->name }}</td>
                                    <td>{{ $foodOrdering->quantity }}</td>
                                    <td>
                                        @if ($foodOrdering->status == 'delivered')
                                            <span class="badge badge-success">Delivered</span>
                                        @else
                                            <span class="badge badge-warning">Not Delivered</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('food-orderings.show', $foodOrdering->id) }}"
                                            class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('food-orderings.edit', $foodOrdering->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        {{-- <form action="{{ route('food-orderings.destroy', $foodOrdering->id) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form> --}}
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
