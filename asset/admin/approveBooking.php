<?php require_once("../database/connection.php"); ?>
<?php require_once("../database/operation.php"); ?>

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

     $id = $_GET["id"];
    //  echo $id;
 
    $sql = "select * from booking_star where id='$id';";
    $booking = filterData($database, $sql)->fetch_assoc();
    // var_dump($booking);
    $vid = $booking["vid"];
    $b_nos = $booking["nos"];

    $voter = selectVoterById($database, $vid);
    var_dump($voter);

    $has_nos = $voter["nos"];
    $has_nos += $b_nos;
    // echo $has_nos;
    
    updateBookingStatus($database, $id, 1);
    updateStarInVoter($database, $vid,$has_nos);

     

     header("Location: ./admin.php");
?>