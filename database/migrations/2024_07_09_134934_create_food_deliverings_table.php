<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodDeliveringsTable extends Migration
{
    public function up()
    {
        Schema::create('food_deliverings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('food_ordering_id')->constrained()->onDelete('cascade');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('food_deliverings');
    }
}
