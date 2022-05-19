<?php 
    session_start();
    include "../classes/model/Dbh.class.php";
    include "../classes/model/PostModel.class.php";
    include "../classes/view/PostView.class.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .margin{
        margin-right: 150px;
        margin-left: 150px;
    }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Publish Your Course</title>

    
   <!--favicon link-->
  <link rel ="icon" type="image/x-icon" href="img/favicon.ico" />
  
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
      <a class="nav-item nav-link active" href="../index.php">HOME &nbsp <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="./courses.php">COURSES &nbsp</a>
      <a class="nav-item nav-link" href="./aboutUs.php">ABOUT US &nbsp</a>
      <a class="nav-item nav-link" href="./faq.php">FAQ &nbsp</a>
      <a class="nav-item nav-link" href="./contactUs.php">CONTACT US &nbsp</a>
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
                <a class="dropdown-item" href="logout.php">LOGOUT</a>
                <a class="dropdown-item" href="upUser.php">CHANGE USERNAME</a>
                <a class="dropdown-item" href ="CloseAccount.php"> DELETE ACCOUNT</a>


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
<div class="margin">
    <button class="button button4">MY POSTS</button>
    <pre>
</pre>
    <!-- Section: Design Block -->
    <div class="row d-flex justify-content-center align-items-center h-100">
        
        <section class="text-center">
        <center>
            <div class="card" style="width: 40rem;">
                <div class=" card-body py-5 px-md-5">

                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <form action="../includes/mypost.inc.php" method="POST" enctype="multipart/form-data"> 
                                <!-- Form starts here-->
                                <div class="row">
                                    <div>
                                        <label class="form-label" for="title"> Title:</label>
                                    </div>
                                    <pre> </pre>
                                    <div class="form-outline">
                                        <input type="text" value="<?php echo $title = isset($_GET['title']) ? $_GET['title'] : "";?>" id="title" name="title" class="form-control" />
                                    </div>
                                </div>
                                <pre> </pre>
                                <div class="row">
                                    <div>
                                        <label class="form-label" for="cost"> Cost:</label>
                                    </div>
                                    <pre>  </pre>
                                    <div class="form-outline">
                                        <input type="text" value="<?php echo $cost = isset($_GET['cost']) ? $_GET['cost'] : "";?>" id="cost" name="cost" class="form-control" />
                                    </div>
                                </div>
                                <pre> </pre>

                                <div class="row">
                                    <div>
                                        <label class="form-label" for="description"> Description: </label>
                                    </div>
                                    <pre>  </pre>
                                    <div class="form-outline">
                                        <input type="text" value="<?php echo $description = isset($_GET['description']) ? $_GET['description'] : "";?>" id="description" name="description" class="form-control" />
                                    </div>
                                </div>

                                <pre> </pre>

                                <div class="row">
                                    <pre>  </pre>
                                    <input type="file" id="image" name="image"/>
                                </div>

                                <pre> </pre>
                                <!-- Buttons -->
                                
                                <?php 
                                    if(isset($_GET['action'])) {
                                        echo '<input type="hidden" name="post_id" value="'.$_GET['id'].'"/>
                                              <input type="hidden" name="filePath" value="'.$_GET['filePath'].'"/>  
                                        ';  
                                       
                                       echo '<button type="submit" class="button button1" name="editBtn">Edit</button>';
                                       echo '<button type="submit" class="button button1" name="cancelBtn">Cancel</button>';
                                    } else {
                                        echo '<button type="submit" class="button button1" name="postBtn">Post</button>';
                                    }
                                ?>
                                <!-- Form ends here-->

                                <?php 
                                    if (isset($_GET['error'])) {
                                        $error = $_GET['error'];

                                        if ($error == "emptyfield") {
                                            echo "<p style='color: red;'> *Please fill all fields.</p>";
                                        } elseif ($error == "sqlerror") {
                                            echo "<p style='color: red;'> *There is an error with our servers try again later.</p>";
                                        } elseif ($error == "fileSizeError") {
                                            echo "<p style='color: red;'> *Image size is too large.</p>";
                                        } elseif ($error == "fileError") {
                                            echo "<p style='color: red;'> *There was an error with the image.</p>";
                                        } elseif ($error == "none") {
                                            echo "<p style='color: green;'> *Post successful.</p>";
                                        }

                                    } elseif (isset($_GET['deleteError'])) {
                                        $error = $_GET['deleteError'];

                                        if ($error == "sqlerror") {
                                            echo "<p style='color: red;'> *File was not deleted.</p>";
                                        } elseif ($error == "none") {
                                            echo "<p style='color: green;'> *Delete successful.</p>";
                                        }

                                    } elseif (isset($_GET['editError'])) {
                                        $error = $_GET['editError'];

                                        if ($error == "emptyfield") {
                                            echo "<p style='color: red;'> *Please fill all fields.</p>";
                                        } elseif($error == "sqlerror") {
                                            echo "<p style='color: red;'> *There is an error with our servers try again later.</p>";
                                        } elseif ($error == "fileSizeError") {
                                            echo "<p style='color: red;'> *Image size is too large.</p>";
                                        } elseif ($error == "filenotuploaded") {
                                            echo "<p style='color: red;'> *Error updating image.</p>";
                                        } elseif ($error == "filenotdeleted") {
                                            echo "<p style='color: red;'> *Error updating image.</p>";
                                        }
                                    } elseif (isset($_GET['update']) && $_GET['update'] == "updated") {
                                        echo "<p style='color: green;'> *Update successful.</p>";
                                    }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </center>
        <div class="container-fluid padding">
            <div class ="row padding mb-18" style="background-color: green;">
                    <pre> </pre>
                                        
                    <?php 
                        $postObj = new PostView();
                        
                        $postObj->printSpecificUserData($_SESSION['lec_ID']); //Session variable will go here
                    ?>
            </div>
        </div>
        </section>
    </div>
    <!-- Section: Design Block -->

    <!-- Margin Div -->
    </div>

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

</body>

</html>