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
  if(isset($_SESSION['user']) && !empty($_SESSION['user']))
  {
    header("Location:index.php");

  }


  $name="";
  $phone="";
  $course="";
  $pass="";
  $error="";
  if(isset($_POST['signup']))
  {
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $course=$_POST['course'];
    $pass=$_POST['pass'];
    if(empty($_POST['name']) || empty($_POST['phone']) || empty($_POST['course']) || empty($_POST['pass']))
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
        $error="Phone Number already registered. <a href='contactus.php'>Need Help? Contact Us</a>";
      }
      else
      {
        $pro=$db->prepare("INSERT INTO `login`(`phone`,`name`,`course`,`password`,`answered`,`last_answered`) VALUES (?,?,?,?,'00000000000000000000',CURRENT_TIMESTAMP);");
        $pro->bind_param("ssss",$phone,$name,$course,$pass);
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
  <title>Hunter</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700|Sen:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style/bootstrap.min.css">
  <link rel="stylesheet" href="style/main.css">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="script/script.min.js"></script>
</head>
<body class="signinbody">
<div class="signin logbg">

  <div class="container-fluid header-container" >
    <?php require_once("config/header.php"); ?>
  </div>
  <div class="container-fluid py-4 px-5">
<div class="row py-2 px-5">
  <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-8 offset-sm-2">
  <?php
  $comp_status=isCompetitionStarted();
    if($comp_status==1)
    {
  ?>

  <div class="form-container register ">
    <h1 class=" text-left color-y mb-4" style="font-weight:700; ">Start <br> Here</h1>
      <form class="signupform" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <?php
          if($error!="")
          {
            echo "<label  style='color:#ffffff !important;font-size:1rem;'>".$error."</label>";
          }
        ?>
        <div class="form-group row ">
          <div class="form-group col-6 mgn" >
            <input required type="text" class="form-control" id="signup_name" placeholder="Name" name="name" maxlength="50" value="<?php echo $name; ?>">
          </div>
          <div class="form-group col-6  mgn">
            <input required type="text" class="form-control" id="signup_phone" placeholder="Phone" name="phone" maxlength="10" onkeydown="phoneNumber(this,event);" value="<?php echo $phone; ?>">
          </div>
        </div>

        <div class="form-group  mgn">
          <input required type="text" class="form-control" id="signup_course" placeholder="Course With Year" name="course" maxlength="75" value="<?php echo $course; ?>">
        </div>
        <div class="form-group  mgn">
          <input required type="password" class="form-control" id="signup_password" placeholder="Password" name="pass" maxlength="25" spellcheck="false">
        </div>
        <div class="form-group center">
          <!-- <button type="button" class="btn btn-outline-warning right" onclick="togglePassword(this);" id="tp">Show Password</button> -->
          <button type="reset" class="btn  left py-2 px-4 my-2" onclick="resetForm(_('signup_password'),_('tp'));">Reset</button>

          <button type="submit" class="btn  right py-2 px-4 my-2" name="signup">Register</button>
        </div>
    </form>
  </div>

  <?php
    }
    else if($comp_status==2)
    {
      ?>
        <div class="notstarted">Competition will Start on <?php echo $competition_start_date_time->format("d/M/Y H:i:s"); ?></div>
      <?php
    }
    else
    {
      ?>
        <div class="notstarted">Competition is over, Check Leaderboards</div>
      <?php
    }
  ?>
</div>

</div>
</div>
</div>
</body>
</html>
