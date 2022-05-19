<?php 

include "../classes/controller/Mail.class.php";

if(isset($_POST['contactSubmit'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];
    
    $sendMailObj = new Mail($firstName, $lastName, $email, $comment);
    $sendMailObj->sendMail();
}