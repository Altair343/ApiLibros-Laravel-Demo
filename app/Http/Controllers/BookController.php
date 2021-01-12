<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Book::all();
        return response()->json([
            "message" => "Los datos se han encontrado",
            "respont" => true,
            "data" => $book,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = Book::create($request->all());
        return response()->json([
            "message" => "El dato ha sido creado",
            "respont" => true,
            "data" => $book,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return response()->json([
            "message" => "El dato ha sido encontrado",
            "respont" => true,
            "data" => $book,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $book->update($request->all());
        return response()->json([
            "message" => "El dato ha sido  actualizado",
            "respont" => true,
            "data" => $book,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json([
            "message" => "El dato ha sido eliminado",
            "respont" => true,
            "data" => $book,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }
}
