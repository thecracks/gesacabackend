<?php

namespace gesaca\Http\Controllers;

use Illuminate\Http\Request;
use gesaca\Model\Persona;
use gesaca\Http\Resources\Persona as PersonaResource;

class PersonaController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        return PersonaResource::collection(Persona::All());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $persona = Persona::create($request->All());
        if ($persona) {
            return (new PersonaResource($persona))->additional([
                        "code_status" => 1,
                        "message" => "Se guardo exitosamente"
            ]);
        }
        return $this->messageShow(0, "Problema al guardar.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $persona = Persona::where("IdPersona", $id)->first();
        if ($persona) {
            return (new PersonaResource($persona))->additional([
                        "code_status" => 1,
                        "message" => ""
            ]);
        }
        return $this->messageShow(0, "Verifique identificacion.");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $persona = Persona::where("IdPersona", $id)->first();
        if ($persona) {
            $persona->update($request->All());
            /*
            $persona->Nombre = $request->input("Nombre") == "" ? $persona->Nombre : $request->input("Nombre");
            $persona->Materno = $request->input("Materno") == "" ? $persona->Materno : $request->input("Materno");
            $persona->Paterno = $request->input("Paterno") == "" ? $persona->Paterno : $request->input("Paterno");
            $persona->Telefono = $request->input("Telefono") == "" ? $persona->Telefono : $request->input("Telefono");
            $persona->Tipo = $request->input("Tipo") == "" ? $persona->Tipo : $request->input("Tipo");
            $persona->Sub = $request->input("Sub") == "" ? $persona->Sub : $request->input("Sub");
            //$request->All()
            $persona->save();
            */
        } else
            return $this->messageShow(0, "Verifique identificacion.");
        return $this->messageShow(1, 'Se actualizó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //Usar directo delete() o 1° first y luego delete
        $persona = Persona::where("IdPersona", $id)->first();
        if ($persona)
            $persona->delete();
        else
            return $this->messageShow(0, "Verifique identificacion.");
        return $this->messageShow(1, "Se elimino correctamente.");
    }

    public function search($dni) {
        $persona = Persona::where("Dni", $dni)->first();
        if ($persona) {
            return (new PersonaResource($persona))->additional([
                        "code_status" => 1,
                        "message" => ""
            ]);
        }
        return $this->messageShow(0, "Verifique identificacion.");
    }

    protected function messageShow($code, $msg) {
        return response()->json([
                    "data" => "",
                    "code_status" => $code,
                    "message" => $msg
        ]);
    }

}
