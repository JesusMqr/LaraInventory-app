<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(){
        
        $products = Product::all();

        return view('productos.index',compact('products'));
    }

    public function create(){
        return view('productos.create');
    }

    public function store(Request $request){
        $validateProduct = Validator::make($request->all(),[
            'name' => ['required','string','max:255'],
            'description' => ['required','string'],
            'price' => ['required','numeric'],
            'stock' => ['required','numeric'],
            'min_stock' => ['required','numeric'],
            'category' => ['required','string']
        ]);

        if($validateProduct->fails()){
            return redirect()->route('products.create')->withErrors($validateProduct)->withInput();
        }
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'min_stock' => $request->min_stock,
            'category' => $request->category
        ]);
        return redirect()->route('products.index')->with('message','Producto creado correctamente');
    }

    public function edit($id){
        $product = Product::find($id);
        return view('productos.edit',compact('product'));
    }

    public function update(Request $request){
        $validateProduct = Validator::make($request->all(),[
            'name' => ['required','string','max:255'],
            'description' => ['required','string'],
            'price' => ['required','numeric'],
            'stock' => ['required','numeric'],
            'min_stock' => ['required','numeric'],
            'category' => ['required','string']
        ]);

        if($validateProduct->fails()){
            return redirect()->route('products.create')->withErrors($validateProduct)->withInput();
        }
        $product = Product::find($request->id);
        
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'min_stock' => $request->stock,
            'category' => $request->category
        ]);
        return redirect()->route('products.index')->with('message','Producto editado correctamente');
    }

    public function destroy(Product $product){
        $product->delete();
        return redirect()->route('products.index')->with('message','Producto eliminado correctamente');
    }
}
