<?php require_once("../database/connection.php"); ?>
<?php require_once("../database/operation.php"); ?>
<?php require_once("../layout/admin-header.php"); ?>
<?php
    $myusername = isset($_SESSION['nam'])?$_SESSION['nam']:"" ;
    $mypassword = isset($_SESSION['pas'])?$_SESSION['pas']:"" ;

    if(isset($_COOKIE['$email']) && $_COOKIE['$pass']){
        header("Location: ./admin.php");
        exit;
    }
?>

<div class="wrapper row1" style="position: sticky; top:40px; z-index: 10;">
  <header id="header" class="hoc clear"> 

    <nav id="mainav">
        <h5>Welcome back, Admin!</h5>
    </nav>

     

  </header>
</div>

<div class="container" >
  <div class="card"></div>

  <div class="card">
    <h1 class="title">Login</h1>
    <form name="form1" action="./checklogin.php" method="post" onsubmit="return loginValidate(this)">

      <div class="input-container">
        <input name="myusername" value="<?php echo $myusername  ?>" type="text" required="required"/>
        <label>Email</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input name="mypassword" value="<?php echo $mypassword ?>" type="password"  required="required"/>
        <label>Password</label>
        <div class="bar"></div>
      </div>

      <center><tr><td colspan="2" align="center"><input type="checkbox" name="remember" value="1"> <font color="blue">Remember Me</font></td></tr></center><br>

      <div class="button-container">

        <button name="Submit"><span>Login</span></button>

      </div>
      <br><br>
    <center>Return to <a href="http://localhost/pj_lease/singing_stars/index.php">Voter Panel</a></center>

    </form>
  </div>
  
</div>


<?php require_once("../layout/admin-footer.php"); ?>




