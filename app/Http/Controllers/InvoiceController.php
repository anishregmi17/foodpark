<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\FoodOrdering;
use App\Models\Payment;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();
        $payments = Payment::all();
        return view('invoices.index', compact('invoices', 'payments'));
    }

    public function create()
    {
        $foodOrderings = FoodOrdering::all();
        return view('invoices.create', compact('foodOrderings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'food_ordering_id' => 'required|exists:food_orderings,id',
            'amount' => 'required|numeric',
            'status' => 'required',
        ]);

        Invoice::create($request->all());
        return redirect()->route('invoices.index');
    }

    public function show(Invoice $invoice)
    {
        $invoice->load('foodOrdering.customer', 'foodOrdering.foodItem');
        return view('invoices.show', compact('invoice'));
    }

    public function edit(Invoice $invoice)
    {
        $foodOrderings = FoodOrdering::all();
        return view('invoices.edit', compact('invoice', 'foodOrderings'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'food_ordering_id' => 'required|exists:food_orderings,id',
            'amount' => 'required|numeric',
            'status' => 'required',
        ]);

        $invoice->update($request->all());
        return redirect()->route('invoices.index');
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('invoices.index');
    }
    public function getInvoiceAmount($invoiceId)
    {
        $invoice = Invoice::find($invoiceId);

        if ($invoice && $invoice->foodOrdering && $invoice->foodOrdering->foodItem) {
            $amount = $invoice->foodOrdering->foodItem->price * $invoice->foodOrdering->quantity * 1.13;
            return response()->json(['amount' => $amount]);
        } else {
            return response()->json(['amount' => 0]);
        }
    }
}
