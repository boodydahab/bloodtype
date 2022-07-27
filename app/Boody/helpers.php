
<?php
function page ($id)
{
    $page = \App\Models\page::find($id);
    if ($page){
        return $page;
    }else{
        return new \App\Models\Settings;
    }
}

function responseJson($status, $message, $data = null)
{
    $response = [
        'status' => $status,
        'message' => $message,
        'data' => $data,
        ];
        return response ()->json($response);
}
