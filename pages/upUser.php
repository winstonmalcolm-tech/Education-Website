<?php
// code to start session
session_start();
include "../classes/model/Dbh.class.php";
include "../classes/model/AuthenticationModel.class.php";
include "../classes/view/AuthenticationView.class.php";

$authView = new AuthenticationView();

$result = $authView->getUserData($_SESSION['lec_ID']);

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
    <title>Update Username</title>
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="../img/logoo.png" class="img-fluid" alt="logo image">
                </div>

                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

                    <form method="post" action="../includes/authentication.inc.php">
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-center">
                            <img src="../img/headt.png" alt="login icon" class="image of logo icon">
                            <h2>Change Username</h2>

                        </div>
                       
                        <p><h4>Enter Your New Username.</h4></p>

                        <div class=" row align-items-start">


                            <label for="username"><b>Username</b></label>
                            <input type="text" placeholder="Enter new username" name="username"  value="<?php echo $result['username']?>" class="form-control form-control-lg">


                            <pre>
</pre>

                            <label for=" email"><b>Email</b></label>
                            <input type="text" placeholder="Enter Email" name="email" value="<?php echo $result['email']?>" class="form-control form-control-lg">


                            <pre>
</pre>
                            <label for=" prepassword"><b>Password</b></label>
                            <input type="password" placeholder="Enter Password" name="prepassword" class="form-control form-control-lg">

                            <pre>
</pre>

                            <label for="conpassword"><b>Repeat Password</b></label>
                            <input type="password" placeholder="Repeat Password" name="conpassword" class="form-control form-control-lg">

                            <pre>

</pre>
                            <button class="btn btn-outline-dark btn-lg px-5" name="update_btn" type="submit">Update</button><br><br>


                    <br><br>
                    </form>
                </div>
            </div>
        </div>
        </div>

    </section>
</body>

</html>