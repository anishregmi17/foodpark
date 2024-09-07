<?php

namespace App\Http\Controllers;

use App\Models\FoodItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class FoodItemController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $foodItems = FoodItem::all();
        return view('food_items.index', compact('foodItems'));
    }

    public function create()
    {
        return view('food_items.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'availability' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Add image validation rules
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = $imagePath;
        }

        FoodItem::create($validated);
        return redirect()->route('food-items.index')->with('success', 'Food item created successfully.');
    }

    public function show(FoodItem $foodItem)
    {
        return view('food_items.show', compact('foodItem'));
    }

    public function edit(FoodItem $foodItem)
    {
        return view('food_items.edit', compact('foodItem'));
    }

    public function update(Request $request, FoodItem $foodItem)
    {
        $this->authorize('update', $foodItem);

        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'availability' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Add image validation rules
        ]);

        // Handle image update
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = $imagePath;

            // Delete old image if exists
            if ($foodItem->image) {
                Storage::disk('public')->delete($foodItem->image);
            }
        }

        $foodItem->update($validated);
        return redirect()->route('food-items.index')->with('success', 'Food item updated successfully.');
    }

    public function destroy(FoodItem $foodItem)
    {
        // Delete image associated with the food item
        if ($foodItem->image) {
            Storage::disk('public')->delete($foodItem->image);
        }

        $foodItem->delete();
        return redirect()->route('food-items.index')->with('success', 'Food item deleted successfully.');
    }
}
