<?php require_once("./asset/database/connection.php"); ?>
<?php require_once("./asset/layout/header.php"); ?>

<div class="wrapper row1" style="position: sticky; top:40px; z-index: 10;">
  <header id="header" class="hoc clear">

    <nav id="mainav" class="fl_left">
      <ul class="clear">         
        <li><a href="./index.php"><i class="fa-solid fa-arrow-left"></i>&emsp;Back</a></li>
        <li class="active"><a href="./login.php">Login</a></li>
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
            <form name="form1" method="post" action="./checkLogin.php" onSubmit="return loginValidate(this)">
                <label for="myusername" style="display: inline-block; margin-right: 50px">Email</label><input name="myusername" type="text" id="myusername" style="color: #000; display: inline-block;"><br><br>
                <label for="mypassword" style="display: inline-block; margin-right: 25px">Password</label><input name="mypassword" type="password" id="mypassword" style="color: #000; display: inline-block;"><br><br>

                <input type="submit" name="Submit" value="Login" style="color: #000;">
            </form>
            <br>Not yet registered? <a href="./register.php"><b>Register Here!</b></a>
        </blockquote>
      
      </li>
    </ul>

  </section>
</div>

<?php require_once("./asset/layout/footer.php"); ?>