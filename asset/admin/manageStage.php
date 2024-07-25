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
  $lastLevel = selectLevel($database)->fetch_assoc(); 
  // var_dump($lastLevel);
  $seasonLastLevel = selectSeasonById($database, $lastLevel["sid"]);
  // var_dump($seasonLastLevel);
  $starLastLevel = selectStarBySeason($database, $lastLevel["sid"]);
  // var_dump($starLastLevel);
  $levelLastLevel = selectLevelBySeason($database, $lastLevel["sid"]);

          
?>

<?php
$error = "";
$key ="";
$stage = selectStage($database);
$seasons = selectSeason($database);
if (isset($_POST['submit'])) {

    if ($_POST['submit'] == "Add New Level") {
        // var_dump($_POST);

        $lname = $_POST['lname'];
        $desc = $_POST['desc'];
        $sid = $_POST['season'];

        if ($lname != null && $desc != null && $sid != null) {
              $success = insertLevel($database, $lname, $desc, $sid);
              if ($success) {
                  echo '<script>window.location="./manageStage.php"</script>';
              } else {
                  $error = "Error! Something is worng in voter update.";
              }
            } else {
              $error = "* In stage level addition, all field are needed to fill!";
            }
    }

    if ($_POST['submit'] == "Add Stage Performance") {
        $sno = $_POST['sno'];
        $sid = $_POST['sid'];
        $song = $_POST['song'];
        $lid = $_POST['lid'];
    
    
        // var_dump($_POST);
        
        if ($sno != null && $sid != null && $lid != null && $song != null) {
        
          $success = insertStage($database, $sno, $sid, $song, $lid, 1, 0, "");
          if ($success) {
            echo '<script>window.location="./manageStage.php"</script>';
          } else {
            $error = "Error! Something is worng in finalist update.";
          }
           
         
  } else {
      $error = "* In stage performance addition, all field are needed to fill!";
  }
      
    }

    if ($_POST['submit'] == "Update") {
        $id = $_POST['id'];
        $sno = $_POST['sno'];
        $sid = $_POST['sid'];
        $song = $_POST['song'];
        $lid = $_POST['lid'];
        $rst = $_POST['result'];    
    
        // var_dump($_POST);
        
        if ($sno != null && $sid != null && $lid != null && $song != null && $rst != null) {
        
                $success = updateStage($database, $id, $sno, $sid, $song, $lid, $rst);
                if ($success) {
                  echo '<script>window.location="./manageStage.php"</script>';
                } else {
                  $error = "Error! Something is worng in finalist update.";
                }
                 
               
        } else {
            $error = "* In stage edition, all field are needed to fill!";
        }
    }



}

