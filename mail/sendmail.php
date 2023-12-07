<?php
    require("PHPMailer/src/PHPMailer.php");
    require("PHPMailer/src/SMTP.php");
    require("PHPMailer/src/Exception.php");
 
     
    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\Exception;

    // $mail = new PHPMailer(true);  
    
    // try {
    class Mailer{
    public function dathangmail($tieude,$noidung,$maildathang){
    
    
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); 
 
    $mail->CharSet="UTF-8";
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPDebug = 1; 
    $mail->Port = 465 ; //465 or 587
 
     $mail->SMTPSecure = 'ssl';  
    $mail->SMTPAuth = true; 
    $mail->IsHTML(true);
 
    //Authentication
    $mail->Username = "ktzjin@gmail.com";
    $mail->Password = "enmtnnkrmaqqxdoy";
 
    //Set Params
    $mail->SetFrom("ktzjin@gmail.com", "Mailer");

    $mail->AddAddress($maildathang, "Kien truc");
    // $mail->AddAddress("toanvananh@gmail.com", "Toan van");

    $mail->Subject = $tieude;
    $mail->Body = $noidung;
 
 
     if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
     } else {
        echo "Message has been sent";
     }
    // }
        }
}
?>