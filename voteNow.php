<?php require_once("./asset/database/connection.php"); ?>
<?php require_once("./asset/database/operation.php"); ?>
<?php  
  if(empty($_SESSION['member_id'])){
    header("location: ./accessDenied.php");
  }

  $stars = selectStarBySeason($database, "2");

  var_dump($stars);
  
     if (isset($_POST['Submit']))
     {
    
       $stars = addslashes( $_POST['stars'] ); 

       echo $stars;
    
    
       $result = $mysqli->query("SELECT * FROM tbCandidates WHERE candidate_position='$position'")
       or die(" There are no records at the moment ... \n"); 
    
     }
     else
     // do something
  
?>
