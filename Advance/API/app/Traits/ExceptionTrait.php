<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Http\Response;


trait ExceptionTrait
{

    public function apiException($request, $exception)
    {
        if ($this->isModel($exception)) {
            return response([
                'errors' => "Model not found."
            ], Response::HTTP_NOT_FOUND);
        }
        if ($this->isNotFound($exception)) {
            return response([
                'erros' => "Incorect route."
            ], Response::HTTP_NOT_FOUND);
        }
        return parent::render($request, $exception);
    }

    protected function isModel($exception)
    {
        return $exception instanceof ModelNotFoundException;
    }
    protected function isNotFound($exception)
    {
        return $exception instanceof NotFoundHttpException;
    }
}
