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
$key = "";
$star = selectStar($database);
$seasons = selectSeason($database);
if (isset($_POST['submit'])) {

    if ($_POST['submit'] == "Add New Season") {
        // var_dump($_POST);

        $sname = $_POST['sname'];
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];

        if ($sname != null && $sdate != null && $edate != null) {
            if ($sname != "Season") {
                $is_exist = selectSeasonByName($database, $sname);
                var_dump($is_exist);

                if ($is_exist == null) {
                    $success = insertSeason($database, $sname, $sdate, $edate);

                    if ($success) {
                        echo '<script>window.location="./manageStar.php"</script>';
                    } else {
                        $error = "Error! Something is worng in voter update.";
                    }

                } else {
                    $error = "\"$sname\" is already exited!";
                }
          
          
            } else {
                $error = "* In season addition, \"Season\" does not allow! Please enter like \"Season 1\".";
              }
            } else {
              $error = "* In season addition, all field are needed to fill!";
            }
    }

    if ($_POST['submit'] == "Add Finalist") {
        $myName = $_POST['name'];
        $mySeason = $_POST['season'];
        $myVno = $_POST['vno'];
        $myAge = $_POST['age'];
        $myHometown = $_POST['hometown'];
    
    
        // var_dump($_POST);
        
        if ($myName != null && $mySeason != null && $myVno != null && $myAge != null && $myHometown != null) {
            $is_exist = selectStarByVno($database, $myVno);
            // var_dump($is_exist);

            if ($is_exist == null) {
              if (isset($_FILES['img'])) {
                // files handle
                $targetDirectory = "../upload/";
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
            
                  $success = insertStar($database, $myName, $myVno, $myAge, $myHometown, $file_name, $mySeason);

                  if ($success) {
                    echo '<script>window.location="./manageStar.php"</script>';
                  } else {
                    $error = "Error! Something is worng in voter update.";
                  }
                   
                 }else {
                    $error = "Required JPG,PNG,GIF in profile picture field.";
                 }
    
               }else{
    
                $file_name = "";
                
                $success = insertStar($database, $myName, $myVno, $myAge, $myHometown, $file_name, $mySeason);

                if ($success) {
                  echo '<script>window.location="./manageStar.php"</script>';
                } else {
                  $error = "Error! Something is worng in voter update.";
                }       
                 
               }           
          
            } else {
              $error = "* In finalist addition, \"$myVno\" is already existed used for \"".$is_exist["name"]."\"!";
            }
        } else {
            $error = "* In finalist addition, all field are needed to fill!";
        }
      
    }

    if ($_POST['submit'] == "Update") {
        $myId = $_POST['id'];
        $myName = $_POST['name'];
        $mySeason = $_POST['season'];
        $myVno = $_POST['vno'];
        $myAge = $_POST['age'];
        $myHometown = $_POST['hometown'];
        $myImage = $_FILES['img']['name'];
    
    
        // var_dump($_POST);
        
        if ($myName != null && $mySeason != null && $myVno != null && $myAge != null && $myHometown != null) {
            // $is_exist = selectStarByVno($database, $myVno);
            // var_dump($is_exist);
            
            if ($myImage != null) {
              // files handle
              $targetDirectory = "../upload/";
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
        
                $success = updateStar($database, $myId, $myName, $myVno, $myAge, $myHometown, $file_name, $mySeason);
                if ($success) {
                  echo '<script>window.location="./manageStar.php"</script>';
                } else {
                  $error = "Error! Something is worng in finalist update.";
                }
                 
               }else {
                  $error = "Required JPG,PNG,GIF in profile picture field.";
               }

             }else{
              
              $success = updateStarWithoutPhoto($database, $myId, $myName, $myVno, $myAge, $myHometown, $mySeason);
              if ($success) {
                echo '<script>window.location="./manageStar.php"</script>';
              } else {
                $error = "Error! Something is worng in finalist update.";
              }       
               
             } 
        } else {
            $error = "* In finalist edition, all field are needed to fill!";
        }
    }



}

