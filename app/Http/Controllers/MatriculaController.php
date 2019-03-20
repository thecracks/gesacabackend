<?php

namespace gesaca\Http\Controllers;

use gesaca\Model\Matricula;
use Illuminate\Http\Request;
use gesaca\Http\Resources\Matricula as MatriculaResource;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return MatriculaResource::collection(Matricula::All());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $matricula = Matricula::create($request->All());
        if ($matricula) {
            return (new MatriculaResource($matricula))->additional([
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
        $matricula = Matricula::where("IdMatricula", $id)->first();
        if ($matricula) {
            return (new MatriculaResource($matricula))->additional([
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
        $matricula = Matricula::where("IdMatricula", $id)->first();
        if ($matricula) {
            $matricula->IdPersona = $request->input("IdPersona") == "" ? $matricula->IdPersona : $request->input("IdPersona");
            $matricula->IdNivel = $request->input("IdNivel") == "" ? $matricula->IdNivel : $request->input("IdNivel");
            $matricula->IdAnio = $request->input("IdAnio") == "" ? $matricula->IdAnio : $request->input("IdAnio");
            $matricula->Grado = $request->input("Grado") == "" ? $matricula->Grado : $request->input("Grado");   
            $matricula->Seccion = $request->input("Seccion") == "" ? $matricula->Seccion : $request->input("Seccion");   
            $matricula->Nota = $request->input("Nota") == "" ? $matricula->Nota : $request->input("Nota");       
            //$request->All()
            $matricula->save();
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
        $matricula = Matricula::where("IdMatricula", $id)->first();        
        if ($matricula)
            $matricula->delete(); 
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
