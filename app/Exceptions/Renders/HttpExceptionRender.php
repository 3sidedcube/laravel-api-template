<?php

namespace App\Exceptions\Renders;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;
use ThreeSidedCube\LaravelApiErrors\ApiErrorResponse;

class HttpExceptionRender
{
    /**
     * Handle the HttpException exception.
     *
     * @param  HttpException  $exception
     * @return JsonResponse|void
     */
    public function __invoke(HttpException $exception)
    {
        if (current_route_is_api_route()) {
            return ApiErrorResponse::create('client_error', $exception->getMessage(), $exception->getStatusCode());
        }
    }
}
