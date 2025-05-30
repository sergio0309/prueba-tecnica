<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ExchangeRateService
{
    protected float $fallbackRate = 6.96;

    public function getCurrentExchangeRate(): float
    {
        try {
            $response = Http::timeout(5)->get('https://bo.dolarapi.com/v1/dolar');

            if ($response->successful()) {
                $data = $response->json();
                return $data['venta']; // o 'valor' dependiendo de la estructura exacta
            }

            Log::warning('Fallo al obtener el tipo de cambio: respuesta no exitosa', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);
        } catch (\Throwable $e) {
            Log::error('Error al obtener el tipo de cambio desde la API: ' . $e->getMessage());
        }

        // Si hay error, devuelve el valor por defecto
        return $this->fallbackRate;
    }
}
