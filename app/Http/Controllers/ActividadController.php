<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\DetalleActividad;
use App\Models\Actividad;
use App\Models\Dependencia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
class ActividadController extends Controller
{
    
    public function index(){
      
        $nombre_dependencia = 'Agencia Estatal de Energía';
        $prueba_eloq_dep = Dependencia::with('activities')->get();
        return view('frontend.home', compact('prueba_eloq_dep'));
    }
    public function edit($id,$dependencia)
	{   
        $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ';
        $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyyby';

        $client = new Client();
        $url = "http://sigo-queretaro.centralus.cloudapp.azure.com:8080/release1/C_pat/getCatalogoPOA";
        $response = $client->request('GET', $url);
        $responseBody = json_decode($response->getBody()->getContents());
        $array_dependencias = [];
        $realArray = (array)$responseBody;
        $dependencia = utf8_decode($dependencia);
        $dependencia = strtr($dependencia, utf8_decode($originales), $modificadas);
        $nombre_dependencia = strtoupper($dependencia);
        echo($nombre_dependencia);
        
        foreach($realArray['datos'] as $datos)
        {

            $dato = (array)$datos;
            
            if(empty($array_dependencias[$dato['dependenciaEjecutora']])){
                $array_dependencias[$dato['dependenciaEjecutora']] = [];
               
                array_push($array_dependencias[$dato['dependenciaEjecutora']], $dato);

            }else{
                array_push($array_dependencias[$dato['dependenciaEjecutora']], $dato);

            }
            
        }
        $status;
        $presupuesto = 0.0;
        if(!empty($array_dependencias[$nombre_dependencia])){
            foreach($array_dependencias[$nombre_dependencia] as $dependencia){
                $presupuesto = $presupuesto + (float)$dependencia['aprobado'];
            }
            $filtrodependencia = json_decode(\json_encode($array_dependencias[$nombre_dependencia]),true);
            echo "el presupuesto es:";
            echo $presupuesto;
            $status = true;

        }else{
            $status = false;
            echo ' Aún no se asigna el presupuesto';

        }
       
        $dep = DetalleActividad::where('iIdDetalleActividad',$id)->get();
        
        return view('frontend.edit',compact('id','nombre_dependencia','dep','status'));
		
	}
    public function update(Request $request,$id)
    {
        $storie = DetalleActividad::where('iIdDetalleActividad',$id)
        ->update(['nPresupuestoAutorizado'=>$request['nPresupuestoAutorizado']] );

        return redirect('/')->with('success', 'Listo uwu');
    }
}
