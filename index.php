<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home Page</title>

   <!--favicon link-->
  <link rel ="icon" type="image/x-icon" href="img/favicon.ico" />
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
          src="img/logo1.png"
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
      <a class="nav-item nav-link active" href="#">HOME &nbsp <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="./pages/courses.php">COURSES &nbsp</a>
      <a class="nav-item nav-link" href="./pages/aboutUs.php">ABOUT US &nbsp</a>
      <a class="nav-item nav-link" href="./pages/faq.php">FAQ &nbsp</a>
      <a class="nav-item nav-link" href="./pages/contactUs.php">CONTACT US &nbsp</a>
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
<header>
<img
          src="img/homepage.png"
          alt="Picture of Laptop"
          width= "100%" height= "500" class = "img-fluid"
        />
</header>

<?php 
  if (isset($_GET['subscribe'])) {
    $subscribe = $_GET['subscribe'];
    $message = '';

    if ($subscribe == 'false') {
      $message = 'We are encountering issues with our server';
    } elseif ($subscribe == "true") {
      $message = "You are now subscribed to our news letter!";
    } elseif ($subscribe == "alreadySaved") {
      $message = "You are already on the newsletter list";
    } elseif ($subscribe == "empty") {
      $message = "Please fill in the field with an email";
    } elseif ($subscribe == "invalidEmail") {
      $message = "The email is not valid";
    }

    echo '
      <script>
        alert("'.$message.'");
      </script>
    ';

    
  }
?>


<div class = "font">

<br><br><h1>Welcome to William's Online Teaching Resources</h1><br>
      
      
        
  
          <div class = "position"> 
              <img src= "img/welcome pic.png"
          alt="Boy around laptop"
          width= "350" height= "400" class = "img-fluid"> 
          </div>       
  <p class="ttext">
 Bring school everywhere you go! William's Online Teaching Resources provides
 a host of online courses that you can take at your convenience. Gain access to various additional resources
 as you embark on your educational journey!
      </p>
     
      <div class = "margin">   
<!----Cards---->
<br> <br> <br> <br> 
<div class="card-columns">
  <div class="card">
    <img class="card-img-top" src="./img/man using laptop.jpg" alt="Man Using Laptop">
    <div class="card-body">
      <h5 class="card-title"><b>ONLINE COURSES</b></h5>
      <p class="card-text">We offer a wide range of on demand courses</p>
    </div>
  </div>
  <div class="card text-white text-center bg-dark mb-3">
    <blockquote class="blockquote mb-0">
      <p>This platform provides such great service 10/10! ~<em> Yoneike   </em></p>
    </blockquote>
  </div>
  <div class="card">
    <img class="card-img-top" src="img/man holding phone.png" alt="Man holding phone" >
    <div class="card-body">
    <p class="card-text">The flexiblity of the courses offered allows me to obtain an education while working. ~<em> Caswell</em>
      </p>
    </div>
  </div>
  <div class="card text-white text-center bg-dark mb-3">
    <blockquote class="blockquote mb-0">
      <p>The lectures are warm and friendly and prioritizes the learning of the students <br>~<em> Winston   </em> </p>
    </blockquote>
  </div>
  <div class="card text-center">
    <div class="card-body">
      <h5 class="card-title"><b>NETWORK</b></h5>
      <p class="card-text">Meet persons with similar interests as you!
      </p>
    </div>
  </div>
  <div class="card">
    <img class="card-img" src="img/woman talking.jpg" alt="Woman talking">
  </div>
  <div class="card text-white text-center bg-dark mb-3">
    <blockquote class="blockquote mb-0">
      <p>I enjoy the diversity on this platform and the opputunities it provides ~<em> Avon</em></p>
    </blockquote>
  </div>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title"><b>STAY IN TOUCH</b></h5>
      <p class="card-text">We provide timely communication with our members by offering 24hr support!.</p>
    </div>
  </div>
</div>

<!---Margin div---> 
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
      <form action="./includes/subscribe.inc.php" method="POST">
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
              <input type="text" id="form5Example21"  name="subEmail" placeholder = "Enter email address" class="form-control" />
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

<script>
      var modal_elem = document.querySelector('#modal1');
      let dismissible = true;
      var instance = M.Modal.init(modal_elem, dismissible);

      document.getElementById('cancelBtn').addEventListener('click', () => {
            instance.close();
        });
        
      document.getElementById("modal_trigger").addEventListener('click', () => {
          instance.open();
      });
    </script>

</body>
</html>

