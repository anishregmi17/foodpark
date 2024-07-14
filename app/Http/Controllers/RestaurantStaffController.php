<?php

namespace App\Http\Controllers;

use App\Models\RestaurantStaff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RestaurantStaffController extends Controller
{
    public function index()
    {
        $staff = RestaurantStaff::all();
        return view('restaurant_staff.index', compact('staff'));
    }

    public function create()
    {
        return view('restaurant_staff.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $validated['profile_image'] = 'images/' . $imageName;
        }

        RestaurantStaff::create($validated);
        return redirect()->route('restaurant-staff.index');
    }

    public function show(RestaurantStaff $restaurantStaff)
    {
        return view('restaurant_staff.show', compact('restaurantStaff'));
    }

    public function edit(RestaurantStaff $restaurantStaff)
    {
        return view('restaurant_staff.edit', compact('restaurantStaff'));
    }

    public function update(Request $request, RestaurantStaff $restaurantStaff)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('profile_image')) {
            // Delete the old profile image if it exists
            if ($restaurantStaff->profile_image) {
                File::delete(public_path($restaurantStaff->profile_image));
            }

            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $validated['profile_image'] = 'images/' . $imageName;
        }

        $restaurantStaff->update($validated);
        return redirect()->route('restaurant-staff.index');
    }

    public function destroy(RestaurantStaff $restaurantStaff)
    {
        if ($restaurantStaff->profile_image) {
            File::delete(public_path($restaurantStaff->profile_image));
        }
        $restaurantStaff->delete();
        return redirect()->route('restaurant-staff.index');
    }
}
