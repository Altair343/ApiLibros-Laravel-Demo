<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TypeController extends Controller
{
    public function index(){
        $type = Type::all();
        return response()->json([
            "message" => "Los datos se han encontraron",
            "respont" => true,
            "data" => $type,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK, [
            'Content-Type'=> 'application/json'
        ]);
    }

    public function store(Request $request){
        $type = Type::create($request->all());
        return response()->json([
            "message" => "El dato ha sido creado",
            "respont" => true,
            "data" => $type,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    public function show(Type $type){
        return response()->json([
            "message" => "El dato ha sido encontrado",
            "respont" => true,
            "data" => $type,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }


    public function update(Request $request, Type $type){
        $type->update($request->all());
        return response()->json([
            "message" => "El dato ha sido  actualizado",
            "respont" => true,
            "data" => $type,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    public function destroy(Type $type){
        $type->delete();
        return response()->json([
            "message" => "El dato ha sido eliminado",
            "respont" => true,
            "data" => $type,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }
}
