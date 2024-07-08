<?php require_once("./asset/database/connection.php"); ?>
<?php require_once("./asset/database/operation.php"); ?>
<?php require_once("./asset/layout/header.php"); ?>

<div class="wrapper row1" style="position: sticky; top:40px; z-index: 10;">
  <header id="header" class="hoc clear">

    <div id="logo" class="fl_left">
      <h1><a href="./index.php">Singing Stars</a></h1>
    </div>   

    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="./accessDenied.php">Access Denied</a></li>
        
        <li><a class="drop" href="#">Voter Panel</a>
          <ul>
            <li><a href="./login.php">Login</a></li>
            <li><a href="./register.php">Registration</a></li>
          </ul>
        </li>
        
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
		    <div class="err" style="color: #f00; font-weight: bold;">Access Denied!</div>
		  <p>You don't have access to this page. <a href="./login.php">Click here</a> to login first.</p>
		</div>
        </blockquote>
      
      </li>
    </ul>

  </section>
</div>

<?php require_once("./asset/layout/footer.php"); ?>