<?php

namespace gesaca\Http\Controllers;

use gesaca\Model\Anio;
use Illuminate\Http\Request;
use gesaca\Http\Resources\Anio as AnioResource;

class AnioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AnioResource::collection(Anio::All());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $anio = Anio::create($request->All());
        if ($anio) {
            return (new AnioResource($anio))->additional([
                "code_status" => 1,
                "message" => "Se guardo exitosamente"
            ]);
        }
        return $this->messageShow(0,"Problema al guardar."); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anio = Anio::where("IdAnio", $id)->first();
        if ($anio) {
            return (new AnioResource($anio))->additional([
                "code_status" => 1,
                "message" => ""
            ]);
        }
        return $this->messageShow(0,"Verifique identificacion.");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */    
    public function update(Request $request, $id)
    {
        $anio = Anio::where("IdAnio", $id)->first();
        if ($anio) {
            /*
            $anio->Fecha = $request->input("Fecha") == "" ? $anio->Fecha : $request->input("Fecha");
            $anio->FechaInicio = $request->input("FechaInicio") == "" ? $anio->FechaInicio : $request->input("FechaInicio");
            $anio->FechaFin = $request->input("FechaFin") == "" ? $anio->FechaFin : $request->input("FechaFin");
            $anio->Descripcion = $request->input("Descripcion") == "" ? $anio->Descripcion : $request->input("Descripcion");           
            $anio->save();
            */
            $anio->update($request->All());
        }
        else
            return $this->messageShow(0, "Verifique identificacion.");
        return $this->messageShow(1, 'Se actualizó correctamente');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Usar directo delete() o 1° first y luego delete
        $anio = Anio::where("IdAnio", $id)->first();        
        if ($anio)
            $anio->delete(); 
        else
            return $this->messageShow(0, "Verifique identificacion.");
        return $this->messageShow(1, "Se elimino correctamente.");
    }

    protected function messageShow($code, $msg) {
        return response()->json([
            "data" => "",
            "code_status" => $code,
            "message" => $msg
        ]);
    }
}
