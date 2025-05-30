<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\User;
use App\Services\ExchangeRateService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::get();
        $productos = Producto::get();
        return view('productos.index', compact('usuarios', 'productos'));
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
        try {
            DB::beginTransaction();

            $precio_bs = $request->input('precio_bs');
            $tasa_cambio = $exchangeRateService->getCurrentExchangeRate();
            $usd = $precio_bs / $tasa_cambio;
            // dd([
            //     'bs' => $bs,
            //     'tasa_cambio' => $tasa_cambio,
            //     'usd' => $usd,
            //     'exchangeRateService' => $exchangeRateService,
            // ]);
            Producto::create([
                'nombre' => $request->input('nombre'),
                'precio_bs' => $precio_bs,
                'precio_usd' => round($usd, 2),
                'tasa_cambio' => $tasa_cambio,
                'user_id' => $request->input('user_id'),
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Producto creado correctamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al crear producto: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Ocurrió un error al crear el producto. Intenta nuevamente.');
        }
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
    public function destroy($id)
    {
        try {
            $producto = Producto::findOrFail($id);
            $producto->delete();
            return redirect()->back()->with('success', 'Producto eliminado correctamente.');
        } catch (\Exception $e) {
            Log::error('Error al eliminar producto: ' . $e->getMessage());
            return redirect()->back()->with('error', 'No se pudo eliminar el producto.');
        }
    }
}
