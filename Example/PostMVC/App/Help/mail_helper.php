<?php
// require_once "./PHPMailerAutoload.php";
/**
 * This function is used to send mail using PHPMailer Libraray
 * The Following function can be used to send mail to the user.
 * @param [type] $to
 * @param [type] $from
 * @param [type] $fromName
 * @param [type] $subject
 * @param [type] $body
 * @return void
 */
function mailHelper($to, $from, $fromName, $subject, $body)
    {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true; 
        
        $mail->SMTPSecure = 'ssl'; //Default Encryption can also use TLS 'tls' encryption 
        $mail->Host = DB_HOST;
        $mail->Port = SMTP_PORT_NO;  
        $mail->Username = DB_USER;
        $mail->Password = DB_PASSWORD;

        $mail->IsHTML(true);
        $mail->From="ENTER FROM EMAIL ADDRESS HERE";
        $mail->FromName=$fromName;
        $mail->Sender=$from;
        $mail->AddReplyTo($from, $fromName);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($to);


        if(!$mail->Send()){
            $respose = "Unable to send mail. Please Try again Later";
            return $respose; 
        }else {
            $respose = "Mail has been Sent";  
            return $respose;
        }
    }    
?>