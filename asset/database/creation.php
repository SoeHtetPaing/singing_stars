<?php
    function createTable ($database) {
        $sql = "create table if not exists admin (id int primary key auto_increment, email varchar(100), password text);";
        if ($database->query($sql) === false) return false;

        $sql = "create table if not exists season (sid int primary key auto_increment, sname varchar(100), startdate date, enddate date);";
        if ($database->query($sql) === false) return false;

        $sql = "create table if not exists level (lid int primary key auto_increment, lname varchar(100), description text, sid int not null, foreign key (sid) references season (sid));";
        if ($database->query($sql) === false) return false;

        $sql = "create table if not exists voter (id int primary key auto_increment, vname varchar(100), email varchar(100), phone varchar(50), password text, img varchar(100), nos int);";
        if ($database->query($sql) === false) return false;

        $sql = "create table if not exists star (id int primary key auto_increment, name varchar(100), vno varchar(100), age int, hometown varchar(100), img varchar(100), sid int not null,  foreign key (sid) references season (sid));";
        if ($database->query($sql) === false) return false;

        $sql = "create table if not exists stage (id int primary key auto_increment, sno int, sid int, song varchar(100), lid int not null, vstatus int, total_nov int, result varchar(100), foreign key (sid) references star (id),foreign key (lid) references level (lid));";
        if ($database->query($sql) === false) return false;

        $sql = "create table if not exists voting (id varchar(225) not null primary key, sid int not null, vid int not null, vdate datetime, nov int, foreign key (sid) references stage (id), foreign key (vid) references voter (id));";
        if ($database->query($sql) === false) return false;

        $sql = "create table if not exists booking_star (id varchar(255) not null primary key, vid int not null, bdate datetime, nos int, bill int, transaction varchar(100), status int, foreign key (vid) references voter (id));";
        if ($database->query($sql) === false) return false;

    }
    
    createTable($database);