<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';
require 'inc/connect.php';

$logs = shell_exec('cat /var/log/suricata/fast.log');


if(strlen($logs) > 0)
{

    $pattern = '/(\d{2}\/\d{2}\/\d{4}-\d{2}:\d{2}:\d{2})/';
    preg_match_all($pattern, $logs, $matches, PREG_SET_ORDER);



    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp-mail.outlook.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'Safe77home@outlook.com';                     //SMTP username
        $mail->Password   = 'Home123Test';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('Safe77home@outlook.com', 'System');
        $mail->addAddress('Hakimo-55@hotmail.com', 'System administrator');     //Add a recipient


        //Content
        $mail->isHTML();                                  //Set email format to HTML
        $mail->Subject = 'System alert';
        $mail->Body    .= "<center><h2>Attack name:LOCAL DOS SYN packet flood inbound, Potential DOS</h2><br>";
        $mail->Body    .= '<br>';
        $mail->Body    .= '<h2>Details of the attack</h2><br>';
        $mail->Body    .= "<pre>$logs</pre></center>";

        $mail->send();
        $date = date('Y/M/d');
        $result = $con->query("INSERT INTO notifications (alert,date) VALUES ('LOCAL DOS SYN packet flood inbound, Potential DOS','$date')");

        $removeLog = shell_exec('cat /dev/null > /var/log/suricata/fast.log');

    } catch (Exception $e) {
        echo $mail->ErrorInfo;
    }


}





