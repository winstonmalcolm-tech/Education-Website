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
    <title>Subscription</title>
</head>

<body>
    <!-- section for body-->
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="../img/logoo.png" class="img-fluid" alt="picture of icon">
                </div>

                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <!-- Form starts here-->
                    <form action="../includes/authentication.inc.php" method="POST">
                        <pre>

                        </pre>
                        <!-- Head icon-->
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-center">
                            <img src="../img/book.png" alt="login icon" class="image">
                            
                        <h1>Course Subscription</h1>
                       
                       

                        </div>
                        <p><h5>Please fill in this form subscribe to a course.</h5></p>
                        <!-- Name input-->
            

                        <pre>
                            </pre>
                        <!-- Email input-->
                        <label for=" email"><b>Email</b></label>
                        <input type="text" placeholder="Enter Email" name="email" class="form-control form-control-lg">
                        <pre>

                    </pre>
                        <p><b>Select Method of Payment</b></p>
                        </select>
                        <select name="Method of Payment">
                            <option value="">Method of Payment</option>
                            <option value="Credit">Credit</option>
                            <option value="Debit">Debit</option>
                            <option value="Cash">Cash</option>
                        </select>   
                        <pre>
                            </pre>
                        <label for="cardNum"><b>Card Number</b></label>
                        <input type="text1" placeholder="card Number" name="cardNum" class="form-control form-control-lg">
                        <pre>
                            </pre>

                        <label for="CVV"><b>CVV</b></label>
                        <input type="text" placeholder="Enter CVV " name="CVV" class="form-control form-control-lg">

                        <pre>
                            </pre>
                        <label for="exp"><b>Expiration Date</b></label>
                        <input type="text" placeholder="Enter Card Expiration Date" name="exp" class="form-control form-control-lg">

                        <pre>
                            </pre>
                            <label for="courseName"><b>Course Name</b></label>
                        <input type="text" placeholder="Enter course name " name="courseName" class="form-control form-control-lg">
                        <pre>

                        <center>
                            <?php 
                                if (isset($_GET['error'])) {
                                    $error = $_GET['error'];

                                    if ($error == "emptyField") {
                                        echo "<p style='color: red'>*Please Fill all fields</p>";
                                    } elseif ($error == "invalidEmail") {
                                        echo "<p style='color: red'>*Invalid Email</p>";
                                    }elseif ($error == "sqlError") {
                                        echo "<p style='color: red'>*There is an error with our servers try again later</p>";
                                    } elseif ($error == "none") {
                                        echo "<p style='color: green;'> *you are registered for the course.</p>";
                                    }
                                }
                            ?>
                        </center>
                            </pre>
                        <center>
                            <button name="subscriptsubmit" class="btn btn-outline-dark btn-lg px-5" type="submit">Subscribe</button>
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