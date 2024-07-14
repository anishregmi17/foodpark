<?php

namespace App\Http\Controllers;

use App\Models\FoodOrdering;
use App\Models\Customer;
use App\Models\FoodItem;
use Illuminate\Http\Request;

class FoodOrderingController extends Controller
{
    public function index()
    {
        $foodOrderings = FoodOrdering::all();
        return view('food_orderings.index', compact('foodOrderings'));
    }

    public function create()
    {
        $customers = Customer::all();
        $foodItems = FoodItem::all();
        return view('food_orderings.create', compact('customers', 'foodItems'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'food_item_id' => 'required|exists:food_items,id',
            'quantity' => 'required|integer',
            'status' => 'required',
        ]);

        FoodOrdering::create($validated);
        return redirect()->route('food-orderings.index');
    }

    public function show(FoodOrdering $foodOrdering)
    {
        return view('food_orderings.show', compact('foodOrdering'));
    }

    public function edit(FoodOrdering $foodOrdering)
    {
        $customers = Customer::all();
        $foodItems = FoodItem::all();
        return view('food_orderings.edit', compact('foodOrdering', 'customers', 'foodItems'));
    }

    public function update(Request $request, FoodOrdering $foodOrdering)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'food_item_id' => 'required|exists:food_items,id',
            'quantity' => 'required|integer',
            'status' => 'required',
        ]);

        $foodOrdering->update($validated);
        return redirect()->route('food-orderings.index');
    }

    public function destroy(FoodOrdering $foodOrdering)
    {
        $foodOrdering->delete();
        return redirect()->route('food-orderings.index');
    }
}
