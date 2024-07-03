<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('inventory.categories.categories',(compact('categories')));
    }
    public function show($id){

        $category = Category::find($id);
        return view('inventory.categories.show',compact('category'));
    }

    public function searchProducts($id,Request $request){
        $search = $request->search;
        $category = Category::find($id);
        $filterProducts = $category->products()->where('name','LIKE','%' . $search . '%')->get();
        return view('inventory.categories.show',compact('category','filterProducts'));
    }
    public function create(){
        return view('inventory.categories.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => ['required','string','max:255'],
            'description' => ['required','string','max:255']
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $message = "La categoria " .$request->name . " ha sido creada exitosamente."; 

        return redirect()->route('categories')->with('message',$message );
    }
    public function edit($id){
        $category = Category::find($id);
        return view('inventory.categories.edit',compact('category'));
    }

    public function update($id, Request $request){
        $request->validate([
            'name' => ['required','string','max:255'],
            'description' => ['required','string','max:255']
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        $message = "La categoria " .$request->name .  " ha sido actualizada exitosamente.";
        return redirect()->route('categories')->with('message',$message);
    }

    public function destroy(Category $category){
        $message= "La categoria " .$category->name . " ha sido eliminado."; 
        $category->delete();
        return redirect()->route('categories')->with('message',$message );
    }
}

