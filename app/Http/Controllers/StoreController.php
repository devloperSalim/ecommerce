<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    public function index(Request $request){

        $productQuery = Product::query()->with('category');
        $categories = Category::with('products')->has('products')->get();
        $name = ($request->input('name'));
        $categoriesId = $request->input('categories');
        $min = $request->input('min')?? 0;
        $max = $request->input('max');
        // dd($categoriesId);


        if(!empty($name)){
            $productQuery->where('name' , 'like' , "%{$name}%")
                        ->orWhere('description' , 'like' , "%$name%");
        }

        //
        if(!empty($categoriesId)){
            $productQuery->whereIn('category_id' , $categoriesId);
        }




        
        $productQuery->where('price', '>=', $min);

        if(!empty($max)){
            $productQuery->where('price' , '<=' , $max);
        }




        // dd($productQuery->getQuery());
        $products = $productQuery->get();

        $prices =$products->pluck('price')->all();

        $pricesOptions = new \stdClass;

        $pricesOptions->minPrice = 0;

        $pricesOptions->maxPrice = 0;

        if(!empty($prices)){
            $pricesOptions->minPrice = min($prices);

            $pricesOptions->maxPrice = max($prices);
        }
        return view('store.home' , compact('products' , 'categories' , 'pricesOptions'));
    }
}
