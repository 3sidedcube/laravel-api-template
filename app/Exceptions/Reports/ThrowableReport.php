<?php

namespace App\Exceptions\Reports;

use App\Exceptions\Handler;
use Illuminate\Http\JsonResponse;
use ThreeSidedCube\LaravelApiErrors\ApiErrorResponse;
use Throwable;

class ThrowableReport
{
    /**
     * Create a new ThrowableReport instance.
     *
     * @param  Handler  $handler
     * @return void
     */
    public function __construct(protected Handler $handler)
    {
    }

    /**
     * Handle the given exception.
     *
     * @param  Throwable  $e
     * @return JsonResponse|void
     *
     * @throws Throwable
     */
    public function __invoke(Throwable $e)
    {
        if ($this->handler->shouldReport($e) && app()->bound('sentry')) {
            app('sentry')->captureException($e);
        }

        if (current_route_is_api_route()) {
            if (config('app.debug')) {
                throw $e;
            }

            return ApiErrorResponse::create('internal_server_error', 'Internal Server Error', 500);
        }
    }
}
