<?php

use Illuminate\Database\Seeder;
use App\Rent;
use App\RentCategory;
use App\RentImage;

class RentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(RentCategory::class,5)->create();
        // factory(Rent::class,100)->create();
        // factory(RentImage::class,200)->create();

        $categories = factory(RentCategory::class, 5)->create();
        $categories->each(function($category) {
            $rents = factory(Rent::class, 20)->make();
            $category->rents()->saveMany($rents);

        $rents->each(function ($p) {
            $images = factory(RentImage::class, 5)->make();
            $p->rentimages()->saveMany($images);
        });
        });
    }
}
