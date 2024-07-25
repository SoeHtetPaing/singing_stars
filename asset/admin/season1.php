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



<video autoplay muted loop id="myVideo">
  <source src="../video/intro-<?php echo $intro; ?>.mp4" type="video/mp4">
</video>

<div class="wrapper row1"  style="position: sticky; top:40px; z-index: 10;">
    <header id="header" class="hoc clear">

    <nav id="mainav" class="fl_left">
      <ul class="clear">         
        <li><a href="./votingResult.php"><i class="fa-solid fa-arrow-left"></i>&emsp;Back</a></li>
        <li class="active"><a href="./season1.php">Voting Results in Season 1</a></li>
      </ul>
    </nav>

    <div id="logo" class="fl_right">
        <nav id="mainav" class="fl_right">
          <ul class="clear">
            <li><h1><a href="./admin.php">Singing Stars</a></h1></li>

            <li><a href="#">S1</a></li>
      
          </ul>
        </nav>

    </div>    

    </header>
  
</div>

<div class="wrapper bgded overlay" style="background: transparent;">
  <section id="testimonials" class="hoc container clear"> 
    <ul class="nospace group">
        <?php 

            $levels = selectLevelBySeason($database, 1);
            // var_dump($levels);

            $week_no = $index = 0;
            foreach ($levels as $r) {
                $week_no++;
                $lid = $r['lid'];
                $sql = "select * from stage where lid='$lid';";
                $each = filterData($database, $sql);
                // var_dump($each);

                $sql = "select sum(total_nov) as week_total_nov from stage where lid='$lid';";
                $week_total_nov = filterData($database, $sql)->fetch_assoc();
                // var_dump($week_total_nov);

                echo '<li>';
                echo '<p style="font-size: 18px;"><span style="color: #ff0; font-weight: bold;">'.$r["lname"].": ".$r["description"].'</span></p><br><br>';

                echo '<div style="display: flex; gap: 10px; flex-wrap: wrap;">';
                foreach($each as $e) {
                    // var_dump($e["song"]);
                    
                    $sid = $e["sid"];
                    $w_info = selectStarById($database, $sid);
                    $sql = "select sum(total_nov) as wv_total from stage where sid='$sid';";
                    $wv_total = filterData($database, $sql)->fetch_assoc();
                    // var_dump($wv_total) ;

                    $bg = "";
                    $result = $e["result"];
                    if($result == "Safe") {
                        $bg = "#00B5B8";
                    } else if ($result == "Bottom 3") {
                        $bg = "#CD081B";
                    } else if ($result == "Eliminated") {
                        $bg = "#300000";
                    } else if ($result == "Highest Votes") {
                        $bg = "#26C808";
                        $result = "Top 1";
                    } else if ($result == "Eliminated But Saved By Judges") {
                        $bg = "#A71065";
                        $result = "Saved";
                    } else if ($result == "Pantene Wild Card Winner") {
                        $bg = "#8C00FF";
                        $result = "Pantene";
                    } else if ($result == "2nd Runner Up") {
                        $bg = "#A66336";
                        $result = "2nd Runner";
                    } else if ($result == "1st Runner Up") {
                        $bg = "#BCC1C2";
                        $result = "1st Runner";
                    } else if ($result == "Winner") {
                        $bg = "#FFA508";
                    } else {
                        $bg = "#bbb";
                        $result = "Keep Going";
                    }

                    $divisor = $week_total_nov["week_total_nov"];
                    if($divisor == 0) {
                        $divisor = 100;
                    }

                    echo '
                    <div style="position: relative;">
                        <div class="">
                          <img src="../upload/'.$w_info["img"].'" alt="" style="max-width: 300px;height: auto; border-radius: 10px;"><br>

                          <p style="font-size: 18px; padding-top: 10px;">
                              <span style="font-size: x-large; font-family: \'Dancing Script\'; color: #ff0;">'.$w_info["name"].'</span> 
                              &emsp;<span  style="font-weight: bold; float: right;">'.$w_info["vno"].'</span>
                          </p><hr>

                          <p style="width: 300px; text-align: right;">
                              '.$e["song"].'<br>
                              Program No. '.$e["sno"].'<br>
                              No of votes: '.$e["total_nov"].'<br>
                              Weekly voting rate: '.round((($e["total_nov"]/$divisor) * 100), 2).'%<br>
                              Total votes in this week: '.$week_total_nov["week_total_nov"].'
                          </p>

                          <p style="position: absolute; top: 10px; width: 100px; height: 50px; background-color: '.$bg.'; transform: rotate(-90deg); border-radius: 8px; padding: 13px 10px; text-align: center;">'.$result.'</p>

                          <br>

                        </div>
                    </div>
                    ';

                    
                }
                $index++;
                echo '</div>';
                echo '</li>';
                echo '<hr><br>';



            }

        ?>

        </ul>

  </section>
</div>

<?php require_once("../layout/admin-footer.php"); ?>