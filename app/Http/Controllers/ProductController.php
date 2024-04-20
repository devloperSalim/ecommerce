<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::query()->with('category')->paginate(3);
        return view('product.index' , compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {

        $formFields = $request->validated();

        // put image
        if($request->hasFile('image')){
            $formFields['image'] = $request->file('image')->store('images/product' , 'public');
        }
        // dd($formFields);

        Product::create($formFields);

        return redirect()->route('products.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('product.edit' , compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $formFields = $request->validated();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/product', 'public');

            // Delete old image if it exists
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $formFields['image'] = $imagePath;
        }

        $product->update($formFields);


        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index');
    }



        public function search(Request $request)
        {
            $query = $request->input('query');

            $products = Product::where('name', 'like', "%$query%")
                                ->orWhere('description', 'like', "%$query%")
                                ->paginate(10);

            return view('product.search', compact('products', 'query'));
        }
    }

