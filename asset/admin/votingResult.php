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
        <li><a href="./admin.php"><i class="fa-solid fa-arrow-left"></i>&emsp;Back</a></li>
        <li class="active"><a href="./votingResult.php">Voting Results</a></li>
      </ul>
    </nav>

    <div id="logo" class="fl_right">
        <nav id="mainav" class="fl_right">
          <ul class="clear">
            <li><h1><a href="./admin.php">Singing Stars</a></h1></li>

            <li><a class="drop" href="#">Season</a>
              <ul>
                <li><a href="./season1.php">Season 1</a></li>
                <li><a href="./season2.php">Season 2</a></li>
              </ul>
            </li>
      
          </ul>
        </nav>

    </div>    

    </header>
  
</div>

<div class="wrapper bgded overlay" style="background: transparent;">
  <section id="testimonials" class="hoc container clear"> 
    <h5 class="btmspace-50 underlined"> Voting <a href="#" style="color: #ff0;">Results</a></h5>

    <ul class="nospace group">
      <li class="one_half"> 
        <?php 
            $sql = "select sum(total_nov) as all_total_nov from stage;";
            $all_total_nov = filterData($database, $sql)->fetch_assoc();
            // var_dump($all_total_nov);
            echo "<p style='font-size: 18px;'>Total votes in all season: <span style='color: #ff0; font-weight: bold;'>".$all_total_nov["all_total_nov"]."</span> </p><br>";

            $sql = "select count(*) as week_no from level group by sid;";
            $level = filterData($database, $sql);
            $week = [];
            $week_per_nov = [];
            $week_total = [];
            // var_dump($level);
            foreach ($level as $r) {
              array_push($week, $r["week_no"]);
              // print_r($r);
            }
            // print_r($week);

            $sql = "select sum(total_nov) as week_total_nov from stage group by lid;";
            $week_total_nov = filterData($database, $sql);
            foreach ($week_total_nov as $r) {
              // var_dump($r);
              array_push($week_per_nov, $r["week_total_nov"]);
            }
            // print_r($week_per_nov);
            // array_shift($week_per_nov);
            // print_r($week_per_nov);

            $count = 0;
            foreach ($week as $r) {
              array_push($week_total, 0);
              $index = 0;
              for ($i=0; $i < $r; $i++) { 
                $week_total[$count] += reset($week_per_nov);
                array_shift($week_per_nov);

              }
              $count++;
            }
            // print_r($week_total[0]+$week_total[1]);

            $season_no = 0;
            foreach ($week_total as $r) {
              $season_no++;
              echo "<p style='font-size: 18px;'>Total votes in season ".$season_no.": <span style='color: #ff0; font-weight: bold;'>".$r."</span> </p><br>";
              
            }

        ?>

        
      
      </li>
      
      <li style="width: 450px; float: right; position: relative;">
          <?php 
            $stars = selectStar($database);
            // var_dump($stars);
          ?>
          <div  style="width: 300px; position: absolute; right: 0;">
            <div class="swiffy-slider slider-item-snapstart slider-nav-autoplay slider-nav-autopause">
              <ul class="slider-container">
                  <?php foreach ($stars as $star) {
                    echo '<li style="text-align: end;"><img src="../upload/'.$star["img"].'" style="max-width: 100%;height: auto;">';
                    echo '<div style="position: absolute; bottom: 3rem; right: 2rem; color: #fff; text-shadow: 1px 1px #333;"><span style="font-size: x-large; font-family: \'Dancing Script\';">'.$star["name"].'</span><br>
                    Voting No.&emsp;<span style="color: #ff0; font-size: 20px;">'.$star["vno"].'</span></div>
                    </li>';
                  } ?>
              </ul>

              <button type="button" class="slider-nav"></button>
              <button type="button" class="slider-nav slider-nav-next"></button>

              <div class="slider-indicators" style="position: absolute; bottom: 0;">
                  <?php 
                    for ($i=0; $i < $stars->num_rows; $i++) { 
                      if($i == 0) {
                        echo '<button class="active"></button>';
                      } else {
                        echo  '<button></button>';
                      }
                    }
                  ?>
              </div>
            </div>

            <br><center><span style="font-size: 16px;">Singing Stars Finalists</span></center>

          </div>

      </li>
      
    </ul>
    <br><br>
   
    <blockquote>
      <p style='font-size: 18px;'><span style='color: #ff0; font-weight: bold;'>Season Star S2</span> (ON AIR)<br><br> 
      
      <h1>Who is the winner in this season?</h1>
      
      <span style="background-color: #F52636; color: #fff; padding: 0px 5px; margin-right: 1px;">m</span><span style="background-color: #F52636; color: #fff; padding: 0px 5px; margin-right: 1px;"">n</span><span style="background-color: #868A8C; color: #fff; padding: 0px 5px; margin-right: 1px;"">tv</span>&emsp;
      <span style="color: #EC1481; font-size: 13px; font-weight: bold;">CHANNEL <span style="font-weight: bolder; font-size: 20px;">9</span></span><br><br>
      Every saturday & sunday @8:00 PM only in mntv & channel 9<br> <span style="font-weight: bold;">Go Live & Let Vote!</span></p><br>


        ကိုယ်အကြိုက်ဆုံး ပြိုင်ပွဲ၀င်ကို voting ပေးပြီး တောက်ပခွင့်ပေးလိုက်ပါ <br><br>

        <span style="font-size: 20px; color: #00B5B8; font-weight: bold;">Vote for your favourite star!</span>
    </blockquote>
    <br><br><br>

    <?php
      $sql = "select * from stage where result='Winner';";
            $winner = filterData($database, $sql);

            // var_dump($winner);
            echo '<div style="display: flex; gap: 10px;">';

            $season_no = $index = 0;
            foreach ($winner as $key => $r) {
              $season_no++;
              $sid = $r["sid"];
              $w_info = selectStarById($database, $sid);
              $sql = "select sum(total_nov) as wv_total from stage where sid='$sid';";
              $wv_total = filterData($database, $sql)->fetch_assoc();
              // var_dump($wv_total);

              echo '
                <div class="">
                  <p style="font-size: 18px;"><span style="color: #ff0; font-weight: bold;">Singing Star S'.$season_no.'</span></p><br>
                  <img src="../upload/'.$w_info["img"].'" alt="" style="max-width: 300px;height: auto; border-radius: 10px;"><br><br>
                  <p style="font-size: 18px;"><span style="font-weight: bold;">Winner: </span><span style="font-size: x-large; font-family: \'Dancing Script\'; color: #ff0;">'.$w_info["name"].'</span></p>
                  <p>Total votes: '.$wv_total["wv_total"].'</p>
                  <p>Voting Rate: '.round((($wv_total["wv_total"]/$week_total[$index]) * 100), 2).'%</p>
                </div>
                <br>
              ';

              $index++;
            }

            echo '</div>';

        ?>

  </section>
</div>

<?php require_once("../layout/admin-footer.php"); ?>