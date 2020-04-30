<?php
  ob_start();
  session_start();
  require_once("config/config.php");
  if(isset($_SESSION['user']) && !empty($_SESSION['user']))
  {
    header("Location:hunt.php");
  }
  if(isCompetitionStarted()!=1)
  {
    header("Location:index.php");
  }
  $phone="";
  $pass="";
  $error="";
  if(isset($_POST['login']))
  {
    $phone=$_POST['phone'];
    $pass=$_POST['pass'];
    if(empty($_POST['phone']) || empty($_POST['pass']))
    {
      $error="Error : Enter all fields.";
    }
    else
    {
      $pro=$db->prepare("SELECT answered FROM login WHERE phone=? and password=? limit 1;");
      $pro->bind_param("ss",$phone,$pass);
      $pro->execute();
      $r=$pro->get_result();
      if(mysqli_num_rows($r)>0)
      {
        $_SESSION['user']=$phone;
        header("Location:hunt.php");
      }
      else
      {
        $error="Invalid User id / Password";
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
  <div class="container py-3">
<div class="row pt-4">
<div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-8 offset-sm-2">
  <div class="form-container px-4 py-5 signin-form semitransparent">
    <h1 class="text-left color-y pb-2" style="font-weight:700;">Sign In <br> Here</h1>
      <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <?php
          if($error!="")
          {
            echo "<div class='form-group' style='color:#FF0000 !important;'>".$error."</div>";
          }
        ?>
        <div class="form-group py-2">
          <input required type="text" class="form-control" id="login_phone" style="" placeholder="Phone" name="phone" maxlength="10" onkeydown="phoneNumber(this,event);" value="<?php echo $phone; ?>">
        </div>
        <div class="form-group py-2">
          <input required type="password" class="form-control" id="login_password" placeholder="Password" name="pass" spellcheck="false">
        </div>
        <div class="form-group py-2">
          <button type="reset" class="btn  left py-2 px-4 my-2">Reset</button>
          <button type="submit" class="btn  right py-2 px-4 my-2" name="login">Log In</button>
        </div>
      </form>
    </div>
</div>
</div>
</div>
</div>
</body>
</html>
