<?php 

include "../classes/model/Dbh.class.php";
include "../classes/model/EmailModel.class.php";
include "../classes/controller/Mail.class.php";

if (isset($_POST['subscribeBtn'])) {
    $email = $_POST['subEmail'];

    $mail = new Mail(null, null, null, null);

    $mail->setEmail($email);
    $mail->saveEmail();  
}