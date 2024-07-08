<?php 
    //select section
    function selectVoterByEmail ($database, $email, $password) { 
        $sql = "select * from voter where email='$email' and password='$password';";
        $voter = $database->query($sql)->fetch_assoc();
    
        return $voter;
    }

    function selectVoterById ($database, $id) { 
        $sql = "select * from voter where id='$id';";
        $voter = $database->query($sql)->fetch_assoc();
    
        return $voter;
    }

    function selectStarBySeason ($database, $season) {
        $sql = "select * from star where sid='$season';";
        $stars = $database->query($sql);
    
        return $stars;
    }

    // end select

    //insert section
    
    function insertSeason($database, $name, $startdate, $enddate) {
        $sql = "insert into season(sname,startdate,enddate) values('$name','$startdate','$enddate');";
        $success = $database->query($sql);

        return $success;
    }


    function insertVoter($database, $name, $email, $vid, $password){
        $sql = "insert into voter(vname,email,vid,password) values('$name','$email','$vid','$password');";
        $success = $database->query($sql);

        return $success;
    }

    function insertStar($database, $name, $vno, $age, $hometown, $img, $sid){
        $sql = "insert into star(name,vno,age,hometown,img,sid) values('$name','$vno','$age','$hometown','$img','$sid');";
        $success = $database->query($sql);

        return $success;
    }

    //insert end

    //update start
    function updateVoter($database, $name, $email, $vid, $password, $id){
        $sql = "update voter set vname='$name',email='$email',vid='$vid',password='$password' where id='$id';";
        $success = $database->query($sql);

        return $success;
    }

    //end update