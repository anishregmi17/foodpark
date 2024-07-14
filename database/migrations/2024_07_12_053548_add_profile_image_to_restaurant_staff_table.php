<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileImageToRestaurantStaffTable extends Migration
{
    public function up()
    {
        Schema::table('restaurant_staff', function (Blueprint $table) {
            $table->string('profile_image')->nullable()->after('contact');
        });
    }

    public function down()
    {
        Schema::table('restaurant_staff', function (Blueprint $table) {
            $table->dropColumn('profile_image');
        });
    }
}
