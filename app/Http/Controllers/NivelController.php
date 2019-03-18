<?php

namespace gesaca\Http\Controllers;

use Illuminate\Http\Request;
use gesaca\Model\Nivel;
use gesaca\Http\Resources\Nivel as NivelResource;

class NivelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return NivelResource::collection(Nivel::All());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $nivel = Nivel::create($request->All());
        if ($nivel) {
            return (new NivelResource($nivel))->additional([
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
        $nivel = Nivel::where("IdNivel", $id)->first();
        
        if ($nivel) {
            return (new NivelResource($nivel))->additional([
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
        $nivel = Nivel::where("IdNivel", $id)->first();
        if ($nivel) {
            $nivel->Descripcion = $request->input("Descripcion") == "" ? $nivel->Descripcion : $request->input("Descripcion");
            $nivel->estado = $request->input("estado") == "" ? $nivel->estado : $request->input("estado");
            
            //$request->All()
            $nivel->save();
        }
        else 
            return $this->messageShow(0, "Verifique identificacion.");
        return $this->messageShow(1,"Se actualizo correctamente.");
        
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
        $nivel = Nivel::where("IdNivel", $id)->first();        
        if ($nivel)
            $nivel->delete(); 
        else
            return $this->messageShow(0, "Verifique identificacion.");
        return $this->messageShow(1,"Se elimino correctamente.");
    }

    protected function messageShow($code, $msg) {
        return response()->json([
            "data" => "",
            "code_status" => $code,
            "message" => $msg
        ]);
    }
}
