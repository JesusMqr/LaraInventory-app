<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StockRefill;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class RecordController extends Controller
{
    
    public function refillRecords(){
        $records = StockRefill::whereIn('status',['completo','rechazado'])->get();
        $records->each(function ($request) {
            $request->formatted_created_at = Carbon::parse($request->created_at)->format('d-m-Y');
        });

        return view('records.refill',compact('records'));
    }
}
