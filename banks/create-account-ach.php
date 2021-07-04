<?php

$access_token_url = 'https://api-sandbox.circle.com/v1/banks/ach';
$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api-sandbox.circle.com/v1/banks/ach",
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

$header = ['Content-Type:application/json','Authorization:Bearer '.$access_token];
$curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $access_token_url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, $header); //setting custom header

  $curl_post_data = array(
    //Fill in the request parameters with valid values
    'keyId'=>'fc988ed5-c129-4f70-a064-e5beb7eb8e32',
    'idempotencyKey'=>'ba943ff1-ca16-49b2-ba55-1057e70ca5c7',
    'plaidProcessorToken'=>'ba943ff1-ca16-49b2-ba55-1057e70ca5c7',
    'status'=>'pending',
    'accountNumber'=>'12340010',
    'routingNumber'=>'121000248',
    'billingDetails'=> array(
        'name'=>'Satoshi Nakamoto',
        'city'=>'Boston',
        'country'=>'US',
        'line1'=>'100 Money Street',
        'line2'=>'Suite 1',
        'district'=>'MA',
        'postalCode'=>'01234'
    ),
    'bankAddress'=> array(
        'bankName'=>'SAN FRANCISCO',
        'city'=>'SAN FRANCISCO',
        'country'=>'US',
        'line1'=>'100 Money Street',
        'line2'=>'Suite 1',
        'district'=>'CA'
    )
   
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