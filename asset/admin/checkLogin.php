<!DOCTYPE html>
<html>
    <head>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cutive+Mono&family=PT+Sans+Narrow:wght@400;700&family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap" rel="stylesheet">

        <title>Singing Stars</title>

        <style>

            body {
                font-family: 'Source Serif 4';
                background-image: url(../img/access-denied.png);
                background-size: cover;
            }

        </style>
    </head>
<body>

<?php require_once("../database/connection.php"); ?>
<?php require_once("../database/operation.php"); ?>
<?php
//session_start();
ini_set ("display_errors", "1");
error_reporting(E_ALL);

ob_start();

if(isset($_POST['myusername'])) $myusername=$_POST['myusername']; else $myusername = null;
if(isset($_POST['mypassword'])) $mypassword=$_POST['mypassword']; else $mypassword = null;
if(isset($mypassword)) $encrypted_mypassword=md5($mypassword); else $encrypted_mypassword = null;

$admin = selectAdminByEmail($database, $myusername, $encrypted_mypassword);

if($admin != null){
    
                if(isset($_POST['remember']))
                {
                    setcookie('$email',$_POST['myusername'], time()+30*24*60*60); // 30 days
                    setcookie('$pass', $_POST['mypassword'],time()+30*24*60*60); // 30 days
                    $_SESSION['curname']=$myusername;
                    $_SESSION['curpass']=$mypassword;


     				$_SESSION['admin_id'] = $admin['id'];

                    header("Location: ./admin.php");
                    exit;
                }
                else
                {
                    $log1=11;
                    $_SESSION['log1'] = $log1;
                    $_SESSION['curname']=$myusername;
                    $_SESSION['curpass']=$mypassword;

     				$_SESSION['admin_id'] = $admin['id'];

                    header("Location: ./admin.php");
                    exit;
                }
            

}
else {
    echo "<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>";
    echo '<center> <h3 style="color: rgb(106,107,108);">Access to support.singingstars.com was denied!<br></h3></center>';
    echo '<center> <h5 style="color: rgb(106,107,108); font-weight: bold;">You don\'t have authorization to view this page. <a href="./index.php">Try login again?</a> </h5></center>';

}

ob_end_flush();

?> 




</body>
</html>
