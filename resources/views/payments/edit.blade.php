@extends('layouts.app')

@section('content')
    <h1>Edit Payment</h1>
    <form action="{{ route('payments.update', $payment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="invoice_id">Invoice:</label>
            <select id="invoice_id" name="invoice_id" required>
                @foreach ($invoices as $invoice)
                    <option value="{{ $invoice->id }}" {{ $invoice->id == $payment->invoice_id ? 'selected' : '' }}>
                        Invoice #{{ $invoice->id }} - Customer: {{ $invoice->foodOrdering->customer->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount" value="{{ $payment->amount }}" step="0.01" required>
        </div>
        <div>
            <label for="method">Method:</label>
            <input type="text" id="method" name="method" value="{{ $payment->method }}" required>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
