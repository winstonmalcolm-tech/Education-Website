<?php 

class Authentication extends AuthenticationModel{
    private $firstName;
    private $lastName;
    private $email;
    private $userName;
    private $prePassword;
    private $conPassword;
    private $lec_ID;


    // properties for subscription form
    private $cardNumber;
    private $CVV;
    private $experation;
    private $courseName;




    //Constructor to initialize the class variables
    public function __construct($firstName, $lastName, $email, $userName, $prePassword, $conPassword)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->userName = $userName;
        $this->prePassword = $prePassword;
        $this->conPassword = $conPassword;
        
    }


    // setters for subscritpion properties;

    public function setCVV($CVV) {
        $this->CVV = $CVV;
    }
    public function setCardNumber($cardNumber) {
        $this->cardNumber = $cardNumber;
    }
    public function setEmail($email) {
        $this->email = $email;
    }

    public function setExperationDate($experation) {
        $this->experation = $experation;
    }

    public function setcourseName($courseName) {
        $this->courseName = $courseName;
    }

    
//Validating the Subscription fields to check for empty inputs 
private function isSubcriptionCredEmpty() {
    if(empty($this->CVV) || empty($this->cardNumber) || empty($this->experation) || empty($this->courseName)|| empty($this->email)) {
        return true;
    }
    return false;
}


// validating subscrition  form for errors
public function subcribeUser() {
    if($this->isSubcriptionCredEmpty()) {
        header("Location: ../pages/subscription.php?error=emptyField&email=".$this->email);
        exit();
    }

    //validating email for subscription form
    if($this->notValidEmail()) {
        header("Location: ../pages/subscription.php?error=invalidEmail");
        exit();
    }


    $isSubscribe = $this->addStudent($this->email, $this->CVV, $this->experation, $this->courseName);

    if(!$isSubscribe) {
        header("Location: ../pages/subscription.php?error=sqlError");
        exit();
    }
    
    header("Location: ../pages/subscription.php?error=none");
    exit();
}


    //Setter to set the username variable
    public function setUsername($userName) {
        $this->userName = $userName;
    }

    //Setter to set the password variable 
    public function setPassword($password) {
        $this->prePassword = $password;
    }

    public function setLec_ID($lec_ID) {
        $this->lec_ID = $lec_ID;
    }

    


    //Validating the registration fields to check for empty inputs 
    private function isRegisterCredEmpty() {
        if(empty($this->firstName) || empty($this->lastName) || empty($this->userName) || empty($this->prePassword || empty($this->email) ) || empty($this->conPassword )) {
            return true;
        }
        return false;
    }

    
        
  

    private function isUpdateCredEmpty() {
        if(empty($this->userName) || empty($this->prePassword || empty($this->email) ) || empty($this->conPassword )) {
            return true;
        }
        return false;
    }

    //Validating the login fields to check for empty inputs 
    private function isloginCredEmpty()
    {
        if (empty($this->userName) || empty($this->prePassword)) {
            return true;
        }
        return false;
    }

    //Ensureing that the email is valid
    private function notValidEmail() {
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        return false;
    }

    //Verifying if the passwords match
    private function PasswordNotMatch() {
        if(strcmp($this->prePassword, $this->conPassword) !== 0) {
            return true;
        }

        return false;
    }


    //Function that has the compilation of error handlers to login in user
    public function login() {

        if($this->isloginCredEmpty()) {
            header("Location: ../pages/log.php?error=emptyField&userName=".$this->userName);
            exit();
        }

        //Database function
        $isSuccess = $this->loginUser($this->userName, $this->prePassword);

        if(!$isSuccess) {
            header("Location: ../pages/log.php?error=notsucessful&userName=".$this->userName);
            exit();
        }

        header("Location: ../index.php?error=none");
        exit();
    }

    //Function that has the compilation of error handlers before registering user
    public function register() {
        if($this->isRegisterCredEmpty()) {
            header("Location: ../pages/reg.php?error=emptyField&firstName=".$this->firstName."&lastName=".$this->lastName."&email=".$this->email."&username=".$this->username);
            exit();
        }

        if($this->notValidEmail()) {
            header("Location: ../pages/reg.php?error=invalidEmail&firstName=".$this->firstName."&lastName=".$this->lastName."&email=".$this->email."&username=".$this->username);
            exit();
        }

        if($this->PasswordNotMatch()){
            header("Location: ../pages/reg.php?error=passwordNotMatch&firstName=".$this->firstName."&lastName=".$this->lastName."&email=".$this->email."&username=".$this->username);
            exit();
        }

        $isSaved = $this->addUser($this->firstName, $this->lastName, $this->email, $this->userName, $this->prePassword);

        if(!$isSaved) {
            header("Location: ../pages/reg.php?error=sqlError");
            exit();
        }

        header("Location: ../pages/log.php?error=none");
        exit();
    }

    
    //Function to that reference to the model class to delete the user
    public function removeUser() {
        session_start();
        session_destroy();

        $isRemoved = $this->deleteUser($this->lec_ID);
        $folder = "../../uploads/".$this->lec_ID;
        
        if(!$isRemoved && !unlink($folder)) {
            header("Location: ../index.php?delete=sqlError");
            exit();
        }

        header("Location: ../index.php?delete=success");
        exit();
    }

    
    public function editUser() {
        if($this->isUpdateCredEmpty()) {
            header("location: ../pages/upUser.php?error=emptyFields&username=".$this->username."&email=".$this->email);
            exit();
        }

        if($this->notValidEmail()) {
            header("location: ../pages/upUser.php?error=invalidEmail&username=".$this->username."&email=".$this->email);
            exit();
        }

        if($this->PasswordNotMatch()) {
            header("location: ../pages/upUser.php?error=passwordnotmatch&username=".$this->username."&email=".$this->email);
            exit();
        }

        $isUpdated = $this->updateUser($this->lec_ID, $this->email, $this->userName, $this->prePassword);

        if(!$isUpdated) {
            header("location: ../pages/upUser.php?error=sqlError");
            exit();
        }

        header("location: ../pages/upUser.php?error=none");
        exit();
    }

    
}
