<?php

use Illuminate\Database\Seeder;
use App\ProductRent;
use App\CategoryRent;
use App\ProductImageRent;

class ProductsRentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(CategoryRent::class, 5)->create();
        factory(ProductRent::class,100)->create();
        factory(ProductImageRent::class, 200)->create();

        // $categories = factory(CategoryRent::class, 5)->create();
        // $categories->each(function ($categoryRent) {
        //     $productsRent = factory(ProductRent::class,20)->make();
        //     $categoryRent->productsRent()->saveMany($productsRent);

        //     $productsRent->each(function ($p) { 
        //         $imagesRent = factory(ProductImageRent::class, 5)->make();
        //         $p->imagesRent()->saveMany($images);
        //     });
        // });

        
    }
}
