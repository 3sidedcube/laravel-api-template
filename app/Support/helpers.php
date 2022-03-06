<?php

if (! function_exists('current_route_is_api_route')) {
    /**
     * Determine if the current route is an API route.
     *
     * @return bool
     */
    function current_route_is_api_route(): bool
    {
        return str_starts_with(request()->path(), 'v1');
    }
}
