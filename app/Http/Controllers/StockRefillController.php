<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\StockRefill;
use Illuminate\Http\Request;

class StockRefillController extends Controller
{
    public function index(){
        $refillRequest = StockRefill::whereNotIn('status',['rechazado','completo'])->get();
        return view('stockRefill.index',compact('refillRequest'));
    }

    public function create($product_id){
        return view('stockRefill.create', ['product_id' => $product_id]);
    }
    public function store(Request $request){
        $request->validate([
            'product_id'=>'required|numeric',
            'quantity'=>'required|numeric',
        ]);

        $existingRequest = StockRefill::where('product_id', $request->product_id)
        ->whereIn('status', ['pendiente', 'en proceso'])
        ->first();

        if ($existingRequest) {
            // Si existe, redirigir de nuevo con un mensaje de error
            return redirect()->back()->withErrors(['error' => 'Ya hay una solicitud de este producto, por favor finalize la solicitud antes de crear otra.']);
        }

        $stockRequest = StockRefill::create([
            'product_id'=>$request->product_id,
            'quantity'=>$request->quantity,
            'status'=>'pendiente'
        ]);

        $stockRequest->save();
        return redirect()->route('stock_refill.index')->with('message','La solicitud de refill ha sido creada exitosamente.');
    }
    public function aprove(StockRefill $request){
        $request->status = "en proceso";
        $request->save();

        return redirect()->route('stock_refill.index')->with('message','La solicitud de refill ha sido aprobada.');
    }

    public function reject(StockRefill $request){
        $request->status = "rechazado";
        $request->save();
        return redirect()->route('stock_refill.index')->with('message','La solicitud de refill ha sido rechazada.');
    }
    public function complete(StockRefill $request){
        $request->status = "completo";
        $product = Product::find($request->product_id); 
        
        $product->stock += $request->quantity;
        $product->save();
        $request->save();
        return redirect()->route('stock_refill.index')->with('message','La solicitud de refill ha sido completada.');
    }
}
