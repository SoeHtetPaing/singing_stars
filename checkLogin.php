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
        <li class="active"><a href="./checkLogin.php">Check Login</a></li>
        
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

        <div >
		    <h1>Invalid Credentials Provided </h1>
		</div>

		<div>

		<?php
			ini_set ("display_errors", "1");
			error_reporting(E_ALL);
			ob_start();

			// Defining your login details into variables
			$myusername=$_POST['myusername'];
			$mypassword=$_POST['mypassword'];

			$encrypted_mypassword=md5($mypassword); //MD5 Hash for security
			// MySQL injection protections
			$myusername = stripslashes($myusername);
			$mypassword = stripslashes($mypassword);

            $voter = selectVoterByEmail($database, $myusername, $encrypted_mypassword);

            if ($voter != null) {
                $_SESSION['member_id'] = $voter['id'];
				        header("location: ./voter.php");
            } else {
				echo "<span style='color: #f00; font-weight: bold;'>Wrong Username or Password!</span><br><br><a href=\"./login.php\">Try again?</a>";
			}

			ob_end_flush();

		?> 

		</div>

        </blockquote>
      
      </li>
    </ul>

  </section>
</div>

<?php require_once("./asset/layout/footer.php"); ?>