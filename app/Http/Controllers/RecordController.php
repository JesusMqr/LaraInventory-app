<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StockRefill;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class RecordController extends Controller
{
    
    public function refillRecords(){
        $records = StockRefill::whereIn('status',['completo','rechazado'])->orderBy('created_at', 'desc')->get();
        $records->each(function ($request) {
            $request->formatted_created_at = Carbon::parse($request->created_at)->format('d-m-Y');
        });

        return view('records.refill',compact('records'));
    }

    public function searchRefillRecords(Request $request)
{
    $request->validate([
        'start_date' => 'date|required',
        'end_date' => 'date|nullable',
    ]);


    $start_date = Carbon::parse($request->start_date)->startOfDay();
    $end_date = $request->filled('end_date') 
                ? Carbon::parse($request->end_date)->endOfDay() 
                : Carbon::now()->endOfDay();


    $records = StockRefill::whereBetween('created_at', [$start_date, $end_date])
        ->whereIn('status', ['completo', 'rechazado'])
        ->orderBy('created_at', 'desc')
        ->get();

    $records->each(function ($record) {
        $record->formatted_created_at = Carbon::parse($record->created_at)->format('d-m-Y');
    });

    return view('records.refill', compact('records'));
}


}
