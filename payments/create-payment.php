<?php

$access_token_url = 'https://api-sandbox.circle.com/v1/payments';

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api-sandbox.circle.com/v1/payments",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Content-Type: application/json"
  ],
]);

$access_token = "QVBJX0tFWTpmMjNlMDBlZDMwYmNkYzExOGE0N2RmYzk3ZmQ5OWIzMjo3N2Q0NWU5NTUwODM3MmYzZDM1NTg0ZGRhZmI4N2JlNg==";

$cardheader = ['Content-Type:application/json','Authorization:Bearer '.$access_token];
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $access_token_url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $cardheader); //setting custom header

$curl_post_data = array(
    //Fill in the request parameters with valid values

'idempotencyKey'=>'fc988ed5-c129-4f70-a064-e5beb7eb8e32',
'keyId'=>'fc988ed5-c129-4f70-a064-e5beb7eb8e32',
'metadata'=> array(
    'email'=>'satoshi@circle.com',
    'phoneNumber'=>'+14155555555',
    'sessionId' =>'DE6FA86F60BB47B379307F851E238617',
    'ipAddress' => '244.28.239.130'
),
'amount' => array(
'amount'=>'3.14',
'currency'=>'USD'
),
'verification'=> array(
    'avs'=>'D',
    'cvv'=>'not_requested'
),
'source'=> array(
'id'=>'58c93589-911f-4bcb-a918-87c593296791',
'type'=>'card'
),
'description'=>'Payment'
  );

  $data_string = json_encode($curl_post_data);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
  
$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}