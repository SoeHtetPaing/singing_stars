<?php require_once("./asset/database/connection.php"); ?>
<?php require_once("./asset/database/operation.php"); ?>
<?php require_once("./asset/layout/header.php"); ?>
<?php
	if(empty($_SESSION['member_id'])){
	 	header("location: ./accessDenied.php");
	}
?>

<div class="wrapper row1" style="position: sticky; top:40px; z-index: 10;">
  <header id="header" class="hoc clear">

    <div id="logo" class="fl_left">
      <h1><a href="./index.php">Singing Stars</a></h1>
    </div>   

    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="./voter.php">Voter Panel</a></li>
        <li><a class="drop" href="#">Voter Action</a>
          <ul>
            <li><a href="./voteNow.php">Vote Now</a></li>
            <li><a href="./manageProfile.php">Manage my profile</a></li>
          </ul>
        </li>
        
        <li><a href="./logout.php" style="margin-left: 15px;">Logout</a></li>
      </ul>
    </nav>

     

  </header>
</div>

<div class="wrapper bgded overlay">
  <section id="testimonials" class="hoc container clear"> 
    <h5 class="btmspace-80 underlined"> Vote & Support <a href="#" style="color: #ff0;">Your Star</a></h5>

    <ul class="nospace group">
      <li class="one_half">
        <blockquote>
            <div id="container">
		        <p> Click a link above voter pages to do some stuff.</p>
		    </div>
        </blockquote>
      
      </li>
    </ul>

  </section>
</div>

<?php require_once("./asset/layout/footer.php"); ?>