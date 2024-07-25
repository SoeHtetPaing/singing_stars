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
  	      	$myPhone = $_POST['phone'];
            $myconfirmPassword = $_POST['confirmPassword'];
            $myImage = $_FILES["img"]["name"];

            $is_exist = selectVoterByExist($database, $myEmail);

            if ($is_exist == null) {

              if ($myName != null && $myEmail != null && $myPhone != null && $myPassword != null && $myconfirmPassword != null) {
                if ($myconfirmPassword == $myPassword) {
                  $newpassword = md5($myPassword);
                  $success = false;
  
  
                  if ($myImage != "") {
                    // files handle
                    $targetDirectory = "./asset/upload/";
                    // get the file name
                    $file_name = $_FILES['img']['name'];
                    // get the mime type
                    $file_mime_type = $_FILES['img']['type'];
                    // get the file size
                    $file_size = $_FILES['img']['size'];
                    // get the file in temporary
                    $file_tmp = $_FILES['img']['tmp_name'];
                    // get the file extension, pathinfo($variable_name,FLAG)
                    $extension = pathinfo($file_name,PATHINFO_EXTENSION);
  
                    //register as customer
                    if ($extension =="jpg" || $extension =="png" || $extension =="jpeg"){
                      move_uploaded_file($file_tmp,$targetDirectory.$file_name);
                      $success = insertVoter($database, $myName, $myEmail, $myPhone, $newpassword, $file_name, 10);
                       
                     }else {
                        $error = "Required JPG,PNG,GIF in profile picture field.";
                     }
  
                   }else{
  
                    $file_name = "";
                    $success = insertVoter($database, $myName, $myEmail, $myPhone, $newpassword, $file_name, 10);
                           
                     
                   } 
  
                  if ($success) {
                    // header("Location: ./login.php");
                    echo '<script>window.location="./login.php"</script>';
  
                  
                  }else {
                    echo "Error! Something is worng.";
                  }
  
  
                } else {
                  $error = "* Passwords do not match!";
                }
              } else {
                $error = "* All field are needed to fill!";
              }

            } else {
              $error = "Account exist with this email!";
            }
          
            
            
  	      }
  	
        ?>
            <form name="form1" method="post" action="./register.php"  enctype="multipart/form-data" onSubmit="return registerValidate(this)">
                <label for="error"  style="color: #f00; margin-bottom: 20px; font-weight: bold;"><?php echo $error; ?></label>
                <label for="name" style="display: inline-block; margin-right: 105px">Name</label><input name="name" type="text" id="name" style="color: #000; display: inline-block;"><br><br>
                <label for="email" style="display: inline-block; margin-right: 105px">Email</label><input name="email" type="email" id="email" style="color: #000; display: inline-block;"><br><br>
                <label for="voter_id" style="display: inline-block; margin-right: 103px">Phone</label><input name="phone" type="text" id="phone" style="color: #000; display: inline-block;"><br><br>
                <label for="password" style="display: inline-block; margin-right: 80px">Password</label><input name="password" type="password" id="password" style="color: #000; display: inline-block;"><br><br>
                <label for="confirmPassword" style="display: inline-block; margin-right: 20px">Confirm Password</label><input name="confirmPassword" type="password" id="confirmPassword" style="color: #000; display: inline-block;"><br><br>
                <label for="img" style="display: inline-block; margin-right: 105px">Profile Picture <span style="color: #2f5;">* Optional</span></label><input name="img" type="file" id="img" style="color: #000; display: inline-block;"><br><br>

                <input type="submit" name="submit" value="Register Account" style="color: #000;">

                <br>Already have an account? <a href="./login.php"><b>Login Here!</b></a>
                
            </form> 

            
        </blockquote>
      
      </li>
    </ul>

  </section>
</div>

<?php require_once("./asset/layout/footer.php"); ?>
