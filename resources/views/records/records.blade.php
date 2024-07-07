@extends('layouts.web')
@section('header')
    {{ $header = "Registros" }}

@endsection


@section('alerts')
@include('components.error-alert')
@include('components.message-alert')
@endsection

@section('content')
    <div class="flex flex-col gap-5 my-5 hover:scale-100 scale-95 transition">
        <a href="{{ route('records.refill') }}" class="border p-5">
            <h3>Registros de compra de stock</h3>
        </a>
        <a class="border hidden text-slate-600 p-5">
            <h3>Registros de ventas (Proximamente)</h3>
        </a>
    </div>
    

@endsection