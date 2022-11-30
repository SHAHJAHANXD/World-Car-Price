<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('user_name')->nullable();
            $table->string('user_email')->nullable();
            $table->string('status')->default(0);
            $table->string('Body_type')->nullable();
            $table->string('Millage')->nullable();
            $table->string('Features')->nullable();
            $table->string('Top_speed')->nullable();
            $table->string('Transmission_type')->nullable();
            $table->string('Drive_type')->nullable();
            $table->string('Upcoming')->nullable();
            $table->string('Fuel_type')->nullable();
            $table->string('Capacities')->nullable();
            $table->string('Doors')->nullable();
            $table->string('Category_name')->nullable();
            $table->string('Category')->nullable();
            $table->string('Brand')->nullable();
            $table->string('top_10')->nullable();
            $table->string('Tags')->nullable();
            $table->string('Product_status')->nullable();
            $table->string('Title')->nullable();
            $table->string('Year')->nullable();
            $table->string('Thumbnail_Image')->nullable();
            $table->string('Image_alt')->nullable();
            $table->string('Short_Description')->nullable();
            $table->longText('Description')->nullable();
            $table->string('Price')->nullable();
            $table->string('Country')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
