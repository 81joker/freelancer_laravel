<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\RealEstate\Facades\RealEstateHelper;
use Botble\RealEstate\Models\Property;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PropertySeeder extends BaseSeeder
{
    public function run(): void
    {
        $this->uploadFiles('properties');

        Property::query()->update(['expire_date' => Carbon::now()->addDays(RealEstateHelper::propertyExpiredDays())]);

        DB::statement('UPDATE re_properties SET views = FLOOR(rand() * 10000) + 1;');

        $floorPlans = collect(
            [
                [
                    'name' => 'First Floor',
                    'bedrooms' => 3,
                    'bathrooms' => 2,
                    'image' => $this->filePath('properties/floor.png'),
                ],
                [
                    'name' => 'Second Floor',
                    'bedrooms' => 2,
                    'bathrooms' => 1,
                    'image' => $this->filePath('properties/floor.png'),
                ],
            ]
        )
            ->map(function ($floorPlan) {
                return collect($floorPlan)->map(function ($value, $key) {
                    return [
                        'key' => $key,
                        'value' => (string) $value,
                    ];
                })->toArray();
            })
            ->toArray();

        Property::query()->update(['floor_plans' => json_encode($floorPlans)]);
    }
}
