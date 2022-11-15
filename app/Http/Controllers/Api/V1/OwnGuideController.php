<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Guide;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\OwnGuideRequest;
use App\Models\Destiny;
use App\Models\Origin;
use App\Models\StatusGuide;
use Illuminate\Http\Request;

class OwnGuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $destiny = new Destiny();
            $origin = new Origin();

            return response()->json([
                'origen' => $origin->all(),
                'destinos' => $destiny->all()
            ]);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OwnGuideRequest $request)
    {   
        try {
                $guide = new Guide();
                $guide->tipo_de_envio = $request->tipo_de_envio;
                $guide->paquetes_guardados = $request->paquetes_guardados;
                $guide->contenido = $request->contenido;
                $guide->unidad = $request->unidad;
                $guide->valor_agregado = $request->valor_agregado;
                $guide->cantidad_de_paquetes = $request->cantidad_de_paquetes;
                $guide->largo = $request->largo;
                $guide->ancho = $request->ancho;
                $guide->altura = $request->altura;
                $guide->peso = $request->peso;
                $guide->seguro = $request->seguro;
                $guide->pago_contraentrega = $request->pago_contraentrega;
                $guide->recogida_de_envio = $request->recogida_de_envio;
                $guide->urlguia = $request->urlguia;

                // campo que relaciona añ usuario verificado
                $guide->user_id = 3;
                //$guide->user_id = auth()->id();

                /* Primera opcion: Se asigna el request un campo status_id, se envia valor por el request, y el front podria poner un campo status_id en hidden si lo desea */
                //$guide->status_id = $request->status_id;

                /* Segunda opcion: seria solo llamando al modelo de status y asignando el valor id 1 que es igual a "creado", "REVISAR CUAL PODRIA USAR MEJOR"*/
                $status = new StatusGuide();
                $guide->status_id = $status->id = 1;

                $guide->save();

                $origin = new Origin();
                $origin->direcciones_guardadas = $request->origen['direcciones_guardadas'];
                $origin->nombre = $request->origen['nombre'];
                $origin->empresa = $request->origen['empresa'];
                $origin->email = $request->origen['email'];
                $origin->telefono = $request->origen['telefono'];
                $origin->pais = $request->origen['pais'];
                $origin->ciudad = $request->origen['ciudad'];
                $origin->localidad = $request->origen['localidad'];
                $origin->barrio = $request->origen['barrio'];
                $origin->direccion = $request->origen['direccion'];
                $origin->referencia = $request->origen['referencia'];
                
                $origin = new Origin();
                $origin->origin = $origin->origin = "Bogota";
                
                $origin->save();
                
                $destiny = new Destiny();
                $destiny->direcciones_guardadas = $request->destino['direcciones_guardadas'];
                $destiny->nombre = $request->destino['nombre'];
                $destiny->empresa = $request->destino['empresa'];
                $destiny->email = $request->destino['email'];
                $destiny->telefono = $request->destino['telefono'];
                $destiny->pais = $request->destino['pais'];
                $destiny->ciudad = $request->destino['ciudad'];
                $destiny->localidad = $request->destino['localidad'];
                $destiny->barrio = $request->destino['barrio'];
                $destiny->direccion = $request->destino['direccion'];
                $destiny->referencia = $request->destino['referencia'];

                $destiny = new Destiny();
                $destiny->destiny = $destiny->destiny = "Madrid/Cundinamarca";
        
                $destiny->save();
        
                if( $request ) {
                    return response()->json([
                        'data' => [
                            'res' => "guia generada satisfactoriamente",
                            'guia' => $guide->id,
                            'contrapago' => $guide->pago_contraentrega,
                            'contenido' => $guide->contenido,
                            'peso' => $guide->peso,
                            'largo' => $guide->largo,
                            'ancho' => $guide->ancho,
                            'alto' => $guide->altura,
                            'valor' => $guide->valor_agregado,
                            'urlguide' => $guide->urlguia,
                            'status_id' => [$guide->status->name, $guide->status->color],
                            'origen y destino' => [$origin->origin, $destiny->destiny]
                        ]
                    ], 201);
                }

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
