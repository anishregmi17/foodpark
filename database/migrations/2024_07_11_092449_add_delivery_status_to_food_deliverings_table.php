<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeliveryStatusToFoodDeliveringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('food_deliverings', function (Blueprint $table) {
            $table->string('delivery_status')->after('food_ordering_id'); // Adjust the 'after' part if necessary
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('food_deliverings', function (Blueprint $table) {
            $table->dropColumn('delivery_status');
        });
    }
}
