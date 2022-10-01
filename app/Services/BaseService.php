<?php


namespace App\Services;


class BaseService
{

    /**
     * success response
     * @param null $message
     * @param array $data
     * @param int $httpCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function successResponse($data = [], $message = null,$httpCode = 200)
    {

        if ($message && $data)
            $response = [
                'data' => [
                    'status' => 'success',
                    'message' => $message,
                    'collage' => \request()->db_name,
                    'result' => $data,
                ]
            ];
        elseif ($message)
            $response = [
                'data' => [
                    'status' => 'success',
                    'message' => $message,
                    'collage' => \request()->db_name,

                    'result' => $data
                ]
            ];
        else
            $response = [
                'data' => [
                    'status' => 'success',
                    'message' => $message,
                    'collage' => \request()->db_name,
                    'result' => $data,
                ]
            ];

        return response()->json($response, $httpCode);
    }


    /**
     * error response
     * @param $error
     * @param array $data
     * @param int $httpCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorResponse( $data = [], $error = null, $httpCode = 200)
    {
        if ($error && $data)
            $response = [
                'data' => [
                    'status' => 'error',
                    'message' => $error,
                    'result' => $data,
                ]
            ];
        elseif ($error)
            $response = [
                'data' => [
                    'status' => 'error',
                    'message' => $error
                ]
            ];
        else
            $response = [
                'data' => [
                    'status' => 'error',
                    'result' => $data,
                ]
            ];
        return response()->json($response, $httpCode);
    }

}
