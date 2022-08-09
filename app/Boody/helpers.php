
<?php

use Illuminate\Support\Arr;

function page($id)
{
    $page = \App\Models\page::find($id);
    if ($page) {
        return $page;
    } else {
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
    return response()->json($response);
}

function smsMisr($to, $message)
{
    $url = 'https://smsmisr.com/api/webapi/?';
    $push_payload = array(
        "username" => "*****",
        "password" => "*****",
        "language" => "2",
        "sender" => "ipda3",
        "mobile" => '2' . $to,
        "message" => $message,
    );

    $rest = curl_init();
    curl_setopt($rest, CURLOPT_URL, $url . http_build_query($push_payload));
    curl_setopt($rest, CURLOPT_POST, 1);
    curl_setopt($rest, CURLOPT_POSTFIELDS, $push_payload);
    curl_setopt($rest, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt(
        $rest,
        CURLOPT_HTTPHEADER,
        array(
            "Content-Type" => "application/x-www-form-urlencoded"
        )
    );
    curl_setopt($rest, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($rest);
    curl_close($rest);
    return $response;

    function notifyByFirbase($title, $body, $tokens,$data = [])
    {
        $registrationIDs = $tokens;

        $fcMsg = array(
            'body' => $body,
            'title' => $title,
            'sound' => "default",
            'color' => "#203E78"
        );


        $fcmFields = array(
            'registration_ids' => $registrationIDs,
            'priority' => 'high',
            'notification' => $fcMsg,
            'data' => $data
        );

        $headers = array(
            'Authorizstion: key='.env('FIREBASE_API_ACCESS_KEY'),
            'Content_Type: application/json'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmFields));
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;

    }
}
