@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-3">Customer List</h1>
        <a href="{{ route('customers.create') }}" class="btn btn-primary mb-3">Create New Customer</a>

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
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>{{ $customer->address }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('customers.show', $customer->id) }}"
                                                class="btn btn-info btn-sm">View</a>
                                            <a href="{{ route('customers.edit', $customer->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </div>
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
