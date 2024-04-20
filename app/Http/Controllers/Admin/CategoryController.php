<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function index(){

        $categories = Category::query()->paginate(4);
        return view('category.index' , compact('categories'));
    }


    public function show(Category $category){

        $products = $category->products()->get();
        // dd($products);
        return view('category.show' , compact('category' , 'products'));

    }


    public function create(Category $category){

        return view('category.create');
    }

    public function store(Request $request){

        $formValues = $request->validate([
            'name'=>'required|string|min:3',
        ]);
        // dump($formValues);

        Category::create($formValues);

        return redirect()->route('categories.index');


    }

    public function edit(Category $category){

        return view('category.edit' , compact('category'));
    }

    public function update(Request $request , Category $category){

        $formValues = $request->validate([
            'name'=>'required|string|min:3',
        ]);

        $category->fill($formValues)->save();

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category){
        $category->delete();


        return redirect()->route('categories.index');
    }

  
}
