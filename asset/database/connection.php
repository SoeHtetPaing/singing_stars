<?php
    session_start();

    $database= new mysqli("localhost","root","","singing_stars");
    if ($database->connect_error){
        die("Connection failed:  ".$database->connect_error);
    }