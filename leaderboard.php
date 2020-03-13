<?php
  ob_start();
  session_start();
  require_once("config/config.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Hunter</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style/bootstrap.min.css">
  <link rel="stylesheet" href="style/main.min.css">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="script/script.min.js"></script>
</head>
  <body class="leaderboardbg">
<div class="signin">




    <div class="container-fluid py-3 px-3">
      <nav class="navbar navbar-expand-lg navbar-light px-3 bg-transparent">
        <a class="navbar-brand" href="index.php">Hunter</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item px-2">
              <a class="nav-link" href="rules.html">Rules</a>
            </li>
            <li class="nav-item px-2">
              <a class="nav-link" href="contact.html">Contact Us</a>
            </li>
            <a class="" href="index.php">
              <?php logbutton(); ?>
            </a>
          </ul>

        </div>
      </nav>
    </div>





  <div class="container py-3">
  <div class="row pt-4">
    <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-xs-12">
      <div style="width:100%;">
        <div class="ttitle mb-3">Leaderboard</div>
        <table class="leaderboard" border="1">
          <tr>
            <th>No.</th>
            <th>Name</th>
            <th>College</th>
            <th>Course</th>
            <th>Questions Solved</th>
          </tr>
          <?php
            $r=$db->query("SELECT * FROM `login` order by answered desc,last_answered asc;");
            $my_score_row=array();
            $my_score=9999;//Max Value
            if(mysqli_num_rows($r)>0)
            {
              $i=0;
              while($row=mysqli_fetch_assoc($r))
              {
                $i++;
                if($i<=$max_leaderboard_num_row)
                {
                  $tclass="";
                  if(isset($_SESSION['user']) && !empty($_SESSION['user']) && $_SESSION['user']==$row['phone'])
                  {
                    $tclass="highlight";
                    $my_score=$i;
                    $my_score_row=$row;
                  }
                  echo "<tr class='".$tclass."'><td>".$i."</td><td>".$row['name']."</td><td>".$row['college']."</td><td>".$row['course']."</td><td>".$row['answered']."</td></tr>";
                }
                else
                {
                  if(isset($_SESSION['user']) && !empty($_SESSION['user']) && $_SESSION['user']==$row['phone'])
                  {
                    $my_score=$i;
                    $my_score_row=$row;
                    if($i>$max_leaderboard_num_row)
                    {
                      break;//Exit after finding current position
                    }
                  }
                }
              }
            }
          ?>
        </table>
        <?php
          if(isset($_SESSION['user']) && !empty($_SESSION['user']))
          {
            echo "<div class='ttitle mt-3 mb-2'>Your Rank : <span class='hightext'>".$my_score."</span></div>";
            echo "<table class='leaderboard'><tr><th>No.</th><th>Name</th><th>College</th><th>Course</th><th>Questions Solved</th></tr><tr class='highlight'><td>".$my_score."</td><td>".$my_score_row['name']."</td><td>".$my_score_row['college']."</td><td>".$my_score_row['course']."</td><td>".$my_score_row['answered']."</td></tr></table>";
          }
        ?>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>
<?php
  $db->close();
?>