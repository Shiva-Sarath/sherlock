<div class="container-fluid py-1 px-5">
  <nav class="navbar navbar-expand-lg navbar-dark  bg-transparent">
    <a class="navbar-brand color-ly" href="index.php"> <div  class="color-y">221B</div >  Baker St.
</a>
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
        <?php
          if(isCompetitionStarted()==1)
          {
            ?>
            <li class="nav-item px-2">
              <a class="nav-link blackcolor" href="leaderboard.php">Leaderboard</a>
            </li>
            <li class="nav-item px-2">
              <?php logbutton(); ?>
            </li>
            <?php
          }
        ?>
      </ul>

    </div>
  </nav>
</div>
