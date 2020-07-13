<?php
date_default_timezone_set('Asia/Jakarta');
include "function.php";
echo color("red","?] Token: ");
$token = trim(fgets(STDIN));
setpin:
         echo "\n".color("yellow"," SET PIN BIAR AMAN !!!: y/n ");
         $pilih1 = trim(fgets(STDIN));
         if($pilih1 == "y" || $pilih1 == "Y"){
         echo color("red","▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬(\e[93mPIN MU = 112233\e[91m)▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬")."\n";
         $data2 = '{"pin":"112233"}';
         $getotpsetpin = request("/wallet/pin", $token, $data2, null, null, $uuid);
         echo "Otp pin: ";
         $otpsetpin = trim(fgets(STDIN));
         $verifotpsetpin = request("/wallet/pin", $token, $data2, null, $otpsetpin, $uuid);
         echo $verifotpsetpin;
         }else if($pilih1 == "n" || $pilih1 == "N"){
         die();
         }else{
         echo color("white","-] GAGAL!!!\n");
         goto setpin;
         echo color("white","-] Otp yang anda input salah\n");
         echo color("red","▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬(\e[93mOTP ULANG\e[91m)▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n\n");
         echo color("yellow","!] Silahkan input kembali\n");
 }
echo change()."\n"; ?>