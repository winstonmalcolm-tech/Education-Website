<?php 
    session_start();
    // including classes
    include "../classes/model/Dbh.class.php";
    include "../classes/model/AuthenticationModel.class.php";
    include "../classes/controller/Authentication.class.php";
    include "../classes/view/AuthenticationView.class.php";


if (isset($_POST["regsubmit"])) {
    $firstName = $_POST["firstname"];
    $lastName = $_POST["lastname"];
    $email = $_POST["email"];
    $userName = $_POST["username"];
    $prePassword = $_POST["prepassword"];
    $conPassword = $_POST["conpassword"];

    $auth = new Authentication($firstName, $lastName, $email, $userName, $prePassword, $conPassword);
    $auth->register();

} elseif (isset($_POST['user_login'])) {
    //Collect
    $username = $_POST["username"];
    $password = $_POST["password"];

    $auth = new Authentication(null, null, null, null, null, null);

    $auth->setUsername($username);
    $auth->setPassword($password);
    
    $auth->login();

} elseif (isset($_POST['update_btn'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $prePassword = $_POST['prepassword'];
    $conPassword = $_POST['conpassword'];
    $lec_ID = $_SESSION['lec_ID'];

    $auth = new Authentication(null, null, $email, $username, $prePassword, $conPassword);
    $auth->setLec_ID($lec_ID);
    $auth->editUser();

} elseif (isset($_POST['search_btn'])) {
    $searchKey = $_POST['search_key'];
    header("Location: ../pages/courses.php?searched=".$searchKey);

} elseif (isset($_POST['subscriptsubmit'])) {
    //For the subscribe to a course page
    
    $email = $_POST["email"];
    $CVV = $_POST["CVV"];
    $cardNumber = $_POST["cardNum"];
    $experation = $_POST["exp"];
    $courseName = $_POST["courseName"];

    // echo $email, $CVV, $cardNumber, $experation, $courseName;

    $subObj = new Authentication(null, null, null, null, null, null);
    

    $subObj->setEmail($email);
    $subObj->setCVV($CVV);
    $subObj->setCardNumber($cardNumber);
    $subObj->setExperationDate($experation);
    $subObj->setcourseName($courseName);
    $subObj->subcribeUser();
    
} elseif (isset($_POST['deleteUser_btn'])) {
    $username = $_POST['username'];
    $prePassword = $_POST['prepassword'];
    $conPassword = $_POST['conpassword'];
    $lec_ID = $_SESSION['lec_ID'];

    $delObj = new Authentication(null,null,null,$username, $prePassword,$conPassword);
    $delObj->setLec_ID($lec_ID);
    $delObj->removeUser();

}

