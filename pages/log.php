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
    <title>Login Page</title>
</head>

<body>
    <!-- section for body-->
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="../img/logoo.png" class="img-fluid" alt="logo">
                </div>

                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <!-- form starts here-->
                    <br><br><form action="../includes/authentication.inc.php" method="post">
                        <pre>



                        </pre>
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-center">
                            <!-- Head icon-->
                            <img src="../img/headt.png" alt="login icon" class="image">
                            <h2 class=" fw-bold mb-2 text-uppercase">Login</h2>

                        </div>



                        <!-- username input -->
                        <div class="form-outline mb-4">
                            <input type="username" id="username" class="form-control form-control-lg" name="username" 
                            placeholder="Please enter your username" />
                            <label class="form-label"  for="username">Username</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" id="password" class="form-control form-control-lg" name = "password" placeholder="Enter password" />
                            <label class="form-label" for="password" name="password">Password</label>
                        </div>
                        <center>
                            <?php 
                                //Display error or success message
                                if (isset($_GET['error'])) {
                                    $error = $_GET['error'];

                                    if ($error == "emptyField") {
                                        echo "<p style='color: red'>*Please Fill all fields</p>";
                                    } elseif ($error == "notSuccessful") {
                                        echo "<p style='color: red'>*Invalid Credentials </p>";
                                    }
                                }
                            ?>
                        </center>
                        <div class="text-center text-lg-center mt-4 pt-2 ">
                            <button class="btn btn-outline-dark btn-lg px-5" name="user_login" type="submit">Login</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0"><h5>Don't have an account? <a href="./reg.php" class="link-danger">Register Here</a></h5></p>
                        </div>


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