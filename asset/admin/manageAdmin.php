<?php require_once("../database/connection.php"); ?>
<?php require_once("../database/operation.php"); ?>
<?php require_once("../layout/admin-header.php"); ?>

<?php
    $log1 = isset($_SESSION['log1']) ? $_SESSION['log1'] : 0;
    if(isset($_COOKIE['$email']) && $_COOKIE['$pass']){
          $curnam = $_SESSION['curname'];
          $curpas = $_SESSION['curpass'];
      }
      else if($log1 == 11)
      {
          $curnam = $_SESSION['curname'];
          $curpas = $_SESSION['curpass'];
      }
      else 
      {
        //header("location: ./checkLogin.php"); /* here goes the page when destroy the cookies */
        echo '<script>window.location="./checkLogin.php"</script>';
        exit;
      }
?>

<?php
$error = "";
$admin = selectAdmin($database);
if (isset($_POST['submit'])) {

    if ($_POST['submit'] == "Add Admin") {
        $myEmail = $_POST['email'];
        $myPassword = $_POST['password'];
        $myconfirmPassword = $_POST['confirmPassword'];
        
        $is_exist = selectAdminByExist($database, $myEmail);
        
        if ($is_exist == null) {
        
          if ($myEmail != null && $myPassword != null && $myconfirmPassword != null) {
            if ($myconfirmPassword == $myPassword) {
              $newpassword = md5($myPassword);
            
              $success = insertAdmin($database, $myEmail, $newpassword);
            
              if ($success) {
                echo '<script>window.location="./manageAdmin.php"</script>';
              } else {
                $error = "Error! Something is worng in admin update.";
              }
          
          
            } else {
              $error = "* In admin addition, passwords do not match!";
            }
          } else {
            $error = "* In admin addition, all field are needed to fill!";
          }
      
        } else {
          $error = "In admin addition, account exist with this email!";
        }
    }

    if ($_POST['submit'] == "Update") {
        $myId = $_POST['id'];
        $myEmail = $_POST['email'];
        $myPassword = $_POST['password'];
        $myconfirmPassword = $_POST['confirmPassword'];
        
        $is_exist = selectAdminByExist($database, $myEmail);
        
        if ($is_exist == null) {
        
          if ($myEmail != null && $myPassword != null && $myconfirmPassword != null) {
            if ($myconfirmPassword == $myPassword) {
              $newpassword = md5($myPassword);
            
              $success = updateAdmin($database, $myId, $myEmail, $newpassword);
            
              if ($success) {
                echo '<script>window.location="./manageAdmin.php"</script>';
              } else {
                $error = "Error! Something is worng in admin update.";
              }
          
          
            } else {
              $error = "* In admin edition, passwords do not match!";
            }
          } else {
            $error = "* In admin edition, all field are needed to fill!";
          }
      
        } else {
          $error = "In admin edition, account exist with this email!";
        }
    }



}

if (isset($_GET['submit'])) {
    $key = $_GET['searchKey'];

    if($key != "") {
        $admin = searchAdmin($database, $key);
    } else {
        $admin = selectAdmin($database);
    }

}

?>

<video autoplay muted loop id="myVideo">
  <source src="../video/intro-<?php echo $intro; ?>.mp4" type="video/mp4">
</video>

<div class="wrapper row1"  style="position: sticky; top:40px; z-index: 10;">
  <header id="header" class="hoc clear"> 
    <div id="logo" class="fl_left">
      <h1><a href="./admin.php">Singing Stars</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="./manageAdmin.php">Admin Manager</a></li>
        <li><a class="drop" href="#">Admin Action</a>
          <ul>
            <li><a href="./manageAdmin.php">Admin Manager</a></li>
            <li><a href="./manageVoter.php">Voter Manager</a></li>
            <li><a href="./manageStar.php">Star Manager</a></li>
            <li><a href="./manageStage.php">Stages Manager</a></li>
            <li><a href="./votingResult.php">Voting Results</a></li>
          </ul>
        </li>
        <li><a href="./logout.php"  style="margin-left: 10px;">Logout</a></li>

      </ul>
    </nav>
  </header>
</div>

