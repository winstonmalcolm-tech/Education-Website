<?php 
      include "../classes/model/Dbh.class.php";
      include "../classes/model/PostModel.class.php";
      include "../classes/view/PostView.class.php";
      include "../classes/model/AuthenticationModel.class.php";
      include "../classes/view/AuthenticationView.class.php";

      session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Courses</title>

  
   <!--favicon link-->
   <link rel ="icon" type="image/x-icon" href="../img/favicon.ico" />

  <!--bootstrap link-->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
  <!--style sheet links-->
  <link href="../style.css?v=1" rel="stylesheet">
  <!--icon links-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!---Contact us icon--->
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<!---- Style Tags---->
<style>
       .margin{
    margin-right: 150px;
    margin-left: 150px;
}

   .position{
            float: right; 
            margin-left: 30px;
            margin-right: 300px;
            padding-right:10px;

        }
        .ttext {
            text-align: justify;
            font-size: 22px;
            margin-right: 300px;
            margin-left: 300px;
  
        }

        body{
          background-image: linear-gradient(white, #fff6cc);
        }

        h1{
          text-align: center;
          margin-right: 150px;
          margin-left: 150px;
          font-size: 50px;
        }
       
        form{
          margin-right: 250px;
          margin-left: 250px;
        }

        .card{
            margin-right: 5px;
        }

        .btn:hover {
            background-color:#ee9b00;
            transition: 0.7s;       
        }

        .col-md-4{
          margin-bottom: 20px;
        }

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
      <a class="nav-item nav-link active" href="#"><span class="sr-only">(current)</span>COURSES &nbsp</a>
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
                        <a class="nav-item nav-link" href="./log.php">LOGIN &nbsp</a>
                        </li>
                    <?php endif; ?>
            </li>
    </div>
  </div>
</nav> 

<header>
<img
          src="../img/lady using laptop.png"
          alt="Lady Using Laptop"
          width= "100%" height= "500" class = "img-fluid"
        />
</header>

<div class = "font">

<br><br><h1>Register for Courses Online</h1><br>
              
  <p class="ttext">
 Choose from a variety of courses and begin your remote education today!
      </p> <br>

      <form action="../includes/authentication.inc.php" method="POST">
        <div class="form-group">
          <label for="searchCourse"><h5>Search for a Course</h5></label>
          <input type="text" class="form-control" id="searchCourse" placeholder="Search for a Course of Your Choice" name="search_key">
        </div>
      
        <button type="submit" class="btn btn-dark" name="search_btn">Search</button><br><br>
      </form>
     
<div class="card mb-3">
  <img class="card-img-top" src="../img/quote 1.png" height= "250" alt="Quote by Nelson Mandella">
</div>

 <div class = "margin">

<br><div class="container-fluid padding">
  <div class ="row padding mb-18">

  <?php
      // $authViewObj = new AuthenticationView();
      $postObj = new PostView();
      $authViewObj = new AuthenticationView();

      if(isset($_GET['searched'])) {
        $authViewObj->setSearchKey($_GET['searched']);

        if($authViewObj->isThereSearchResult()) {
          $authViewObj->displaySearchResults();
        }
      } else {
        $postObj->printAllPosts();
      }
     
       
  ?>


<!--- Closing DIV---->
    </div> </div>

    <?php 
        $authViewObj = new AuthenticationView();
  
        if(isset($_GET['searched'])) {
          $authViewObj->setSearchKey($_GET['searched']);
  
          if(!$authViewObj->isThereSearchResult()) {
            echo "<h3 class=' text-center text-danger'>NO RESULT</h3>";
          } 

          echo "<h4 class='text-center'><a href='./courses.php'> Back to courses</a></h4>";
        }
    ?>
    
  <!----Margin div--->
  </div>

<!---Quote Card--->
<br><div class="card mb-3">
  <img class="card-img-top" src="../img/quote 2.png" height= "250" alt="Quote by Nelson Mandella">
</div>
  

<div class = "margin">
  <!---Special Feature-->
<br><div class="card text-center">
    <div class="card-header">
  </div>
  <div class="card-body">
    <h5 class="card-title"><b>SPECIAL FEATURE</b></h5>
    <p class="card-text"><h5>Do you have a course you would like to share with others? This is your oppurtunity! Upload your course to
                             William's Online Teaching Resources and expand your horizons. </p></h5>
         
    <a href="publishCourse.php" class="btn btn-dark">Publish a Course</a>

  </div>
  <div class="card-footer text-muted">
 </div>
</div>
  <div class="card-footer text-muted">
 </div>

 <!----Margin div--->
    </div>



<!---footer--->
<footer class=" text-center text-white"
      style="background-color: #212529"
> <br>
  <!-- Grid container -->
  <div class="col-12 social padding">
      <div class = "icon">
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
              <input type="email" id="form5Example21" name="subEmail" placeholder = "Enter email address" class="form-control" />
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

<!----font div---->
      </div>
</body>
</html>

