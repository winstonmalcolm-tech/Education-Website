<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>About Us</title>

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

        .btn:hover {
            background-color:#ee9b00;
            transition: 0.7s;       
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
      <a class="nav-item nav-link active" href="#">ABOUT US &nbsp</a>
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

<header>
<img
          src="../img/aboutUs.png"
          alt="Picture of Laptop"
          width= "100%" height= "450" class = "img-fluid"
        />
</header>

<div class="font">


<br><br><h1>Who Are We?</h1><br>
      
              
  <p class="ttext">

 The William's Online Teaching Resources was founded during the pandemic. The sudden closure of learning institutions placed a demand
 on online tutoring and lesson delivery. A team of 4 aspiring young people who believe that education is one of the cornerstones of 
 society came together to find a solutiion for the educational gap that had arised. The site was named after William. a great mentor and educator
 who had played a role in the life of the founders of the site. It is the aim of the team to provide educational advice and resources to individuals
 as the world continues to expand in the digital age.
      </p>
   
      <br><br><h1>Founders</h1><br>  

<div class = "margin">

<div class="card-deck">
  <div class="card">
    <img class="card-img-top" src="../img/avon.png" alt="Picture of founder" height = "180" width = "180">
    <div class="card-body">
      <h5 class="card-title">Avon Allen</h5>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="../img/yoneike.png" alt="Picture of founder" height = "180" width = "180">
    <div class="card-body">
      <h5 class="card-title">Yoneike Gordon</h5>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="../img/caswell.png" alt="Picture of founder" height = "180" width = "280">
    <div class="card-body">
      <h5 class="card-title">Caswell Toranty</h5>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="../img/winston.png" alt="Picture of founder" height = "180" width = "280">
    <div class="card-body">
      <h5 class="card-title">Winston Malcolm</h5>
    </div>
  </div>
</div><br><br>

<div class="card bg-dark text-white">
  <img class="card-img" src="../img/abstract.jpg" alt="Card image for Mission Statement" height = "300"  >
  <div class="card-img-overlay">
      <div class="card-t">
    <br><h5 class="card-title"><b>Our Mission</b></h5><br>
    </div>
    <p class="card-text"><b>To provide quality online education and  <br>resources to high school students in an effort <br>to promote productivity 
        and purpose.</b></p>

  </div>
</div>


    <!---Contact info-->
<br><br><div class="card text-center">
  <div class="card-header">
  </div>
  <div class="card-body">
  <h5 class="card-title"><b>CONTACT US </b></h5>
    <p class="card-text"><h5>Feel free to contact us at any time. We look forward to hearing from you. </p></h5>
         
    <a href="http://localhost/finalp/contactUs.php" class="btn btn-dark">Send a Message</a><br><br>
  <i class='fas fa-phone' style='font-size:24px'></i> <h5>876-657-7383 </h5><br>
  <i class='far fa-envelope-open' style='font-size:24px'></i><h5>williamsresources@gmail.com</h5>
  </div>
  <div class="card-footer text-muted">
  </div>
</div>

<!----margin div end----->
</div>



<!---footer--->
<br><footer class=" text-center text-white"
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
<!---font div---->
</div>
<!---font div----->
      </div> 
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

