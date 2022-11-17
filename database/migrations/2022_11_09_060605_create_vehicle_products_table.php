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
        Schema::create('vehicle_products', function (Blueprint $table) {
            $table->id();
            $table->string('Posted_By')->nullable();
            $table->string('Status_value')->default(1);
            $table->string('category')->nullable();
            $table->string('ProductName')->nullable();
            $table->string('ProductPrice')->nullable();

            $table->string('OverView')->nullable();
            //Basic
            $table->string('Brand')->nullable();
            $table->string('ModelNumber')->nullable();
            $table->string('MadeIn')->nullable();
            $table->string('Status')->nullable();
            $table->string('ReleaseDate')->nullable();
            $table->string('Warranty')->nullable();
            $table->string('Colors')->nullable();
            $table->string('BodyType')->nullable();
            // Engine
            $table->string('EngineType')->nullable();
            $table->string('Displacement')->nullable();
            $table->string('CoolingSystem')->nullable();
            $table->string('EnginePower')->nullable();
            $table->string('Torque')->nullable();
            $table->string('Starter')->nullable();
            $table->string('BoreStroke')->nullable();
            $table->string('CompressionRatio')->nullable();
            $table->string('NoOfCylinders')->nullable();
            // Performance
            $table->string('Transmission')->nullable();
            $table->string('Clutch')->nullable();
            $table->string('FinalDrive')->nullable();
            $table->string('GearBox')->nullable();
            $table->string('TopSpeed')->nullable();
            // Suspensions
            $table->string('FrontSuspension')->nullable();
            $table->string('RearSuspension')->nullable();
            // Dimensions And Weight
            $table->string('Length')->nullable();
            $table->string('Width')->nullable();
            $table->string('Height')->nullable();
            $table->string('Wheelbase')->nullable();
            $table->string('SeatHeight')->nullable();
            $table->string('GroundClearance')->nullable();
            $table->string('KurbWeight')->nullable();
            // Tires
            $table->string('TyreFront')->nullable();
            $table->string('TyreRear')->nullable();
            $table->string('FrontWheel')->nullable();
            $table->string('RearWheel')->nullable();
            // Brake System
            $table->string('FrontBrake')->nullable();
            $table->string('RearBrake')->nullable();
            $table->string('ABSSystem')->nullable();
            // Fuel
            $table->string('Mileage')->nullable();
            $table->string('FuelType')->nullable();
            // Capacities
            $table->string('SeatingCapacity')->nullable();
            $table->string('FuelTankCapacity')->nullable();
            // Features
            $table->string('Features')->nullable();
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
        Schema::dropIfExists('vehicle_products');
    }
};
