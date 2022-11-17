<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehicle_products extends Model
{
    use HasFactory;
    protected $fillable = [
        'Posted_By',    'Status_value', 'ProductName', 'ProductPrice',  'category',  'OverView',    'Brand', 'ModelNumber',    'MadeIn', 'Status', 'ReleaseDate',    'Warranty', 'Colors', 'FrontBrake',   'BodyType',    'EngineType', 'Displacement',    'CoolingSystem', 'EnginePower', 'Torque',    'Starter', 'BoreStroke', 'CompressionRatio',    'NoOfCylinders',    'Transmission',    'Clutch', 'FinalDrive', 'GearBox',    'TopSpeed',    'FrontSuspension',    'RearSuspension',    'Length',    'Width', 'Height',    'Wheelbase',    'SeatHeight', 'GroundClearance',    'KurbWeight',    'TyreFront',    'TyreRear', 'FrontWheel',    'RearWheel',    'Front', 'Brake', 'RearBrake',    'ABSSystem',    'Mileage',    'FuelType',    'SeatingCapacity', 'FuelTankCapacity', 'Features',
    ];
}
