<?php
trait apiResponse {
    public function responseJson($status=1, $message='success', $data = null)
{
    $response = [
        'status' => $status,
        'message' => $message,
        'data' => $data,
        ];
        return response($response);
}
}
