@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-3">Invoices</h1>
        <a href="{{ route('invoices.create') }}" class="btn btn-primary mb-3">Create Invoice</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Food Ordering ID</th>
                        <th>Customer Name</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->id }}</td>
                            <td>{{ $invoice->foodOrdering->id }}</td>
                            <td>{{ $invoice->foodOrdering->customer->name }}</td>
                            <td>Nrs {{ $invoice->foodOrdering->foodItem->price * $invoice->foodOrdering->quantity * 1.13 }}
                            </td>
                            <td>
                                @if ($invoice->status == 'paid')
                                    <span class="badge badge-success">Paid</span>
                                @else
                                    <span class="badge badge-warning">Unpaid</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('invoices.show', $invoice->id) }}" class="btn btn-info btn-sm">Invoice
                                    Detail+Print</a>
                                <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST"
                                    style="display:inline;">
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
@endsection
