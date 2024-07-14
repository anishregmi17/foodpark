@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-3">Create Payment</h1>
        <a href="{{ route('payments.index') }}" class="btn btn-secondary mb-3">Back to List</a>
        <form action="{{ route('payments.store') }}" method="POST" class="needs-validation" novalidate>
            @csrf
            <div class="form-group">
                <label for="invoice_id">Invoice:</label>
                <select class="form-control @error('invoice_id') is-invalid @enderror" id="invoice_id" name="invoice_id"
                    required onchange="fetchInvoiceAmount(this.value)">
                    <option value="">Select Invoice</option>
                    @foreach ($invoices as $invoice)
                        <option value="{{ $invoice->id }}">Invoice #{{ $invoice->id }} - Customer:
                            {{ $invoice->foodOrdering->customer->name }}</option>
                    @endforeach
                </select>
                @error('invoice_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="amount">Amount (Nrs):</label>
                <input type="number" class="form-control @error('amount') is-invalid @enderror" id="amount"
                    name="amount" step="0.01" required readonly>
                @error('amount')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="method">Method:</label>
                <select class="form-control @error('method') is-invalid @enderror" id="method" name="method" required>
                    <option value="cash">Cash</option>
                    <option value="esewa">Esewa</option>
                    <option value="khalti">Khalti</option>
                    <option value="online">Online</option>
                </select>
                @error('method')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

    <script>
        function fetchInvoiceAmount(invoiceId) {
            if (invoiceId) {
                fetch(`/invoices/${invoiceId}/amount`)
                    .then(response => response.json())
                    .then(data => {
                        const amount = data.amount;
                        document.getElementById('amount').value = amount.toFixed(2);
                    })
                    .catch(error => console.error('Error fetching invoice amount:', error));
            } else {
                document.getElementById('amount').value = '';
            }
        }
    </script>
@endsection
