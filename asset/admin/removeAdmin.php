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
     deleteAdmin($database, $id);

     header("Location: ./manageAdmin.php");
?>