if (isset($_GET['submit'])) {
    $key = $_GET['searchKey'];
    // echo $key;

    if($key != "") {
        $stage = searchStage($database, $key);
    } else {
        $stage = selectStage($database);
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
        <li class="active"><a href="./manageStage.php">Stages Manager</a></li>
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
    <h5 class="btmspace-50 underlined"> Stages <a href="#" style="color: #ff0;">Manager</a></h5>

    <label for="error"  style="color: #f00; margin-bottom: 20px; font-weight: bold;"><?php echo $error; ?></label>

    <ul class="nospace group">
      <li>
        <blockquote>
            <div id="container">
                <p>
                    <span style="font-size: 16px; margin-right: 20px;">All Stages</span>
                    <span class="fl_right">
                        <a href="#" style="border: 1px solid #fff; background-color: #fff; color: #000; border-radius: 5px; padding: 1px 3px;" onclick="window.dialog.showModal();"><i class="fa-solid fa-plus" style="margin-right: 10px;"></i>Add Stage Level</a>
                        <a href="#" style="border: 1px solid #fff; background-color: #fff; color: #000; border-radius: 5px; padding: 1px 3px;" onclick="window.dialogs.showModal();"><i class="fa-solid fa-plus" style="margin-right: 10px;"></i>Add Stage Detail</a>
                    </span>
                </p>
                <br>
                <form action="" method="get">
                    <input name="searchKey" type="text" style="display: inline-block; color: #000;" value="<?php echo $key; ?>" placeholder="Enter song name">
                    <input type="submit" value="Search" name="submit" style="display: inline-block; color: #25f; border: 1px solid #25f; cursor: pointer;">
                </form>
                <br>
		        <div style="max-height: 500px; overflow-y: scroll;">
                    <table>
                        <tr>
                            <th style="padding: 15px 10px;">Stage Level</th>
                            <th style="padding: 15px 10px;">Stage Title</th>
                            <th style="padding: 15px 10px;">Program No.</th>
                            <th style="padding: 15px 10px;">Star</th>
                            <th style="padding: 15px 10px;">Song</th>
                            <th style="padding: 15px 10px;">Voting Status</th>
                            <th style="padding: 15px 10px;">Total Votes</th>
                            <th style="padding: 15px 10px;">Actions</th>
                        </tr>
                        <?php 
                            $count = 0;
                            foreach($stage as $value) { 
                            $level = selectLevelById($database, $value["lid"]);
                            // var_dump($level);
                            $season = selectSeasonById($database, $level["sid"]);
                            // var_dump($season);
                            $star = selectStarById($database, $value["sid"]);
                            $starNow = selectStarBySeason($database, $season["sid"]);
                            $levelNow = selectLevelBySeason($database, $season["sid"]);

                            $lid = $value["lid"];
                            $sql = "select max(total_nov) as max, min(total_nov) as min from stage where lid='$lid';";
                            $minMax = filterData($database, $sql)->fetch_assoc();
                            // var_dump($minMax);
                            $max = $minMax["max"];
                            $bottom3 = $minMax["min"];
                            // var_dump($bottom3);

                            $sql = "select min(total_nov) as min from stage where lid='$lid' and total_nov!='$bottom3';";
                            $min = filterData($database, $sql)->fetch_assoc();
                            $bottom2 = $min["min"] == null ? 0 : $min["min"];
                            // var_dump($bottom2);

                            $sql = "select min(total_nov) as min from stage where lid='$lid' and total_nov!='$bottom3' and total_nov!='$bottom2';";
                            $min = filterData($database, $sql)->fetch_assoc();
                            $bottom1 = $min["min"] == null ? 0 : $min["min"];
                            // var_dump($bottom1);

                            $result = ["Safe", "Bottom 3", "Eliminated", "Highest Votes", "Eliminated But Saved By Judges", "Pantene Wild Card Winner", "2nd Runner Up", "1st Runner Up", "Winner"];


                            $count++; 
                            $dialog = "dialog$count"; ?>
                            <tr style="color: #000; vertical-align: middle;">
                                <td style="padding: 15px 10px;"><?php echo $season["sname"]." ".$level["lname"]; ?></td>
                                <td style="padding: 15px 10px;"><?php echo $level["description"]; ?></td>
                                <td style="padding: 15px 10px;"><?php echo $value["sno"]; ?></td>
                                <td style="padding: 15px 10px;"><?php echo $star["name"]; ?></td>
                                <td style="padding: 15px 10px;"><?php echo $value["song"]; ?></td>
                                <td style="padding: 15px 10px;">
                                  <?php 
                                      if($value["vstatus"] == "0") {
                                        echo "Ended";
                                      } else {
                                        echo "Keep Going";
                                      }
                                  ?>
                                </td>
                                <td style="padding: 15px 10px;"><?php echo $value["total_nov"]; ?></td>
                                <td style="padding: 15px 10px;">
                                    <?php
                                      if($value["vstatus"] != 0) {
                                    ?>
                                    <button style="border: 1px solid #f25; display: inline-block;">
                                        <a href="./endVote.php?id=<?php echo $value['id'] ?>" style="color: #f25;"><i class="fa-solid fa-check-to-slot"></i> Vote Over</a>
                                    </button>
                                    <?php } ?>
                                    <button style="border: 1px solid #ffa508; display: inline-block; margin-top: 5px;">
                                        <a href="#" style="color: #ffa508;" onclick="window.<?php echo $dialog; ?>.showModal();"><i class="fa-solid fa-edit"></i> Set Result</a>
                                    </button>
                                    <dialog id="<?php echo $dialog; ?>">
	                                    <h2>Set Stage Performance Result</h2>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <input name="id" type="text" id="id" value="<?php echo $value["id"] ?>" style="color: #000; display: none;">
                                            <label for="sno" style="display: inline-block; margin-right: 21px">Program No.</label><input name="sno" type="number" id="sno" value="<?php echo $value["sno"] ?>" style="color: #000; display: inline-block;"><br><br>
                                            <label for="sid" style="display: inline-block; margin-right: 8px">Select star</label>
                                            <select name="sid" id="sid" style="width: 95%;">
                                                <?php 
                                                    foreach ($starNow as $s) {
                                                        $selected = "";
                                                        if($s["name"] == $star["name"])  {
                                                          $selected = "selected";
                                                        }
                                                        echo '<option value="'.$s["id"].'" '.$selected.'>'.$s["name"].'</option>';
                                                    }
                                                ?>
                                            </select><br><br>
                                            <label for="song" style="display: inline-block; margin-right: 30px">Song Name</label><input name="song" type="text" id="song" value="<?php echo $value["song"] ?>" style="color: #000; display: inline-block;"><br><br>
                                            <label for="lid" style="display: inline-block; margin-right: 8px">Select stage level</label>
                                            <select name="lid" id="lid" style="width: 95%;">
                                                <?php 
                                                    foreach ($levelNow as $l) {
                                                        $selected = "";
                                                        if($l["lid"] == $lid)  {
                                                          $selected = "selected";
                                                        }
                                                        echo '<option value="'.$l["lid"].'" '.$selected.'>'.$season["sname"].", ".$l["lname"].", ".$l["description"]."".'</option>';
                                                    }
                                                ?>
                                            </select><br><br>
                                            <label for="totnov" style="display: inline-block; margin-right: 25px">
                                              Highest votes in this week: <span style="color: #26C808; font-weight: bold;"><?php echo $max ?></span><br>
                                              Bottom 3:&emsp; <span style="color: #f25; font-weight:bold;"><?php echo $bottom1."&emsp; ".$bottom2."&emsp; ".$bottom3; ?></span><br><br>
                                              In this week,<br>
                                              <span style="color:#25f; font-weight: bold;"><?php echo $star["name"]; ?></span>'s total number of votes: <span style="color: #25f; font-weight: bold;"><?php echo $value["total_nov"] ?></span>
                                            </label>
                                            <label for="result" style="display: inline-block; margin-right: 25px">Fill result associated with total votes</label>
                                            <select name="result" id="result" style="width: 95%;">
                                              <?php
                                                foreach ($result as $r) {
                                                  $selected ="";
                                                  if($r == $value["result"]) {
                                                    $selected = "selected";
                                                  }
                                                  echo '<option value="'.$r.'" '.$selected.'>'.$r.'</option>';
                                                }
                                              ?>
                                            </select>
                                            <br><br>
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
    <h2>Add Stage Level</h2>
    <form action="" method="post">
        <label for="lname" style="display: inline-block; margin-right: 22px">Previous level:<br> <span style="color: #25f"><?php echo $seasonLastLevel["sname"].", ".$lastLevel["lname"].", ".$lastLevel["description"]; ?></span></label>
        <label for="lname" style="display: inline-block; margin-right: 22px">Level Name</label><input name="lname" type="text" id="lname" style="color: #000; display: inline-block;" placeholder="Week 1"><br><br>
        <label for="desc" style="display: inline-block; margin-right: 22px">Description</label><input name="desc" type="text" id="desc" style="color: #000; display: inline-block;" placeholder="Top 10 - နာမည်ကျော်ကြားတေးသွားများ"><br><br>
        <input name="season" type="text" id="season" value="<?php echo $seasonLastLevel["sid"] ?>" style="color: #000; display: none;"><br><br>
        
        <input type="submit" name="submit" value="Add New Level" style="border: 1px solid #25f; background-color:#25f; color: #fff; cursor: pointer;"><br>
    </form>
    <button onclick="window.dialog.close();" aria-label="close" class="x">❌</button>
</dialog>

<dialog id="dialogs">
    <h2>Add Stage Performance Details</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="sno" style="display: inline-block; margin-right: 21px">Program No.</label><input name="sno" type="number" id="sno" min="1" style="color: #000; display: inline-block;"><br><br>
        <label for="sid" style="display: inline-block; margin-right: 8px">Select star</label>
        <select name="sid" id="sid" style="width: 95%;">
            <?php 
                foreach ($starLastLevel as $s) {
                    echo '<option value="'.$s["id"].'">'.$s["name"].'</option>';
                }
            ?>
        </select><br>
        <label for="song" style="display: inline-block; margin-right: 30px">Song Name</label><input name="song" type="text" id="song" placeholder="အလွမ်းသင့်ပန်းချီ" style="color: #000; display: inline-block;"><br><br>
        <label for="lid" style="display: inline-block; margin-right: 8px">Select stage level</label>
        <select name="lid" id="lid" style="width: 95%;">
            <?php 
                foreach ($levelLastLevel as $l) {
                    echo '<option value="'.$l["lid"].'">'.$seasonLastLevel["sname"].", ".$l["lname"].", ".$l["description"]."".'</option>';
                }
            ?>
        </select><br><br>
        <input type="submit" name="submit" value="Add Stage Performance" style="border: 1px solid #25f; background-color:#25f; color: #fff; cursor: pointer;"><br>
    </form>
    <button onclick="window.dialogs.close();" aria-label="close" class="x">❌</button>
</dialog>

<?php require_once("../layout/admin-footer.php"); ?>