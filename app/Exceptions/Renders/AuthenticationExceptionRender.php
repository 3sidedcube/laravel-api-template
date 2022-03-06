<?php

namespace App\Exceptions\Renders;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use ThreeSidedCube\LaravelApiErrors\ApiErrorResponse;

class AuthenticationExceptionRender
{
    /**
     * Handle the AuthenticationException exception.
     *
     * @param  AuthenticationException  $exception
     * @return JsonResponse|void
     */
    public function __invoke(AuthenticationException $exception)
    {
        if (current_route_is_api_route()) {
            return ApiErrorResponse::create('unauthenticated', 'User not authenticated.', 401);
        }
    }
}
