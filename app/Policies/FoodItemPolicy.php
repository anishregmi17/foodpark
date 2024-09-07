<?php

namespace App\Policies;

use App\Models\FoodItem;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FoodItemPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function view(User $user, FoodItem $foodItem)
    {
        return $user->id === $foodItem->user_id;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function update(User $user, FoodItem $foodItem)
    {
        return $user->id === $foodItem->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function delete(User $user, FoodItem $foodItem)
    {
        return $user->id === $foodItem->user_id;
    }
}
