<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function create($id_category){
        return view('inventory.products.create',compact('id_category'));
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required|string',
            'description'=>'required|string',
            'price'=>'required|numeric',
            'id_category'=>'required|numeric',
            'stock'=>'required|numeric',
            'min_stock'=>'required|numeric',
        ]);

        Product::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'id_category'=>$request->id_category,
            'stock'=>$request->stock,
            'min_stock'=>$request->min_stock,
        ]);

        return redirect()->route('categories.show',$request->id_category)->with('message','Producto creado correctamente');
    }

    public function edit($id){
        $product = Product::findOrFail($id);
        return view('inventory.products.edit',compact('product'));
    }

    public function update( $id,Request $request){
        $request->validate([
            'name'=>'required|string',
            'description'=>'required|string',
            'price'=>'required|numeric',
            'id_category'=>'required|numeric',
            'stock'=>'required|numeric',
            'min_stock'=>'required|numeric',
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'id_category'=>$request->id_category,
            'stock'=>$request->stock,
            'min_stock'=>$request->min_stock,
        ]);

        return redirect()->route('categories.show',$product->id_category)->with('message','Producto editado correctamente');

    }

    public function destroy(Product $product){
        
        $category = $product->id_category; 
        $product->delete();
        return redirect()->route('categories.show',$category)->with('message','Producto eliminado correctamente');
    }
}
