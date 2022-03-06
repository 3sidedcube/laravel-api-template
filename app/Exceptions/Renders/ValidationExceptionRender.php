<?php

namespace App\Exceptions\Renders;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class ValidationExceptionRender
{
    /**
     * Handle the ValidationException exception.
     *
     * @param  ValidationException  $exception
     * @return JsonResponse|void
     */
    public function __invoke(ValidationException $exception)
    {
        if (current_route_is_api_route()) {
            $errors = collect($exception->errors())
                ->flatMap(function ($errors, $parameter) use ($exception) {
                    return collect($errors)
                        ->map(function ($message) use ($exception, $parameter) {
                            return [
                                'parameter' => $parameter,
                                'code' => strtoupper(array_keys($exception->validator->failed()[$parameter])[0]),
                                'message' => $message,
                            ];
                        });
                })
                ->toArray();

            return new JsonResponse([
                'error' => [
                    'code' => 'validation_error',
                    'message' => 'Validation failed.',
                    'validation_errors' => $errors,
                ],
            ], 422);
        }
    }
}
