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

  $error = "";
  if(isset($_POST["submit"])) {
    // var_dump($_POST) ;
    $amount = $_POST["amount"];
    $tid = $_POST["tid"];

    if($amount != null && $tid != null){
        
        if($tid == "0100347008059471538") {
            $error = "* Invalid transaction id! Transaction id must not be sample id we shown!";
        } else {
            if(strlen($tid) < 19) {
				$error = "* Invalid transaction id! Transaction id must be 19 digits!";
			} else {
				if (preg_match('/^[0-9]+$/', $tid)) {
                    $bid = uniqid();

                    date_default_timezone_set('Asia/Yangon');
                    $bdate = date("Y-m-d H:i:s");

                    $nos = ($amount / 200) * 10;
                    // echo $nos;

                    insertBooking ($database, $bid, $id, $bdate, $nos, $amount, $tid, 0);
                    echo '<script>alert("You bought '.$nos.' stars. Please wait a movement for approve! After approving, your star amounts will increase.")</script>';
		            echo '<script>window.location="./manageProfile.php"</script>';


				} else {
					$error = "* Invalid travsaction id! Transaction id may be number only!";                
				}
			}
        }

    } else {
        $error = "* In stars buying process, all field are needed to fill!";
    }

  }
?>

<div class="wrapper row1" style="position: sticky; top:40px; z-index: 10;">
  <header id="header" class="hoc clear">

    <nav id="mainav" class="fl_left">
      <ul class="clear">         
        <li>
          <a href="./voter.php" style="display: inline-block;"><i class="fa-solid fa-arrow-left"></i>&emsp;Back</a>
        
          <div class="fl_right">
          <span style="display:inline-block; border: 1px solid #fff; border-radius: 5px; padding: 3px 5px; background-color: #fff; color: #000;  margin-left: 20px;">
            <i class="fa-solid fa-star" style="color: #FFA508; margin-right: 20px;"></i><?php echo $voter["nos"]; ?>

          </span>
        </div>

        </li>
      </ul>
    </nav>

    <div id="logo" class="fl_right">
        <nav id="mainav" class="fl_right">
          <ul class="clear">

            <li><h1><a href="./voter.php">Singing Stars</a></h1></li>

            <li><a href="#">S2</a></li>
      
          </ul>
        </nav>

    </div>      

  </header>
</div>

<div class="wrapper bgded overlay">
    <section id="testimonials" class="hoc container clear"> 
   
    <h5 class="btmspace-50 underlined"> Buy <a href="#" style="color: #ff0;">Stars</a></h5>

    <label for="error"  style="color: #f00; margin-bottom: 20px; font-weight: bold;"><?php echo $error; ?></label>


<ul class="nospace group">
  <li class="one_half">
  <blockquote>
    <h1 style="text-align: center;">
        </span>1 <i class="fa-solid fa-star" style="color: #ffa508; font-size: 14px;"></i> = 1 vote
        <span>&emsp;&emsp; </span>10 <i class="fa-solid fa-star" style="color: #ffa508; font-size: 14px;"></i> per 200Ks
   
    </h1>
    <div class="row">
        <div class="col-md-6" style="text-align: center;">
          <img style="height: 200px; width: 200px;" src="./asset/img/default-qr.jpg">
          <p class="text-center">KBZPay:<span class="fw-bold ms-2"> 09500300100</span></p>
        </div>
        <div class="col-md-6 mt-3">
          <h6>Procedure:</h6>
          <ol>
            <li>send money</li>
            <li>look transaction id <span style="color: #bbb;">eg. 0100347008059471538</span></li>
            <li>enter amount & transaction id below <i class="fa-solid fa-arrow-down ms-3"></i></li>
          </ol>
          <br><br>
		    <form action="" method="post">
              <label for="amount" style="display: inline-block; margin-right: 100px">Enter Amount</label><input  name="amount" type="text" id="amount" style="color: #000; display: inline-block;"><br><br>
              <label for="tid" style="display: inline-block; margin-right: 58px">Enter Transaction Id</label><input name="tid" type="text" id="tid" style="color: #000; display: inline-block;"><br><br>
              <input type="submit" name="submit" value="Submit" style="color: #fff; background-color: #ffa508; border: 1px solid #ffa508;">

            </form> 
        </div>
    </div>

  </blockquote>
  
  </li>
  
  <li style="width: 450px; float: right; position: relative;">
      <?php 
        $stars = selectStarBySeason($database, "2");
        // var_dump($stars);
      ?>
      <div  style="width: 300px; position: absolute; right: 0;">
        <div class="swiffy-slider slider-item-snapstart slider-nav-autoplay slider-nav-autopause">
          <ul class="slider-container">
              <?php foreach ($stars as $star) {
                echo '<li style="text-align: end;"><img src="./asset/upload/'.$star["img"].'" style="max-width: 100%;height: auto;">';
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

        <br><center><span style="font-size: 16px;">Singing Stars Season 2 Top 11 Finalists</span></center>

      </div>

  </li>
  
</ul>

  </section>
</div>

<?php require_once("./asset/layout/footer.php"); ?>