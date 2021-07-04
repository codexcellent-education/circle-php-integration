<?php
$access_token = "QVBJX0tFWTpmMjNlMDBlZDMwYmNkYzExOGE0N2RmYzk3ZmQ5OWIzMjo3N2Q0NWU5NTUwODM3MmYzZDM1NTg0ZGRhZmI4N2JlNg==";

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api-sandbox.circle.com/v1/payments/id/cancel",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Content-Type: application/json",
    'Authorization:Bearer '.$access_token
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}