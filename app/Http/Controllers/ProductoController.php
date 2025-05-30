<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Services\ExchangeRateService;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('productos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ExchangeRateService $exchangeRateService)
    {
        $bs = $request->input('precio_bs');
        $tasa_cambio = $exchangeRateService->getCurrentExchangeRate();
        $usd = $bs / $tasa_cambio;

        Producto::create([
            'nombre' => $request->input('nombre'),
            'precio_bs' => $bs,
            'precio_usd' => round($usd, 2),
            'tasa_cambio' => $tasa_cambio,
            'user_id' => $request->input('usuario'),
        ]);

        return redirect()->back()->with('success', 'Producto creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
