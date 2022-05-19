<?php
// code to start session
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    
   <!--favicon link-->
  <link rel ="icon" type="image/x-icon" href="../img/favicon.ico" />
    <!-- Header links-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/log.css">
    <title>Register</title>
</head>

<body>
    <!-- section for body-->
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="../img/logoo.png" class="img-fluid" alt="Logo">
                </div>

                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <!-- Form starts here-->
                    <form method="POST" action="../includes/authentication.inc.php">
                        <pre>

                        </pre>
                        <!-- Head icon-->
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-center">
                            <img src="../img/headt.png" alt="login icon" class="image">
                            
                        <h1>Register Here</h1>
                       
                       

                        </div>
                        <p><h5>Please fill in this form to create an account.</h5></p>
                        <!-- Name input-->
                        <div class=" row align-items-start">
                            <div class="col">
                                <label for="firstname"><b>First Name</b></label>
                                <input type="text" placeholder="First Name" name="firstname" value="<?php echo $firstName = (isset($_GET['firstName'])) ?  htmlspecialchars($_GET['firstName']) : "";?>" class="form-control form-control-lg">
                            </div>


                            <div class="col">
                                <label for="lastname"><b>Last Name</b></label>
                                <input type="text" placeholder="Last Name" name="lastname" value="<?php echo $lastName = (isset($_GET["lastName"])) ? htmlspecialchars($_GET["lastName"]) :""; ?>" class="form-control form-control-lg">
                            </div>
                        </div>




                        <pre>
                            </pre>
                        <!-- Email input-->
                        <label for=" email"><b>Email</b></label>
                        <input type="text" placeholder="Enter Email" name="email" value="<?php echo $lastName = (isset($_GET["email"])) ? htmlspecialchars($_GET["email"]) :""; ?>" class="form-control form-control-lg">

                        <pre>
                            </pre>
                        <!-- Username input-->
                        <label for="username"><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="username" value="<?php echo $lastName = (isset($_GET["username"])) ? htmlspecialchars($_GET["username"]) :""; ?>" class="form-control form-control-lg">

                        <pre>
                            </pre>
                        <!-- Password input-->
                        <label for=" prepassword"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="prepassword" class="form-control form-control-lg">

                        <pre>
                            </pre>

                        <label for="conpassword"><b>Repeat Password</b></label>
                        <input type="password" placeholder="Repeat Password" name="conpassword" class="form-control form-control-lg">

                        <pre>

                            </pre>

                        <center>
                            <?php 
                                if (isset($_GET['error'])) {
                                    $error = $_GET['error'];

                                    if ($error == "emptyField") {
                                        echo "<p style='color: red'>*Please Fill all fields</p>";
                                    } elseif ($error == "invalidEmail") {
                                        echo "<p style='color: red'>*Invalid Email</p>";
                                    } elseif ($error == "passwordNotMatch"){
                                        echo "<p style='color: red'>*Password Not Match</p>";
                                    } elseif ($error == "sqlError") {
                                        echo "<p style='color: red'>*There is an error with our servers try again later</p>";
                                    } elseif ($error == "none") {
                                        echo "<p style='color: green;'> *You Are Registered.</p>";
                                    }
                                }
                            ?>
                        </center>
                        <center>
                            <button name="regsubmit" class="btn btn-outline-dark btn-lg px-5" type="submit" > Register</a></button>
                        </center>
                        <pre>

                    </pre>
                    </form>
                    <!-- Form ends here-->
                    
                </div>
            </div>
        </div>
        </div>

    </section>
</body>

</html>