<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Invoice;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        $invoices = Invoice::all();
        return view('payments.create', compact('invoices'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'invoice_id' => 'required|exists:invoices,id',
            'amount' => 'required|numeric',
            'method' => 'required',
        ]);

        Payment::create($request->all());
        return redirect()->route('payments.index');
    }

    public function show(Payment $payment)
    {
        return view('payments.show', compact('payment'));
    }

    public function edit(Payment $payment)
    {
        $invoices = Invoice::all();
        return view('payments.edit', compact('payment', 'invoices'));
    }

    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'invoice_id' => 'required|exists:invoices,id',
            'amount' => 'required|numeric',
            'method' => 'required',
        ]);

        $payment->update($request->all());
        return redirect()->route('payments.index');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments.index');
    }
}
