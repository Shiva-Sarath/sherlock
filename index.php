<?php
  ob_start();
  session_start();
  require_once("config/config.php");
  if(isset($_GET['logout']) && $_GET['logout']=="true")
  {
    $_SESSION['user']="";
    session_destroy();
    header("Location:index.php");
  }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="images/ritu.png" />
  <title>221B Baker St. | Treasure Hunt</title>
  <a href="https://icons8.com/icon/32292/instagram"></a>
  <a href="https://icons8.com/icon/39969/right-arrow"></a>
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700|Sen:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="style/bootstrap.min.css">
  <link rel="stylesheet" href="style/main.css">
</head>
<body>

  <div class="hero">
    <div class="container-fluid header-container" style="position:fixed;">
      <?php require_once("config/header.php"); ?>
    </div>
    <div class="hero-column-container">
       <div class="hero-column1 column">


       </div>
       <div class="hero-column2 column">
         <div class="jumbotron bg-transparent">
           <div class="bonjour color-y">
             bonjour,
           </div>
           <div class="hunter">
hunter
           </div>
           <div class="register color-y">
          <a class="in-reg color-y" style="" href="register.php">
            register
            <img src="images/right-arrow.png" alt="">
          </a>

          <a class="play color-y" style="" href="signin.php">
            play
            <img src="images/right-arrow.png" alt="">
          </a>
           </div>
         </div>

       </div>
     </div>

</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="script/script.min.js"></script>
</body>
</html>
