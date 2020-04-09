date_default_timezone_set('Asia/Jakarta');
include "function.php";
os.system('clear');
sleep (2);
echo color("blue"," Silahkan Tunggu Sebentar \n");
sleep (2);
echo color("red"," Subscribe Arkan Channel Dulu Jangan Lupa ! \n");
os.system('xdg-open https://m.youtube.com/channel/UCr8L7Fim8vvG71kbvqytFZQ');
sleep (5);
os.system('clear');
sleep (2);
echo color("blue"," █████████████████████████████████████████████ \n");
echo color("yellow","[•] Time   : ".date('[d-m-Y] [H:i:s]')."     [•] \n");
echo color("red","●▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬๑๑▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬● \n");
echo color("green","[√] Version 1.3                     [√] \n");
echo color("red","●▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬๑๑▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬● \n");
echo color("green","[•] Nama Tools : Tembak Voucher Go Food  [•] \n");
echo color("red","[•]      SUBSCRIBE ARKAN CHANNEL         [•]  \n");
echo color("blue","[•] Gunakan Tools Ini Dengan Bijak Oke ! [•] \n");
echo color("yellow","[•] Penulisan Nomor Yang Benar 62xxxxxxxx[•] \n");
echo color("blue"," █████████████████████████████████████████████\n");
function change(){
        $nama = nama();
        $email = str_replace(" ", "", $nama) . mt_rand(100, 999);
        ulang:
        echo color("yellow","(√) Nomor : ");
        $no = trim(fgets(STDIN));
        $data = '{"email":"'.$email.'@gmail.com","name":"'.$nama.'","phone":"+'.$no.'","signed_up_country":"ID"}';
        $register = request("/v5/customers", null, $data);
        if(strpos($register, '"otp_token"')){
        $otptoken = getStr('"otp_token":"','"',$register);
        echo color("green","+] Kode verifikasi sudah di kirim")."\n";
        otp:
        echo color("red","?] Otp: ");
        $otp = trim(fgets(STDIN));
        $data1 = '{"client_name":"gojek:cons:android","data":{"otp":"' . $otp . '","otp_token":"' . $otptoken . '"},"client_secret":"83415d06-ec4e-11e6-a41b-6c40088ab51e"}';
        $verif = request("/v5/customers/phone/verify", null, $data1);
        if(strpos($verif, '"access_token"')){
        echo color("yellow","+] Berhasil mendaftar");
        $token = getStr('"access_token":"','"',$verif);
        $uuid = getStr('"resource_owner_id":',',',$verif);
        echo "\n".color("yellow","+] Your access token : ".$token."\n\n");
        save("token.txt",$token);
        echo "\n".color("nevy","?] Mau Redeem Voucher?: y/n ");
        $pilihan = trim(fgets(STDIN));
        if($pilihan == "y" || $pilihan == "Y"){
        echo color("red","===========(REDEEM VOUCHER)===========");
        echo "\n".color("blue","!] Claim voc GO FOOD 20K");
        echo "\n".color("yellow","!] Please wait");
        for($a=1;$a<=3;$a++){
        echo color("yellow",".");
        sleep(3);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGOFOOD010420B"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai')){
        echo "\n".color("green","+] Message: ".$message);
        goto gocar;
        }else{
        echo "\n".color("red","-] Message: ".$message);
        gocar:
        echo "\n".color("blue","!] Claim voc GOFOOD 15+10+5");
        echo "\n".color("yellow","!] Please wait");
        for($a=1;$a<=3;$a++){
        echo color("yellow",".");
        sleep(20);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGOFOOD010420A"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai')){
        echo "\n".color("green","+] Message: ".$message);
        goto gofood;
        }else{
        echo "\n".color("red","-] Message: ".$message);
        reff:
        $data = '{"referral_code":"G-75SR565"}';    
        $claim = request("/customer_referrals/v1/campaign/enrolment", $token, $data);
        $message = fetch_value($claim,'"message":"','"');
        if(strpos($claim, 'Promo kamu sudah bisa dipakai')){
        echo "\n".color("green","+] Message: ".$message);
        goto gofood;
        }else{
        echo "\n".color("red","-] Message: ".$message
