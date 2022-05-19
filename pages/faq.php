<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Frequently Asked Questions </title>

   <!--favicon link-->
  <link rel ="icon" type="image/x-icon" href="../img/favicon.ico" />
  <!--bootstrap link-->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
  <!--style sheet links-->
  <link href="style.css" rel="stylesheet">
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
            font-size: 18px;
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

        .card-text{
            font-size: 20px;
            color: black;
        }
        .font{
          font-family: Georgia, 'Times New Roman', Times, serif;
        }

        .card-t{
            font-size: 30px;
            color: black;
        }

        form{
          margin-right: 250px;
          margin-left: 250px;
        }

        h5{
            font-size: 17px;
        }

        .btn:hover {
            background-color:black;
            transition: 0.7s; 
            color: white;      
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
      <a class="nav-item nav-link" href="../index.php">HOME &nbsp <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="./courses.php">COURSES &nbsp</a>
      <a class="nav-item nav-link" href="./aboutUs.php">ABOUT US &nbsp</a>
      <a class="nav-item nav-link active" href="#">FAQ &nbsp</a>
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

<header>
<img
          src="../img/faq.png"
          alt="Picture of question mark"
          width= "100%" height= "450" class = "img-fluid"
        />
</header>

<div class="font">


<br><br><h1>We Are Here To Help You!</h1><br>
      
              
  <p class="ttext">

 Do you have a concern that you would like to be addressed? Your answer might be here! Browse through the 
 catalogue of frequenlty asked questions. Feel free to ask questions of your own!
      </p>
   
      <br><br><h1>Frequently Asked Questions</h1><br>  

      <div class = "margin">

<br><div class="container-fluid padding">
  <div class ="row padding">
<!---Card 1-->
<div class="col-md-4">
<div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
  <div class="card-header"><h4>What's the timeline to unsubscribe from a course?</h4></div>
  <div class="card-body">
    <h5 class="card-title">A member is able to unsubscribe from a course before a week of payment has passed</h5>
  </div>
</div>
</div>

<!---Card 2-->
<div class="col-md-4">
<div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
  <div class="card-header"><h4>What is the timeline to receive a certificate for a course?</h4></div>
  <div class="card-body">
    <h5 class="card-title">The certificate for a course is awarded a week after all final results have been published</h5>
  </div>
</div>
</div>


<!---Card 3-->
<div class="col-md-4">
<div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
  <div class="card-header"><h4>Are there payment plans available?</h4></div>
  <div class="card-body">
    <h5 class="card-title">No. Each course requires a one time payment</h5>
  </div>
</div>
</div>


<!---Card 4-->
<div class="col-md-4">
<div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
  <div class="card-header"><h4>Are tutors available for the courses?</h4></div>
  <div class="card-body">
    <h5 class="card-title">Yes, each member has access to tutoring services when they subscribe to a course</h5>
  </div>
</div>
</div>

<!---Card 5-->
<div class="col-md-4">
<div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
  <div class="card-header"><h4>How often are classes kept?</h4></div>
  <div class="card-body">
    <h5 class="card-title">The class duration depends on the course. Click the button below to access more information about
        course timelines</h5>
        <a href="" class="btn btn-warning">Read More</a>
    
  </div>
</div>
</div>


<!---Card 6-->
<div class="col-md-4">
<div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
  <div class="card-header"><h4>Do teachers cater to different learning styes?</h4></div>
  <div class="card-body">
    <h5 class="card-title">Yes! Each teacher/tutor is trained to administer lessons using various modalities</h5>
  </div>
</div>
</div>


<!--- Closing DIV---->
    </div> </div>

 <!----Margin div--->
    </div>

    <br><br><h1>Ask Your Question</h1><br> 

<form>
      <div class="form-group">
        <input type="textarea" class="form-control" id="searchCourse" placeholder="Type Question Here">
      </div>
      <button type="submit" class="btn btn-warning">Submit</button><br><br>
</form>  



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
      <form action="">
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
              <input type="email" id="form5Example21"  placeholder = "Enter email address" class="form-control" />
              <label class="form-label" for="form5Example21"></label>
            </div>
          </div>
        

          <!--Grid column-->
          <div class="col-auto">
            <!-- Submit button -->
            <button type="submit" class="btn btn-outline-light mb-4">
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
