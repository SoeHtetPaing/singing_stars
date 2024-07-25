<?php 
    //select section
    function selectAdminByEmail ($database, $email, $password) { 
        $sql = "select * from admin where email='$email' and password='$password';";
        $admin = $database->query($sql)->fetch_assoc();
    
        return $admin;
    }

    function selectAdmin ($database) { 
        $sql = "select * from admin;";
        $admin = $database->query($sql);
    
        return $admin;
    }

    function searchAdmin ($database, $key) { 
        $sql = "select * from admin where email like '%$key%';";
        $admin = $database->query($sql);
    
        return $admin;
    }

    function selectVoterByEmail ($database, $email, $password) { 
        $sql = "select * from voter where email='$email' and password='$password';";
        $voter = $database->query($sql)->fetch_assoc();
    
        return $voter;
    }

    function selectVoterByExist ($database, $email) { 
        $sql = "select * from voter where email='$email';";
        $voter = $database->query($sql)->fetch_assoc();
    
        return $voter;
    }

    function selectAdminByExist ($database, $email) { 
        $sql = "select * from admin where email='$email';";
        $admin = $database->query($sql)->fetch_assoc();
    
        return $admin;
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

    function selectVoter ($database) { 
        $sql = "select * from voter;";
        $voter = $database->query($sql);
    
        return $voter;
    }

    function searchVoter ($database, $key) { 
        $sql = "select * from voter where email='$key' or vname like '$key%' or vname like '%$key' or vname like '%$key%';";
        $voter = $database->query($sql);
    
        return $voter;
    }

    function selectStar ($database) { 
        $sql = "select * from star;";
        $star = $database->query($sql);
    
        return $star;
    }

    function selectStarByVno ($database, $vno) { 
        $sql = "select * from star where vno = '$vno';";
        $star = $database->query($sql)->fetch_assoc();
    
        return $star;
    }

    function searchStar ($database, $key) { 
        $sql = "select * from star  where name ='$key' or name like '$key%' or name like '%$key' or name like '%$key%';";
        $star = $database->query($sql);
    
        return $star;
    }

    function selectStarById ($database, $sid) { 
        $sql = "select * from star where id='$sid';";
        $star = $database->query($sql)->fetch_assoc();
    
        return $star;
    }

    function selectSeason ($database) {
        $sql = "select * from season order by sname desc;";
        $seasons = $database->query($sql);

        return $seasons;
    }
    function selectSeasonByName ($database, $sname) {
        $sql = "select * from season where sname='$sname';";
        $season = $database->query($sql)->fetch_assoc();

        return $season;
    }

    function selectSeasonById ($database, $sid) {
        $sql = "select * from season where sid='$sid';";
        $season = $database->query($sql)->fetch_assoc();

        return $season;
    }

    function selectStage ($database) {
        $sql = "select * from stage order by id desc";
        $stage = $database->query($sql);

        return $stage;
    }

    function searchStage ($database, $key) { 
        $sql = "select * from stage where song ='$key' or song like '$key%' or song like '%$key' or song like '%$key%' order by id desc;";
        $stage = $database->query($sql);
    
        return $stage;
    }

    function selectLevel ($database) {
        $sql = "select * from level order by lid desc;";
        $level = $database->query($sql);

        return $level;
    }

    function selectLevelById ($database, $lid) {
        $sql = "select * from level where lid='$lid';";
        $level = $database->query($sql)->fetch_assoc();

        return $level;
    }

    function selectLevelBySeason ($database, $sid) {
        $sql = "select * from level where sid='$sid';";
        $level = $database->query($sql);

        return $level;
    }

    function filterData($database, $sql) {
        $data = $database->query($sql);

        return $data;
    }

    // end select

    //insert section
    function insertAdmin($database, $email, $password) {
        $sql = "insert into admin(email,password) values('$email','$password');";
        $success = $database->query($sql);

        return $success;
    }

    function insertSeason($database, $name, $startdate, $enddate) {
        $sql = "insert into season(sname,startdate,enddate) values('$name','$startdate','$enddate');";
        $success = $database->query($sql);

        return $success;
    }


    function insertVoter($database, $name, $email, $phone, $password, $img, $nos){
        $sql = "insert into voter(vname,email,phone,password,img, nos) values('$name','$email','$phone','$password', '$img', '$nos');";
        $success = $database->query($sql);

        return $success;
    }

    function insertStar($database, $name, $vno, $age, $hometown, $img, $sid){
        $sql = "insert into star(name,vno,age,hometown,img,sid) values('$name','$vno','$age','$hometown','$img','$sid');";
        $success = $database->query($sql);

        return $success;
    }

    function insertLevel ($database, $lname, $description, $sid) {
        $sql = "insert into level(lname,description,sid) values ('$lname','$description','$sid');";
        $success = $database->query($sql);

        return $success;
    }

    function insertStage ($database, $sno, $star, $song, $lid, $vstatus, $total_nov, $result) {
        $sql = "insert into stage(sno,sid,song,lid,vstatus,total_nov, result) values ('$sno','$star','$song','$lid','$vstatus', '$total_nov', '$result');";
        $success = $database->query($sql);

        return $success;
    }

    function insertVoting ($database,  $id, $sid, $vid, $vdate, $nov) {
        $sql = "insert into voting(id,sid,vid,vdate,nov) values ('$id','$sid','$vid','$vdate','$nov');";
        $success = $database->query($sql);

        return $success;
    }

    function insertBooking ($database, $bid, $vid, $bdate, $nos, $bill, $transaction, $status) {
        $sql = "insert into booking_star values ('$bid','$vid','$bdate','$nos','$bill','$transaction','$status');";
        $success = $database->query($sql);

        return $success;
    }
    

    //insert end

    //update start
    function updateAdmin($database, $id, $email, $password) {
        $sql = "update admin set email='$email',password='$password' where id='$id';";
        $success = $database->query($sql);

        return $success;
    }

    function updateVoter($database, $id, $name, $email, $phone, $password){
        $sql = "update voter set vname='$name',email='$email',phone='$phone',password='$password' where id='$id';";
        $success = $database->query($sql);

        return $success;
    }

    function updateStar($database, $id, $name, $vno, $age, $hometown, $img, $sid){
        $sql = "update star set name='$name',vno='$vno',age='$age',hometown='$hometown',img='$img',sid='$sid' where id='$id';";
        $success = $database->query($sql);

        return $success;
    }

    function updateStarWithoutPhoto($database, $id, $name, $vno, $age, $hometown, $sid){
        $sql = "update star set name='$name',vno='$vno',age='$age',hometown='$hometown',sid='$sid' where id='$id';";
        $success = $database->query($sql);

        return $success;
    }

    function updateVotingStatus($database, $id, $vstatus){
        $sql = "update stage set vstatus='$vstatus' where id='$id';";
        $success = $database->query($sql);

        return $success;
    }

    function updateStage($database, $id, $sno, $sid, $song, $lid, $result){
        $sql = "update stage set sno='$sno',sid='$sid',song='$song',lid='$lid',result='$result' where id='$id';";
        $success = $database->query($sql);

        return $success;
    }

    function updateStarInVoter($database, $vid, $nos){
        $sql = "update voter set nos='$nos' where id='$vid'";
        $success = $database->query($sql);

        return $success;
    }

    function updateStarInStage($database, $sid, $nos){
        $sql = "update stage set total_nov='$nos' where id='$sid';";
        $success = $database->query($sql);

        return $success;
    }

    function updateBookingStatus($database, $id, $status){
        $sql = "update booking_star set status='$status' where id='$id';";
        $success = $database->query($sql);

        return $success;
    }

    function updateProfileInVoter($database, $vid, $img) {
        $sql = "update voter set img='$img' where id='$vid'";
        $success = $database->query($sql);

        return $success;
    }

    //end update

    //delete section

    function deleteAdmin ($database, $id) {
        $sql = "delete from admin where id='$id';";
        $success = $database->query($sql);

        return $success;
    }

    function deleteVoter ($database, $id) {
        $sql = "delete from voter where id='$id';";
        $success = $database->query($sql);

        return $success;
    }

    function deleteStar ($database, $id) {
        $sql = "delete from star where id='$id';";
        $success = $database->query($sql);

        return $success;
    }

    //delete end