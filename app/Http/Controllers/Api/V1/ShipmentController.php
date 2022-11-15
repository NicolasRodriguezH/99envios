<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Guide;
use App\Models\Origin;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $shipments = new Guide();

                return response()->json([
                    'data' => [
                        'mis_envios' => $shipments->all([
                            'tipo_de_envio',
                            'paquetes_guardados',   
                            'contenido',
                            'unidad',
                            'valor_agregado',
                            'cantidad_de_paquetes',
                            'largo', 
                            'ancho', 
                            'altura', 
                            'peso', 
                            'seguro',
                            'pago_contraentrega',
                            'recogida_de_envio',
                            'urlguia',
                            'status_id',
                            'created_at',
                        ]),
                    ]
                ], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Guide $shipment)
    {
        $origin = new Origin();
        try {
            return response()->json([
                'data' => [
                    'mis_envios' => [
                        'seguimiento' => $shipment->recogida_de_envio, //Campo no obligatorio
                        'estado' => $shipment->status->name,
                        'destino' => [
                            /* $shipment->destiny->nombre,
                            $shipment->destiny->ciudad,
                            $shipment->destiny->localidad,
                            $shipment->destiny->barrio,
                            $shipment->destiny->direccion, */
                        ],
                        'envio' => [
                            $shipment->peso, 
                            $shipment->largo, 
                            $shipment->altura, 
                            $shipment->ancho
                        ],
                        'aplica contrapago' => $shipment->pago_contraentrega,
                        'guia valor' => $shipment->valor_agregado,
                        'usuario' => [
                            $shipment->created_at,
                            //$shipment->origin->empresa,
                            //$origin->empresa
                        ],
                    ],
                ]
            ], 200);   
        } catch (\Throwable $th) {
            throw $th;
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guide $guide)
    {
        try {
            $guide->update($request->all());
            $guide->save();

            return $guide;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guide $guide)
    {
        try {
            $guide->delete();
            return "Guide deleted";
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
