<?php
  //Config Values
    $timezone="Asia/Kolkata";//Timezone
    $db_server="127.0.0.1";//Database Server
    $db_user="root";//Database Username
    $db_password="";//Database Password
    $db_database="sherlock";//Database Name
    $no_of_questions=20;//Number of Questions
    $max_leaderboard_num_row=10;//Number of rows in Leaderboard
    $start_date='2020-05-09';//Year-Month-Day
    $start_time='08:53:00';//Hour:Minute:Seconds
    $competition_number_of_days=5;//Number of days where event will be online
  //Config Values

  //Don't change anything after this
  function isCompetitionStarted()
  {
    global $competition_start_date_time;
    global $competition_end_date_time;
    $date=new DateTime();//Current Date Time
    if($competition_start_date_time<=$date && $competition_end_date_time>=$date)
    {
      return 1;//Online
    }
    else if($competition_start_date_time>$date)
    {
      return 2;//Not started
    }
    else
    {
      return 3;//Ended
    }
  }
  function logbutton()
  {
    if(isset($_SESSION['user']) && !empty($_SESSION['user']))
    {
      echo "<a href='index.php?logout=true'><button type='button' name='button' class='btn '>Logout</button></a>";
    }
    else
    {
      $temp=$_SERVER['PHP_SELF'];
      $temp=str_replace("\\","/",$temp);
      $temp=explode("/",$temp);
      $temp=end($temp);
      if($temp=="signin.php")
      {
        echo "<a href='register.php'><button type='button' name='button' class='btn '>Sign Up</button></a>";
      }
      else
      {
        echo "<a href='signin.php'><button type='button' name='button' class='btn btn-out' >Sign In</button></a>";
      }
    }
  }
  //Main
  date_default_timezone_set($timezone);
  $competition_start_date_time=new DateTime($start_date." ".$start_time);
  $competition_end_date_time=new DateTime($start_date." ".$start_time." + ".$competition_number_of_days." day");
  echo "<div style='display:none;'>";
  $db=new mysqli($db_server,$db_user,$db_password,$db_database);
  echo "</div>";
  if(mysqli_connect_error())
  {
    die("<div style='color:red;font-weight:900;font-size:23px;'>Database Error : ".mysqli_connect_error())."</div>";
  }
  //Main
?>
