<?php

namespace App\Exceptions;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

trait ExceptionTrait
{
    public function apiException($request, $e){
        if ($this->isHttp($request)) {
            if ($this->isModel($e)) {
                return $this->ModelResponse($e);
            }
            return $this->HttpResponse($e);
          }
    }

    protected function isModel($e){
        return $e->getPrevious() instanceof ModelNotFoundException;
    }

    protected function isHttp($request){
        return $request->is('api/*');
    }

    protected function ModelResponse($e){
        return response()->json([
            'errors' => 'Product Model not found'
        ], Response::HTTP_NOT_FOUND);
    }

    protected function HttpResponse($e){
        return response()->json([
            'errors' => 'Incorrect route'
        ], Response::HTTP_NOT_FOUND);
    }
}