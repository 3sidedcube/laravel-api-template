<?php

namespace App\Exceptions\Renders;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use ThreeSidedCube\LaravelApiErrors\ApiErrorResponse;

class AuthorizationExceptionRender
{
    /**
     * Handle the AuthorizationException exception.
     *
     * @param  AuthorizationException  $exception
     * @return JsonResponse|void
     */
    public function __invoke(AuthorizationException $exception)
    {
        if (current_route_is_api_route()) {
            return ApiErrorResponse::create('forbidden', 'You are not authorized to perform this action.', 403);
        }
    }
}
