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
        //  header("location: ./checkLogin.php"); /* here goes the page when destroy the cookies */
        echo '<script>window.location="./checkLogin.php"</script>';
        exit;
      }
?>
<?php
$error = "";
$key = "";
$sql = "select * from booking_star order by bdate desc;";
$booking = filterData($database, $sql);
// var_dump($booking);

if (isset($_GET['submit'])) {
  $key = $_GET['searchKey'];

  if($key != "") {
    $sql = "select * from booking_star where transaction like '%$key' or transaction like '$key%' or transaction like '%$key%' or bdate like '%$key' or bdate like '$key%' or bdate like '%$key%';";
    $booking = filterData($database, $sql);
  } else {
    $sql = "select * from booking_star order by bdate desc;";
    $booking = filterData($database, $sql);
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
        <li class="active"><a href="./admin.php">Admin Panel</a></li>
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
    <h5 class="btmspace-80 underlined"> Welcome back <a href="#" style="color: #ff0;">Admin</a></h5>

    <label for="error"  style="color: #f00; margin-bottom: 20px; font-weight: bold;"><?php echo $error; ?></label>

<ul class="nospace group">
  <li>
    <blockquote>
        <div id="container">
            <p>
                <span style="font-size: 16px; margin-right: 20px;">All Bookings</span>
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
                        <th style="padding: 15px 10px;">Actions</th>
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
												          <button style="border: 1px solid #26C808; display: inline-block;">
                                    <a href="./approveBooking.php?id=<?php echo $value['id'] ?>" style="color: #26C808; display: inline-block;"><i class="fa-solid fa-circle-check"></i> Approve</a>
                                  </button>
                                  <button style="border: 1px solid #CD081B; display: inline-block;">
                                    <a href="./rejectBooking.php?id=<?php echo $value['id'] ?>" style="color: #CD081B; display: inline-block;"><i class="fa-solid fa-circle-xmark"></i> Reject</a>
                                  </button>
												          <?php }else if ($status == 1) { ?>
												          	<p style="color: #26C808;"><i class="fa-solid fa-circle-check"></i> Approved</p>
												          <?php }else if ($status == 2) { ?>
												          	<p style="color: #CD081B;"><i class="fa-solid fa-circle-xmark"></i> Rejected</p>
												          <?php }?>
                                  <div style="display: inline-block; width: 100px;"></div>
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



<?php require_once("../layout/admin-footer.php"); ?>