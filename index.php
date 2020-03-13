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
  $name="";
  $phone="";
  $college="";
  $course="";
  $pass="";
  $error="";
  if(isset($_POST['signup']))
  {
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $college=$_POST['college'];
    $course=$_POST['course'];
    $pass=$_POST['pass'];
    if(empty($_POST['name']) || empty($_POST['phone']) || empty($_POST['college']) || empty($_POST['course']) || empty($_POST['pass']))
    {
      $error="Error : Enter all fields.";
    }
    else
    {
      $pro=$db->prepare("SELECT phone FROM login WHERE phone=? limit 1;");
      $pro->bind_param("s",$phone);
      $pro->execute();
      $r=$pro->get_result();
      if(mysqli_num_rows($r)>0)
      {
        $error="Phone Number already registered. <a href='contact.html' style='margin-left:8px;'>Need Help? Contact Us</a>";
      }
      else
      {
        $pro=$db->prepare("INSERT INTO `login`(`phone`,`name`,`college`,`course`,`password`,`answered`,`last_answered`) VALUES (?,?,?,?,?,'00000000000000000000',CURRENT_TIMESTAMP);");
        $pro->bind_param("sssss",$phone,$name,$college,$course,$pass);
        if($pro->execute())
        {
          header("Location:signin.php");
        }
        else
        {
          $error=$pro->error;
        }
      }
    }
  }
  $db->close();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="images/ritu.png" />
  <title>221B Baker Street</title>
  <a href="https://icons8.com/icon/26139/down-button"></a>
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700|Sen:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style/bootstrap.min.css">
  <link rel="stylesheet" href="style/main.css">
</head>
<body>

  <div class="hero">
    <div class="left-portion">

    </div>
    <div class="container-fluid px-5 py-5">


      <div class="container-fluid py-1 px-5">
        <nav class="navbar navbar-expand-lg navbar-dark  bg-transparent">
          <a class="navbar-brand color-ly" href="index.php"> <div  class="color-y">221B</div >  Baker St.
      </a>


        </nav>
      </div>




      <?php require_once("config/header.php"); ?>

    </div>
    <div class="container">


      <div class="jumbotron bg-transparent d-flex justify-content-center">
        <div class="hero-heading">
          <div class="bonjur">
            Bonjour,
          </div>
          <div class="hunter">
            hunter
          </div>

        </div>
</div>

    </div>

<div class="bottom-portion">

</div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="script/script.min.js"></script>
</body>
</html>
