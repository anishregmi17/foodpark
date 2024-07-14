@extends('layouts.app')

@section('content')
    <h1>Payment Details</h1>
    <p><strong>ID:</strong> {{ $payment->id }}</p>
    <p><strong>Invoice ID:</strong> {{ $payment->invoice->id }}</p>
    <p><strong>Customer:</strong> {{ $payment->invoice->foodOrdering->customer->name }}</p>
    <p><strong>Amount:</strong> {{ $payment->amount }}</p>
    <p><strong>Method:</strong> {{ $payment->method }}</p>
    <a href="{{ route('payments.edit', $payment->id) }}">Edit</a>
    <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    <a href="{{ route('payments.index') }}">Back to List</a>
@endsection
