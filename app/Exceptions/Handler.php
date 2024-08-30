<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
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
        /*
        $this->renderable(function (Throwable $e) {
            return response()->json("Model not found", 404);
        });*/
        $this->renderable(function (NotFoundHttpException $e, $request) {
            if ($request->is('api/*')) {
              if ($e->getPrevious() instanceof ModelNotFoundException) {
                  return response()->json([
                      'status' => 404,
                      'message' => 'Product Model not found'
                  ], 200);
              }
              return response()->json([
                  'status' => 404,
                  'message' => 'Incorrect route'
              ], 404);
            }
          });
    }
    
}
