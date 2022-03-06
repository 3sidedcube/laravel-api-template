<?php

namespace App\Exceptions\Renders;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use ThreeSidedCube\LaravelApiErrors\ApiErrorResponse;

class NotFoundHttpExceptionRender
{
    /**
     * Handle the NotFoundHttpException.
     *
     * @param  NotFoundHttpException  $exception
     *
     * @return JsonResponse|void
     */
    public function __invoke(NotFoundHttpException $exception)
    {
        if (current_route_is_api_route()) {
            return ApiErrorResponse::create('resource_missing', 'This resource does not exist.', 404);
        }
    }
}
