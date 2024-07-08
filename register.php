<?php require_once("./asset/database/connection.php"); ?>
<?php require_once("./asset/database/operation.php"); ?>
<?php require_once("./asset/layout/header.php"); ?>

<div class="wrapper row1" style="position: sticky; top:40px; z-index: 10;">
  <header id="header" class="hoc clear">

    <nav id="mainav" class="fl_left">
      <ul class="clear">         
        <li><a href="./index.php"><i class="fa-solid fa-arrow-left"></i>&emsp;Back</a></li>
        <li class="active"><a href="./register.php">Register</a></li>
      </ul>
    </nav>

    <div id="logo" class="fl_right">
      <h1><a href="./index.php">Singing Stars</a></h1>
    </div>    

  </header>
</div>

<div class="wrapper bgded overlay">
  <section id="testimonials" class="hoc container clear"> 
    <h5 class="btmspace-80 underlined"> Vote & Support <a href="#" style="color: #ff0;">Your Star</a></h5>

    <ul class="nospace group">
      <li class="one_half">
        <blockquote>
        <?php
  	      //Process
          $error = "";
  	      if (isset($_POST['submit']))
  	      {
          
  	      	$myName = addslashes( $_POST['name'] );
  	      	$myEmail = $_POST['email'];
  	      	$myPassword = $_POST['password'];
  	      	$myVoterid = $_POST['voter_id'];
            $myconfirmPassword = $_POST['confirmPassword'];
          
            if ($myName != null && $myEmail != null && $myVoterid != null && $myPassword != null && $myconfirmPassword != null) {
              if ($myconfirmPassword == $myPassword) {
                $newpassword = md5($myPassword);
                $success = insertVoter($database, $myName, $myEmail, $myVoterid, $newpassword);
                if($success){
                  header("Location: ./login.php");
                } else {
                  $error = "Something Worng!";
                }
              } else {
                $error = "* Passwords do not match!";
              }
            } else {
              $error = "* All field are needed to fill!";
            }
            
  	      }
  	
        ?>
            <form name="form1" method="post" action="./register.php" onSubmit="return registerValidate(this)">
                <label for="error"  style="color: #f00; margin-bottom: 20px; font-weight: bold;"><?php echo $error; ?></label>
                <label for="name" style="display: inline-block; margin-right: 105px">Name</label><input name="name" type="text" id="name" style="color: #000; display: inline-block;"><br><br>
                <label for="email" style="display: inline-block; margin-right: 105px">Email</label><input name="email" type="email" id="email" style="color: #000; display: inline-block;"><br><br>
                <label for="voter_id" style="display: inline-block; margin-right: 90px">Voter Id</label><input name="voter_id" type="text" id="voter_id" style="color: #000; display: inline-block;"><br><br>
                <label for="password" style="display: inline-block; margin-right: 80px">Password</label><input name="password" type="password" id="password" style="color: #000; display: inline-block;"><br><br>
                <label for="confirmPassword" style="display: inline-block; margin-right: 20px">Confirm Password</label><input name="confirmPassword" type="password" id="confirmPassword" style="color: #000; display: inline-block;"><br><br>

                <input type="submit" name="submit" value="Register Account" style="color: #000;">

                <br>Already have an account? <a href="./login.php"><b>Login Here!</b></a>
                
            </form> 

            
        </blockquote>
      
      </li>
    </ul>

  </section>
</div>

<?php require_once("./asset/layout/footer.php"); ?>
