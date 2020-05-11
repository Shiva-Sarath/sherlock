<div class="container-fluid ">
  <nav class="navbar navbar-expand-lg navbar-dark  bg-transparent">
    <a class="navbar-brand color-ly" href="index.php"> <div  class="color-y" style="">221B</div >  Baker St.
</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item ">
          <a class="nav-link color-ly" href="rules.php">Rules</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link color-ly" href="contactus.php">Contact Us</a>
        </li>
        <?php
          if(isCompetitionStarted()==1)
          {
            ?>
            <li class="nav-item ">
              <a class="nav-link color-ly" href="leaderboard.php">Leaderboard</a>
            </li>
            <li class="nav-item color-ly">
              <?php logbutton(); ?>
            </li>
            <?php
          }
        ?>
        <li class="nav-item ">
          <a class="nav-link blackcolor" href="http://instagram.com"> <img src="images/insta.png" alt=""> </a>
        </li>
      </ul>

    </div>
  </nav>
</div>