if (isset($_GET['submit'])) {
    $key = $_GET['searchKey'];

    if($key != "") {
        $star = searchStar($database, $key);
    } else {
        $star = selectStar($database);
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
        <li class="active"><a href="./manageStar.php">Star Managers</a></li>
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
    <h5 class="btmspace-50 underlined"> Manage <a href="#" style="color: #ff0;">Stars</a></h5>

    <label for="error"  style="color: #f00; margin-bottom: 20px; font-weight: bold;"><?php echo $error; ?></label>

    <ul class="nospace group">
      <li>
        <blockquote>
            <div id="container">
                <p>
                    <span style="font-size: 16px; margin-right: 20px;">All Stars</span>
                    <span class="fl_right">
                        <a href="#" style="border: 1px solid #fff; background-color: #fff; color: #000; border-radius: 5px; padding: 1px 3px;" onclick="window.dialog.showModal();"><i class="fa-solid fa-plus" style="margin-right: 10px;"></i>Add Season</a>
                        <a href="#" style="border: 1px solid #fff; background-color: #fff; color: #000; border-radius: 5px; padding: 1px 3px;" onclick="window.dialogs.showModal();"><i class="fa-solid fa-plus" style="margin-right: 10px;"></i>Add Finalist</a>
                    </span>
                </p>
                <br>
                <form action="" method="get">
                    <input name="searchKey" type="text" style="display: inline-block; color: #000;" value="<?php echo $key; ?>"  placeholder="Enter star name">
                    <input type="submit" value="Search" name="submit" style="display: inline-block; color: #25f; border: 1px solid #25f; cursor: pointer;">
                </form>
                <br>
		        <div style="max-height: 500px; overflow-y: scroll;">
                    <table>
                        <tr>
                            <th style="padding: 15px 10px;">Season</th>
                            <th style="padding: 15px 10px;">Profile</th>
                            <th style="padding: 15px 10px;">Name</th>
                            <th style="padding: 15px 10px;">Voting No.</th>
                            <th style="padding: 15px 10px;">Age</th>
                            <th style="padding: 15px 10px;">Hometown</th>
                            <th style="padding: 15px 10px;">Actions</th>
                        </tr>
                        <?php 
                            $count = 0;
                            foreach($star as $value) { 
                            $sname = selectSeasonById($database, $value["sid"]);
                            $count++; 
                            $dialog = "dialog$count"; ?>
                            <tr style="color: #000; vertical-align: middle;">
                                <td style="vertical-align: middle;"><?php echo $sname["sname"] ?></td>
                                <td>
                                    <img src="../upload/<?php echo $value['img']=="" ? "default-pp.png" : $value["img"]; ?>" alt="voter-pp" style="width: 80px; border-radius: 50%;">

                                </td>
                                <td style="vertical-align: middle;"><?php echo $value["name"] ?></td>
                                <td style="vertical-align: middle;"><?php echo $value["vno"] ?></td>
                                <td style="vertical-align: middle;"><?php echo $value["age"] ?></td>
                                <td style="vertical-align: middle;"><?php echo $value["hometown"] ?></td>
                                <td style="vertical-align: middle;">
                                    <button style="border: 1px solid #f25; display: inline-block;">
                                        <a href="./removeStar.php?id=<?php echo $value['id'] ?>" style="color: #f25;"><i class="fa-solid fa-trash"></i> Remove</a>
                                    </button>
                                    <button style="border: 1px solid #ffa508; display: inline-block;">
                                        <a href="#" style="color: #ffa508;" onclick="window.<?php echo $dialog; ?>.showModal();"><i class="fa-solid fa-edit"></i> Edit</a>
                                    </button>
                                    <dialog id="<?php echo $dialog; ?>">
	                                    <h2>Edit Star</h2>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <input name="id" type="text" id="id" value="<?php echo $value["id"] ?>" style="color: #000; display: none;">
                                            <label for="img" style="display: inline-block;">Browse New Profile</label><input name="img" type="file" id="img" style="color: #000; display: inline-block;"><br><br>

                                            <label for="name" style="display: inline-block; margin-right: 60px">Name</label><input name="name" type="text" id="name" value="<?php echo $value["name"] ?>" style="color: #000; display: inline-block;"><br><br>
                                            <label for="season" style="display: inline-block; margin-right: 8px">Current in: <span style="color: #ffa508"><?php echo $sname["sname"] ?></span></label>
                                            <select name="season" id="season" style="width: 93%;">
                                                <?php 
                                                    foreach ($seasons as $season) {
                                                        echo '<option value="'.$season["sid"].'">'.$season["sname"].'</option>';
                                                    }
                                                ?>
                                            </select><br><br>
                                            <label for="vno" style="display: inline-block; margin-right: 30px">Voting No.</label><input name="vno" type="text" id="vno" value="<?php echo $value["vno"] ?>" style="color: #000; display: inline-block;"><br><br>
                                            <label for="age" style="display: inline-block; margin-right: 75px">Age</label><input name="age" type="number" id="age" value="<?php echo $value["age"] ?>" style="color: #000; display: inline-block;"><br><br>
                                            <label for="hometown" style="display: inline-block; margin-right: 25px">Hometown</label><input name="hometown" type="text" id="hometown" value="<?php echo $value["hometown"] ?>" style="color: #000; display: inline-block;"><br><br>
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
    <h2>Add New Season</h2>
    <form action="" method="post">
        <label for="sname" style="display: inline-block; margin-right: 5px">Season Name</label><input name="sname" type="text" id="sname" style="color: #000; display: inline-block;" placeholder="Season 1"><br><br>
        <label for="sdate" style="display: inline-block; margin-right: 28px">Start Date</label><input name="sdate" type="date" id="sdate" style="color: #000; display: inline-block; width: 190px;"><br><br>
        <label for="edate" style="display: inline-block; margin-right: 31px">End Date</label><input name="edate" type="date" id="edate" style="color: #000; display: inline-block; width: 190px;"><br><br>
        <input type="submit" name="submit" value="Add New Season" style="border: 1px solid #25f; background-color:#25f; color: #fff; cursor: pointer;"><br>
    </form>
    <button onclick="window.dialog.close();" aria-label="close" class="x">❌</button>
</dialog>

<dialog id="dialogs">
    <h2>Add Finalist</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="img" style="display: inline-block;">Browse Profile Picture</label><input name="img" type="file" id="img" style="color: #000; display: inline-block;"><br><br>
        <label for="name" style="display: inline-block; margin-right: 60px">Name</label><input name="name" type="text" id="name"  style="color: #000; display: inline-block;"><br><br>
        <label for="season" style="display: inline-block; margin-right: 8px">Select Season</label>
        <select name="season" id="season" style="width: 190px; display: inline-block;">
            <?php 
                foreach ($seasons as $value) {
                    echo '<option value="'.$value["sid"].'">'.$value["sname"].'</option>';
                }
            ?>
        </select><br><br>
        <label for="vno" style="display: inline-block; margin-right: 30px">Voting No.</label><input name="vno" type="text" id="vno" placeholder="s1t11s1" style="color: #000; display: inline-block;">
        <label for="vno" style="display: inline-block; color: #bbb">Note: <span style="color: #000">s1t11s1</span> means <span style="color: #000">Singing Star Season 1 Top 11 Selection No.1</span></label><br><br>
        <label for="age" style="display: inline-block; margin-right: 75px">Age</label><input name="age" type="number" id="age" style="color: #000; display: inline-block;"><br><br>
        <label for="hometown" style="display: inline-block; margin-right: 25px">Hometown</label><input name="hometown" type="text" id="hometown" style="color: #000; display: inline-block;"><br><br>
        <input type="submit" name="submit" value="Add Finalist" style="border: 1px solid #25f; background-color:#25f; color: #fff; cursor: pointer;"><br>
    </form>
    <button onclick="window.dialogs.close();" aria-label="close" class="x">❌</button>
</dialog>

<?php require_once("../layout/admin-footer.php"); ?>