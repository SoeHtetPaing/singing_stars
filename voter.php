<?php require_once("./asset/database/connection.php"); ?>
<?php require_once("./asset/database/operation.php"); ?>
<?php require_once("./asset/layout/header.php"); ?>
<?php
	if(empty($_SESSION['member_id'])){
	 	header("location: ./accessDenied.php");
	}

  $id = $_SESSION["member_id"];

  $voter = selectVoterById($database, $id);
  // var_dump($voter);
?>

<div class="wrapper row1" style="position: sticky; top:40px; z-index: 10;">
  <header id="header" class="hoc clear">

    <div id="logo" class="fl_left">
      <h1><a href="./index.php">Singing Stars <span style="color: #ff0;">S2</span></a></h1>
    </div>   

    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="./voter.php">Voter Panel</a></li>
        <li class="drop"><a href="#">Seasons Info</a>
          <ul>
          <li><a href="./season1.php">Season 1</a></li>
          <li><a href="./season2.php">Season 2 (On Air)</a></li>
          </ul>
        </li>
        
        <li><a class="drop" href="#">Voter Action</a>
          <ul>
            <li><a href="./buyStar.php">Buy Stars</a></li>
            <li><a href="./manageProfile.php">Manage my profile</a></li>
            <li><a href="./logout.php">Logout</a></li>
          </ul>
        </li>
        
        <div class="fl_right">
          <span style="border: 1px solid #fff; border-top-left-radius: 5px; border-bottom-left-radius: 5px; padding: 3px 5px; padding: 3px 5px; background-color: #fff; color: #000;  margin-left: 20px;">
            <i class="fa-solid fa-star" style="color: #FFA508; margin-right: 20px;"></i><?php echo $voter["nos"]; ?>

          </span>
          <span style="border-right: 1px solid #fff; border-top: 1px solid #fff; border-bottom: 1px solid #fff; border-top-right-radius: 5px; border-bottom-right-radius: 5px; padding: 3px 5px;">
            <a href="buyStar.php" style="color: #fff;"><i class="fa-solid fa-plus-circle"></i></a>
          </span>
        </div>

      </ul>
    </nav>

     

  </header>
</div>

<div class="wrapper bgded overlay">
<section id="testimonials" class="hoc container clear"> 
    <ul class="nospace group">
        <?php 

            $sql = "select * from stage where vstatus='1' order by total_nov desc;";
            $stage_now = filterData($database, $sql);
            // var_dump($stage_now);

            $stage_title = filterData($database, $sql)->fetch_assoc();
            // var_dump($stage_title);                        

            echo '<li>';

            $lid = $stage_title['lid'];
            $each = selectLevelById($database, $lid);
            // var_dump($each);
            $sql = "select sum(total_nov) as week_total_nov from stage where lid='$lid';";
            $week_total_nov = filterData($database, $sql)->fetch_assoc();
            // var_dump($week_total_nov);
                    
            echo '<p style="font-size: 18px;">
              <span style="color: #ff0; font-weight: bold;">'.$each["lname"].": ".$each["description"].'</span>
              <span>&emsp;&emsp;Current votes: </span>'.$week_total_nov["week_total_nov"].'
              <span>&emsp;&emsp; </span>1 <i class="fa-solid fa-star" style="color: #ffa508; font-size: 14px;"></i> = 1 vote
              <span>&emsp;&emsp; </span>10 <i class="fa-solid fa-star" style="color: #ffa508; font-size: 14px;"></i> per 200Ks
              </p><br><br>';

            echo '<div style="display: flex; gap: 25px; flex-wrap: wrap;">';
            foreach ($stage_now as $r) {
              
                $sid = $r["sid"];
                
                $w_info = selectStarById($database, $sid);
                $sql = "select sum(total_nov) as wv_total from stage where sid='$lid';";
                $wv_total = filterData($database, $sql)->fetch_assoc();
                // var_dump($wv_total) ;
                
                $bg = "";
                $result = $r["result"];
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
                      <img src="./asset/upload/'.$w_info["img"].'" alt="" style="max-width: 300px;height: auto; border-radius: 10px;"><br>
                      <p style="font-size: 18px; padding-top: 10px;">
                          <span style="font-size: x-large; font-family: \'Dancing Script\'; color: #ff0;">'.$w_info["name"].'</span> 
                          &emsp;<span  style="font-weight: bold; float: right;">'.$w_info["vno"].'</span>
                      </p><hr>
                      <p style="text-align: center;">
                        <a href="./voteNow.php?sid='.$r["id"].'&vid='.$voter["id"].'&nos=10" style="display: inline-block;"><button class="vote-btn"><i class="fa-solid fa-star" style="color: #ffa508;"></i>&emsp;10</button></a>
                        <a href="./voteNow.php?sid='.$r["id"].'&vid='.$voter["id"].'&nos=50" style="display: inline-block;"><button class="vote-btn"><i class="fa-solid fa-star" style="color: #ffa508;"></i>&emsp;50</button></a>
                        <a href="./voteNow.php?sid='.$r["id"].'&vid='.$voter["id"].'&nos=100" style="display: inline-block;"><button class="vote-btn"><i class="fa-solid fa-star" style="color: #ffa508;"></i>&emsp;100</button></a>
                        <a href="./voteNow.php?sid='.$r["id"].'&vid='.$voter["id"].'&nos=1000" style="display: inline-block;"><button class="vote-btn"><i class="fa-solid fa-star" style="color: #ffa508;"></i>&emsp;1000</button></a>
                      </p>

                      <p style="width: 300px; text-align: right;">
                          '.$r["song"].'<br>
                          Program No. '.$r["sno"].'<br>
                          No of votes: '.$r["total_nov"].'<br>
                      </p>
                      
                      <p style="position: absolute; top: -10px; width: 100px; height: 50px; background-color: '.$bg.'; transform: rotate(-90deg); border-radius: 8px; padding: 13px 10px; text-align: center;">'.$result.'</p>
                      <br>
                    </div>
                </div>
                ';

                    
                }

                echo '</div>';

        ?>

        </ul>

  </section>
</div>

<?php require_once("./asset/layout/footer.php"); ?>