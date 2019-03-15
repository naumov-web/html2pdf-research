<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Car
 * @package App
 * @property string $reg_number
 * @property string $owner_name
 * @property string $region_name
 * @property string $brand_name
 * @property string $model_name
 * @property string $transmission_name
 * @property string $road_accidents_count
 * @property string $fines_count
 * @property string $last_service_at
 */
class Car extends Model
{
    /**
     * Fillable fields
     * @var array
     */
    protected $fillable = [
        'reg_number',
        'owner_name',
        'region_name',
        'brand_name',
        'model_name',
        'transmission_name',
        'road_accidents_count',
        'fines_count',
        'last_service_at',
    ];
}
