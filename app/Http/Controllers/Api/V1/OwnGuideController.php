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

                /* Primera opcion: Se asigna el request un campo status_id, se envia valor por el request, y el front podria poner un campo status_id en hidden si lo desea */
                //$guide->status_id = $request->status_id;

                /* Segunda opcion: seria solo llamando al modelo de status y asignando el valor id 1 que es igual a "creado", "REVISAR CUAL PODRIA USAR MEJOR"*/
                //$status = new StatusGuide();
                //$guide->status_id = $status->id = 1;


                /* $guide->origin_id = $request->origin_id;
                $guide->destiny_id = $request->destiny_id; */

                $guide->save();

               /*  $receiver = new Origin();
                $receiver->tipo_documento = $request->Destinatario['tipoDocumento'];
                $receiver->numero_documento = $request->Destinatario['numeroDocumento'];
                $receiver->nombre = $request->Destinatario['nombre'];
                $receiver->primer_apellido = $request->Destinatario['primerApellido'];
                $receiver->segundo_apellido = $request->Destinatario['segundoApellido'];
                $receiver->telefono = $request->Destinatario['telefono'];
                $receiver->direccion = $request->Destinatario['direccion'];
                $receiver->id_destinatario = $request->Destinatario['idDestinatario'];
                $receiver->id_remitente = $request->Destinatario['idRemitente'];
                $receiver->id_localidad = $request->Destinatario['idLocalidad'];
                $receiver->codigo_convenio = $request->Destinatario['CodigoConvenio'];
                $receiver->convenio_destinatario = $request->Destinatario['ConvenioDestinatario'];
                $receiver->correo = $request->Destinatario['correo'];
                $receiver->guide_id = $guide->id;
                
                $receiver->save();
                
                $rapiradicado = new Destiny();
                $rapiradicado->numero_de_folios = $request->RapiRadicado['numerodeFolios'];
                $rapiradicado->codigo_rapi_radicado = $request->RapiRadicado['CodigoRapiRadicado'];
                $rapiradicado->guide_id = $guide->id;
        
                $rapiradicado->save(); */
        
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
                            //'observaciones' => $guide->observaciones,
                            //'nombre' => $receiver->nombre,
                            //'primerApellido' => $receiver->primer_apellido,
                            //'telefono' => $receiver->telefono,                        
                            //'direccion' => $receiver->direccion,
                            //'correo' => $receiver->correo,
                            'urlguide' => $guide->urlguia,
                            //'status_id' => [$guide->status->name, $guide->status->color],
                            //'origen y destino' => [$guide->origin->origin, $guide->destiny->destiny]
                        ]
                    ], 201);
                }

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
