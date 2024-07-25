<?php require_once("./asset/database/connection.php"); ?>
<?php require_once("./asset/database/operation.php"); ?>
<?php require_once("./asset/layout/header.php"); ?>
<?php
    $id = $_SESSION['member_id'];
    
    if(empty($id)){
        header("location: ./accessDenied.php");
    }


    $voter = selectVoterById($database, $id);
    // var_dump($voter);
    $myId = $voter['id'];
    $myName = $voter['vname'];
  	$myEmail = $voter['email'];
    $myPhone = $voter['phone'];
    $myNos= $voter['nos'];

    $error = "";
    $key = "";
    $sql = "select * from booking_star where vid='$myId' order by bdate desc;";
    $booking = filterData($database, $sql);
    // var_dump($booking);

  	//Process
    $error = "";
  	if (isset($_POST['submit']))
  	{
      if ($_POST['submit'] == "Update Profile Picture") {
        $myId = $_POST['vid'];
        $myImage = $_FILES['img']['name'];
    
        // var_dump($_POST);

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
            
            $success = updateProfileInVoter($database, $myId, $file_name);

            if($success) {
              echo '<script>window.location="./manageProfile.php"</script>';

            } else {
              $error = "In profile picture update, something is wrong!";
            }
             
           }else {
              $error = "Required JPG,PNG,GIF in profile picture field.";
           }
  
         }else{
  
          $error = "No picture is selected!";         
           
         } 

      }
    

      if($_POST["submit"] == "Update") {

        // var_dump($_POST);

        $myId = $_POST["vid"];
        $myName = $_POST['name'];
  		  $myEmail = $_POST['email'];
  		  $myPhone = $_POST['phone'];
  		  $myPassword = $_POST['password'];
        $myconfirmPassword = $_POST['confirmPassword'];
        
        if ($myName != null && $myEmail != null && $myPhone != null && $myPassword != null && $myconfirmPassword != null) {
          if ($myconfirmPassword == $myPassword) {
            $newpassword = md5($myPassword);
            $success = updateVoter($database, $myId, $myName, $myEmail, $myPhone, $newpassword);
            if($success){
              echo '<script>window.location="./manageProfile.php"</script>';
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
      
  	}

    
    if (isset($_GET['submit'])) {
      $key = $_GET['searchKey'];
    
      if($key != "") {
        $sql = "select * from booking_star where vid='$myId' and transaction like '%$key' or transaction like '$key%' or transaction like '%$key%' or bdate like '%$key' or bdate like '$key%' or bdate like '%$key%';";
        $booking = filterData($database, $sql);
      } else {
        $sql = "select * from booking_star where vid='$myId' order by bdate desc;";
        $booking = filterData($database, $sql);
      }
    
    }  
  	
?>

<div class="wrapper row1" style="position: sticky; top:40px; z-index: 10;">
  <header id="header" class="hoc clear">

    <nav id="mainav" class="fl_left">
      <ul class="clear">         
        <li><a href="./voter.php"><i class="fa-solid fa-arrow-left"></i>&emsp;Back</a></li>
        <li class="active"><a href="./manageProfile.php">Manage Profile</a></li>
      </ul>
    </nav>

    <div id="logo" class="fl_right">
      <h1><a href="./index.php">Singing Stars</a></h1>
    </div>    

  </header>
</div>

<div class="wrapper bgded overlay">
  <section id="testimonials" class="hoc container clear"> 
    <h5 class="btmspace-50 underlined"> My Profile <a href="#" style="color: #ff0;">Information</a></h5>
    <label for="error"  style="color: #f00; margin-bottom: 20px; font-weight: bold;"><?php echo $error; ?></label><br>

    <ul class="nospace group">
      <li class="one_half">
        <blockquote>
            <form name="form1" method="post">
                <input value="<?php echo $myId; ?>" name="vid" type="text" id="vid" style="color: #000; display: none;">
                <label for="name" style="display: inline-block; margin-right: 138px">Name</label><input value="<?php echo $myName; ?>" name="name" type="text" id="name" style="color: #000; display: inline-block;"><br><br>
                <label for="email" style="display: inline-block; margin-right: 138px">Email</label><input value="<?php echo $myEmail; ?>" name="email" type="email" id="email" style="color: #000; display: inline-block;"><br><br>
                <label for="phone" style="display: inline-block; margin-right: 135px">Phone</label><input value="<?php echo $myPhone; ?>" name="phone" type="text" id="phone" style="color: #000; display: inline-block;"><br><br>
                <label for="password" style="display: inline-block; margin-right: 80px">New Password</label><input name="password" type="password" id="password" style="color: #000; display: inline-block;"><br><br>
                <label for="confirmPassword" style="display: inline-block; margin-right: 20px">Confirm New Password</label><input name="confirmPassword" type="password" id="confirmPassword" style="color: #000; display: inline-block;"><br><br>

                <input type="submit" name="submit" value="Update" style="color: #000;">
                
            </form> 

            
        </blockquote>
      
      </li>

      <li style="width: 450px; float: right; position: relative;">
      <?php 
        $stars = selectStarBySeason($database, "2");
        // var_dump($stars);
      ?>
      <div  style="width: 300px; position: absolute; right: 0;">
          <div>
              <div style="width: 200px; height: 200px; border-radius: 8px; background-image: url(./asset/upload/<?php echo $voter['img'] ?>); background-size: cover; background-position: center;"></div>
              <div>
                <br><i class="fa-solid fa-star" style="color: #ffa808;"></i>&emsp;<?php echo $myNos; ?><br>
                <?php echo $myName; ?><br>
                <?php echo $myEmail; ?><br><br>
                <form action="" method="post" enctype="multipart/form-data">
                  <input type="text" name="vid" id="vid" value="<?php echo $myId; ?>" style="display: none;">
                  <input type="file" name="img" id="img" style="display: inline-block;">
                  <button type="submit" value="Update Profile Picture" name="submit" style="display: inline-block; color: #25f; border: 1px solid #25f; cursor: pointer; border-radius: 50%;"><i class="fa-solid fa-save"></i></button>
                </form>
              </div>               
               
        </div>
                        
    </div>

    </li>

    </ul><br><br><br>

    <div id="container">
            <p>
                <span style="font-size: 20px; margin-right: 20px;">My Bookings</span>
            </p>
            <br>
            <form action="" method="get">
                <input name="searchKey" type="text" style="display: inline-block; color: #000;" value="<?php echo $key; ?>" placeholder="Enter transaction or date">
                <input type="submit" value="Search" name="submit" style="display: inline-block; color: #25f; border: 1px solid #25f; cursor: pointer;">
            </form>
            <br>
        <div style="max-height: 500px; overflow-y: scroll;">
            <table>
                    <tr>
                        <th style="padding: 15px 10px;">No.</th>
                        <th style="padding: 15px 10px;">Booking Id</th>
                        <th style="padding: 15px 10px;">Buyer</th>
                        <th style="padding: 15px 10px;">Booking Date</th>
                        <th style="padding: 15px 10px;">No of stars</th>
                        <th style="padding: 15px 10px;">Amount</th>
                        <th style="padding: 15px 10px;">Transaction</th>
                        <th style="padding: 15px 10px;">Status</th>
                    </tr>
                    <?php 
                        $count = 0;
                        foreach($booking as $value) { 

                        $buyer = selectVoterById($database, $value["vid"]);

                        // var_dump($value);
                        $count++; 
                        $dialog = "dialog$count"; ?>
                        <tr style="color: #000;">
                            <td style="padding: 15px 10px;"><?php echo $count ?></td>
                            <td style="padding: 15px 10px;">#<?php echo $value["id"] ?></td>
                            <td style="padding: 15px 10px;"><?php echo $buyer["vname"]." (".$buyer["phone"].")"; ?></td>
                            <td style="padding: 15px 10px;"><?php echo $value["bdate"] ?></td>
                            <td style="padding: 15px 10px;"><?php echo $value["nos"] ?></td>
                            <td style="padding: 15px 10px;"><?php echo $value["bill"] ?></td>
                            <td style="padding: 15px 10px;"><?php echo $value["transaction"] ?></td>

                            <td style="padding: 15px 10px;">
                              <?php 
													      $status = $value['status'];
													      if ($status == 0) { ?>
												          	<span style="color: #ffa808;">Checking</span>
												          <?php }else if ($status == 1) { ?>
												          	<span style="color: #26C808;">Approved</span>
												          <?php }else if ($status == 2) { ?>
												          	<span style="color: #CD081B;">Rejected</span>
												          <?php }?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
    </div>

  </section>
</div>

<?php require_once("./asset/layout/footer.php"); ?>
