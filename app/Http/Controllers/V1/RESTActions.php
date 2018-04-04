<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Response;

/**
 * RESTActions - handle the REST operations.
 *
 * @package App\Http\Controllers\V1
 */
trait RESTActions
{
    /**
     * Create json response with the provided.
     *
     * @param status_code status - HTTP_STATUS code.
     * @param array data - An array of data
     *
     * @return Response object - A JSON object.
     */
    protected function respond($status, $data = [])
    {
        return response()->json($data, $status);
    }
}
