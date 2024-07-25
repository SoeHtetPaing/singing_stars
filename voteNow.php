<?php require_once("./asset/database/connection.php"); ?>
<?php require_once("./asset/database/operation.php"); ?>
<?php  
  if(empty($_SESSION['member_id'])){
    header("location: ./accessDenied.php");
  }

  $vid = $_GET["vid"];
  $sid = $_GET["sid"];
  $nos = $_GET["nos"];

  $voter = selectVoterById($database, $vid);
  // var_dump($voter);

  $exist_nos = $voter["nos"];

  if($nos <= $exist_nos) {
    $exist_nos -= $nos;
    // echo $exist_nos;
    $sql = "select * from stage where id='$sid';";
    $stage = filterData($database, $sql)->fetch_assoc();
    // var_dump($stage);
    $total_nos = $stage["total_nov"];
    $total_nos += $nos;
    // echo($total_nos);

    $id = uniqid();
    // echo $id;
    date_default_timezone_set('Asia/Yangon');
    $bdate = date("Y-m-d H:i:s");
    // echo $bdate;
    
    insertVoting($database, $id, $sid, $vid, $bdate, $nos);
    updateStarInVoter($database, $vid, $exist_nos);
    updateStarInStage($database, $sid, $total_nos);

    echo '<script>alert("You vote '.$nos.' stars to \''.$stage["song"].'\'. Thanks!")</script>';
		echo '<script>window.location="./voter.php"</script>';
  } else {
    echo '<script>alert("You have '.$exist_nos.' stars! Insurficient voting. Buy stars now!")</script>';
		echo '<script>window.location="./voter.php"</script>';
  }
  
?>
