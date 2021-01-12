<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\{Response, Request};
use Throwable;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception){

        /* dd($exception); */
        if ($request->wantsJson()) {

            if($exception instanceof ModelNotFoundException){

                return response()->json([
                    "message" => "dato no encontrado",
                    "respont" => false,
                    "status" =>Response::HTTP_NOT_FOUND
                ],Response::HTTP_NOT_FOUND);
            }

            return response()->json([
                "error" => "Algo malo paso",
                "respont" => false,
            ],Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        return parent::render($request,$exception);
    }
}
