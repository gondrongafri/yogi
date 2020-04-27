<?php
///////////////////////////////////////////
///////CREATED BY Gondrong////////
//////www.facebook.com/gondrong///////
/////https://github.com/gondrongafri//////
///////////////////////////////////////

include 'tri_req.php';

$tri = new tri();
$imei = "868880043302499";
echo "Masukkan No Telepon cuk, Gondrong menunggu : ";
$msisdn = trim(fgets(STDIN));
$otp = $tri->request_otp($msisdn,$imei);
echo $otp[1] . "\r\n";
echo "Masukkan OTP : ";
$otp = trim(fgets(STDIN));
$login = $tri->login($msisdn,$otp);
$login = json_decode($login,true);
$bearer = $login['access_token'];
$id = $tri->trans($bearer);
$id = json_decode($id,true);
$total = count($id['data']);
for($id1 = 1500; $id1 < 1600;$id1++)
{
  $h ='';
  for($fuck = 0; $fuck < $total;$fuck++){
  $crack = $id['data'][$fuck]['rewardTransactionId'];
  $h .= $tri->claim($bearer,$crack,$id1);
  }
  echo $h."|\r\n";
  sleep(2);
}
?>
