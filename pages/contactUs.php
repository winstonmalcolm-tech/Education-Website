<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us</title>

    <link rel="icon" type="image/x-icon" href="../img/favicon.ico" />
    <!--bootstrap link-->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!--style sheet links-->
    <link href="../css/form.css" rel="stylesheet">
    <!--icon links-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!---Contact us icon--->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

   <style>
    .font{
          font-family: Georgia, 'Times New Roman', Times, serif;
        }

    </style>
</head>

<body>
<nav
      class="navbar navbar-expand-md navbar-light"
      style="background-color: #ffd23f"
    >
  <a class="navbar-brand" href="#"> <img
          src="../img/logo1.png"
          alt="Picture of Logo"
          width="300"
          height="100"
        /></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
  <div style="margin-left: auto">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="../index.php">HOME &nbsp </a>
      <a class="nav-item nav-link" href="./courses.php">COURSES &nbsp</a>
      <a class="nav-item nav-link" href="./aboutUs.php">ABOUT US &nbsp</a>
      <a class="nav-item nav-link" href="./faq.php">FAQ &nbsp</a>
      <a class="nav-item nav-link active" href="#">CONTACT US &nbsp <span class="sr-only">(current)</span></a>
      <?php if (isset($_SESSION["username"])) : ?>
        <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdownMenuLink"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
              <i class="fa fa-user" style="font-size:24px">
              <!---User Profile (Captures Session)--->
                 </i><?php
                  if(isset($_SESSION['username'])) {
                     $str1 = "PROFILE: ";
                     echo  $str1 . " " . $_SESSION["username"];
                  }
                  ?>
              </a>
              <div
                class="dropdown-menu"
                aria-labelledby="navbarDropdownMenuLink"
              >
                <a class="dropdown-item" href="pages/logout.php">LOGOUT</a>
                <a class="dropdown-item" href="pages/upUser.php">CHANGE USERNAME</a>
                <a class="dropdown-item" href ="pages/CloseAccount.php"> DELETE ACCOUNT</a>


              </div>
              <?php else : ?>
                        <li class="nav-item">
                        <a class="nav-item nav-link" href="./pages/log.php">LOGIN &nbsp</a>
                        </li>
                    <?php endif; ?>
            </li>
    </div>
  </div>
</nav> 

    <pre>

</pre>
    <div class= "font">
    <!-- Section: Design Block -->
    <div class="row d-flex justify-content-center align-items-center h-100">

        <section>
            <div class="card" style="width: 40rem;">
                <div class=" card-body py-5 px-md-5">

                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <center>
                                <h3>Reach out to us!</h3>
                                <p>We would love to hear from you. Let us know your concerns.</p>
                            </center>
                            <!-- form begins here -->
                            <form method="post" action="../includes/contact.inc.php" method="POST">
                                <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input type="firstname" name="firstName" value="<?php echo $firstName = isset($_GET['firstName']) ? $_GET['firstName'] : ""; ?>" class="form-control" name="firstname" placeholder="Enter First Name" />
                                </div>


                                <pre>

                                </pre>
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="lastname" name="lastName" value="<?php echo $lastName = isset($_GET['lastName']) ? $_GET['lastName'] : ""; ?>" class="form-control" name="lastname" placeholder="Enter Last Name" />
                                </div>

                                <pre>

                                </pre>
                                <div class="form-group">
                                    <label for="email">E-mail Address</label>
                                    <input type="email" name="email" value="<?php echo $email = isset($_GET['email']) ? $_GET['email'] : ""; ?>" class="form-control" name="email" placeholder="Enter Email Address" />
                                </div>

                                <pre>

                                </pre>
                                <div class="form-group">
                                    <label>Comments</label>
                                    <textarea class="form-control" name="comment" value="<?php echo $comment = isset($_GET['comment']) ? $_GET['comment'] : ""; ?>" placeholder="Leave any concerns, reviews and any other necessary information" rows="4"></textarea>
                                </div>
                                <pre>

                                </pre>

                                <center> 
                                    <?php 
                                        if(isset($_GET['error'])) {
                                            $error = $_GET['error'];

                                            if($error == "emptyField") {
                                                echo "<p style='color: red;'> *Please fill all fields.</p>";
                                            } elseif ($error == "invalidEmail") {
                                                echo "<p style='color: red;'> *Email is invalid.</p>";
                                            } elseif ($error == "serverError") {
                                                echo "<p style='color: red;'> *Email service unavailible <br><span style='color: black'>Please contact us at: programmermalx27@gmail.com.</span></p>";
                                            } elseif($error == "none") {
                                                echo "<p style='color: green;'> *mail sent.</p>";
                                            }
                                        }
                                    
                                    ?>
                                </center>
                                <center><button class="btn btn-outline-dark btn-lg px-5" name="contactSubmit">Submit</button>

                                </center>
                                <pre>


                                </pre>
                            </form>
                            <!-- Form ends here-->
                            

                        </div>
                    </div>
                </div>
            </div>
            <center>

        </section>
    </div>
    <!-- Section: Design Block -->
    <pre>

</pre>

    <!-- Section: Design Block -->

    <!---footer--->
    <footer class=" text-center text-white" style="background-color: #212529"> <br>
        <!-- Grid container -->
        <div class="col-12 social padding">
            <div class="icon">
                <i class='far fa-envelope-open' style='font-size:24px;color:white'></i>&nbsp &nbsp
                <i class='far fa-paper-plane' style='font-size:24px;color:white'></i>&nbsp &nbsp
                <i class='fas fa-play' style='font-size:24px;color:white'></i>&nbsp &nbsp
            </div>
        </div><br>
        <!-- Section: Form -->
        <section class="">
            <form action="../includes/subscribe.inc.php">
                <!--Grid row-->
                <div class="row d-flex justify-content-center">
                    <!--Grid column-->
                    <div class="col-auto">
                        <p class="pt-2">
                            <strong>Sign up for our newsletter to get all our latest updates</strong>
                        </p>
                    </div>
                    <!--Grid column-->

                    <div class="col-md-5 col-12">
                        <!-- Email input -->
                        <div class="form-outline form-white mb-4">
                            <input type="email" id="form5Example21" name="subEmail" placeholder="Enter email address" class="form-control" />
                            <label class="form-label" for="form5Example21"></label>
                        </div>
                    </div>


                    <!--Grid column-->
                    <div class="col-auto">
                        <!-- Submit button -->
                        <button type="submit" name="subscribeBtn" class="btn btn-outline-light mb-4">
                            Subscribe
                        </button>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </form>
        </section>
        <!-- Section: Form -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2022 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">Williams Online Teaching Resources</a>
        </div>
        <!-- Copyright -->
    </footer>

    <!--Java Script links-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js">
    </script>


    <!---font div--->
    </div>
</body>

</html>