<?php

class Mail extends EmailModel{
    //Creating properties
    private $firstName;
    private $lastName;
    private $email;
    private $comment;

    //Constructor to initialize class properties
    public function __construct($firstName, $lastName, $email, $comment) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->comment = $comment;
    }

    //Setter function to set Email properties
    public function setEmail($email) {
        $this->email = $email;
    }

    //error handling function to check for empty fields
    private function isEmpty() {
        if(empty($this->firstName) || empty($this->lastName) || empty($this->email) || empty($this->comment)) {
            return true;
        }

        return false;
    }

    //error handling function to check for valid email
    private function notValidEmail() {
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        return false;
    }

    //error handling function to check if email empty
    private function isEmailEmpty() {
        if(empty($this->email)) {
            return true;
        }

        return false;
    }

    //Function that is responsible to saving email form newsletter 
    public function saveEmail() {
        if ($this->isEmailEmpty()) {
            header('Location: ../index.php?subscribe=empty');
            exit();
        } 

        if ($this->notValidEmail()) {
            header('Location: ../index.php?subscribe=invalidEmail');
            exit();
        }

        //Checking if the email is already saved
        $isSaved = $this->isEmailSaved($this->email);

        if(!$isSaved) {
            $isSuccess = $this->saveSubscriber($this->email);

            if(!$isSuccess) {
                header("Location: ../index.php?subscribe=false");
                exit();
            } else {
                header("Location: ../index.php?subscribe=true");
                exit();
            }
        }

        header("Location: ../index.php?subscribe=alreadySaved");
        exit();
    }
    
    
    //Function incharge of sending email from the contact page
    public function sendMail() {

        if($this->isEmpty()) {
            header("Location: ../pages/contactUs.php?error=emptyField&firstName=".$this->firstName."&lastName=".$this->lastName."&email=".$this->email."&comment=".$this->comment."");
            exit();
        }

        if($this->notValidEmail()) {
            header("Location: ../pages/contactUs.php?error=invalidEmail&firstName=".$this->firstName."&lastName=".$this->lastName."&email=".$this->email."&comment=".$this->comment."");
            exit();
        }

        $to = "";
        $subject = "New Comment from ".$this->firstName." ".$this->lastName;
        $message = $this->comment;

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $headers .= 'From: '.$this->email."\r\n";
        $headers .= $this->firstName." ".$this->lastName. "\r\n";

        if(!mail($to,$subject,$message,$headers)) {
            header("Location: ../pages/contactUs.php?error=serverError");
            exit();
        }

        header("Location: ../pages/contactUs.php?error=none");
        exit();
    }
}