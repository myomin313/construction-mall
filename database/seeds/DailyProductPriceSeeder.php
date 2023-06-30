<?php

use Illuminate\Database\Seeder;
use App\DailyProductPrice;
class DailyProductPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DailyProductPrice::create([
            'product_name'=>'Sieve Analysis',
            'currency' =>'$',
            'price'=>400
        ]);
         DailyProductPrice::create([
            'product_name'=>'Hydrometer',
            'currency' =>'$',
            'price'=>300
        ]);
          DailyProductPrice::create([
            'product_name'=>'Atterberg Limit',
            'currency' =>'$',
            'price'=>500
        ]);
           DailyProductPrice::create([
            'product_name'=>'Specific Gravity',
            'currency' =>'$',
            'price'=>600
        ]);
            DailyProductPrice::create([
            'product_name'=>'Moisture Content',
            'currency' =>'$',
            'price'=>300
        ]);
    }
}