<div class="wrapper bgded overlay" style="background: transparent;">
  <section id="testimonials" class="hoc container clear"> 
    <h5 class="btmspace-50 underlined"> Manage <a href="#" style="color: #ff0;">Admin</a></h5>

    <label for="error"  style="color: #f00; margin-bottom: 20px; font-weight: bold;"><?php echo $error; ?></label>

    <ul class="nospace group">
      <li>
        <blockquote>
            <div id="container">
                <p>
                    <span style="font-size: 16px; margin-right: 20px;">All Admins</span>
                    <a href="#" style="border: 1px solid #fff; background-color: #fff; color: #000; border-radius: 5px; padding: 1px 3px;" onclick="window.dialog.showModal();"><i class="fa-solid fa-plus" style="margin-right: 10px;"></i>Add Admin</a>
                </p>
                <br>
                <!-- <form action="" method="get">
                    <input name="searchKey" type="text" style="display: inline-block; color: #000;"  placeholder="Enter email">
                    <input type="submit" value="Search" name="submit" style="display: inline-block; color: #25f; border: 1px solid #25f; cursor: pointer;">
                </form> -->
                <br>
		        <div style="max-height: 500px; overflow-y: scroll;">
		            <table>
                        <tr>
                            <th style="padding: 15px 10px;">No.</th>
                            <th style="padding: 15px 10px;">Email</th>
                            <th style="padding: 15px 10px;">Actions</th>
                        </tr>
                        <?php 
                            $count = 0;
                            foreach($admin as $value) { 
                            $count++; 
                            $dialog = "dialog$count"; ?>
                            <tr style="color: #000;">
                                <td style="padding: 15px 10px;"><?php echo $count ?></td>
                                <td style="padding: 15px 10px;"><?php echo $value["email"] ?></td>
                                <td style="padding: 15px 10px;">
                                    <button style="border: 1px solid #f25; display: inline-block;">
                                        <a href="./removeAdmin.php?id=<?php echo $value['id'] ?>" style="color: #f25;"><i class="fa-solid fa-trash"></i> Remove</a>
                                    </button>
                                    <button style="border: 1px solid #ffa508; display: inline-block;">
                                        <a href="#" style="color: #ffa508;" onclick="window.<?php echo $dialog; ?>.showModal();"><i class="fa-solid fa-edit"></i> Edit</a>
                                    </button>
                                    <dialog id="<?php echo $dialog; ?>">
	                                    <h2>Edit Admin</h2>
                                        <form action="" method="post">
                                            <input name="id" type="text" id="id" value="<?php echo $value["id"] ?>" style="color: #000; display: none;">
                                            <label for="email" style="display: inline-block; margin-right: 105px">Email</label><input name="email" type="email" id="email" value="<?php echo $value["email"] ?>" style="color: #000; display: inline-block;"><br><br>
                                            <label for="password" style="display: inline-block; margin-right: 80px">Password</label><input name="password" type="password" id="password" style="color: #000; display: inline-block;"><br><br>
                                            <label for="confirmPassword" style="display: inline-block; margin-right: 20px">Confirm Password</label><input name="confirmPassword" type="password" id="confirmPassword" style="color: #000; display: inline-block;"><br><br>
                                            <input type="submit" name="submit" value="Update" style="border: 1px solid #ffa508; background-color:#ffa508; color: #fff; cursor: pointer;"><br>
                                        </form>
	                                    <button onclick="window.<?php echo $dialog; ?>.close();" aria-label="close" class="x">❌</button>
                                    </dialog>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
		    </div>
        </blockquote>
      
      </li>
    </ul>

  </section>
</div>

<dialog id="dialog">
    <h2>Add New Admin</h2>
    <form action="" method="post">
        <label for="email" style="display: inline-block; margin-right: 105px">Email</label><input name="email" type="email" id="email" style="color: #000; display: inline-block;"><br><br>
        <label for="password" style="display: inline-block; margin-right: 80px">Password</label><input name="password" type="password" id="password" style="color: #000; display: inline-block;"><br><br>
        <label for="confirmPassword" style="display: inline-block; margin-right: 20px">Confirm Password</label><input name="confirmPassword" type="password" id="confirmPassword" style="color: #000; display: inline-block;"><br><br>
        <input type="submit" name="submit" value="Add Admin" style="border: 1px solid #25f; background-color:#25f; color: #fff; cursor: pointer;"><br>
    </form>
    <button onclick="window.dialog.close();" aria-label="close" class="x">❌</button>
</dialog>

<?php require_once("../layout/admin-footer.php"); ?>