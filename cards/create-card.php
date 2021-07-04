<?php
//require_once 'Crypt/GPG.php';

$access_token_url = 'https://api-sandbox.circle.com/v1/cards';
$card_number = '411111111111';
$cvv   = '123';

//$gpg = Crypt_GPG::factory('php', array('debug' => true));


//$encrypted1   = $gpg->encrypt('support@namechangeexpress.com',$card_number);
//$encrypted2   = $gpg->encrypt('support@namechangeexpress.com',$cvv);

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api-sandbox.circle.com/v1/cards",
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
    'keyId'=>'1e38dcef-a947-493a-a674-f623e4418ace',
    'idempotencyKey'=>'ba943ff1-ca16-49b2-ba55-1057e70ca5c7',
    'status'=>'pending',
    'encryptedData'=> array(
        'number'=>'411111111111',
        'cvv'=>'123'
        ),
    'billingDetails'=> array(
        'name'=>'Satoshi Nakamoto',
        'city'=>'Boston',
        'country'=>'US',
        'line1'=>'100 Money Street',
        'line2'=>'Suite 1',
        'district'=>'MA',
        'postalCode'=>'01234'
    ),
    'expMonth'=>1,
    'expYear'=>2020,
    'metadata'=> array(
    'email'=>'satoshi@circle.com',
    'phoneNumber'=>'+14155555555',
    'sessionId'=>'DE6FA86F60BB47B379307F851E238617',
    'ipAddress'=>'244.28.239.130'
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
