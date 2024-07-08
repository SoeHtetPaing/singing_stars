<?php
    function createTable ($database) {
        $sql = "create table if not exists season (sid int primary key auto_increment, sname varchar(100), startdate date, enddate date);";
        if ($database->query($sql) === false) return false;

        $sql = "create table if not exists level (lid int primary key auto_increment, lname varchar(100), description text, sid int not null, foreign key (sid) references season (sid));";
        if ($database->query($sql) === false) return false;

        $sql = "create table if not exists voter (id int primary key auto_increment, vname varchar(100), email varchar(100), vid varchar(100), password text);";
        if ($database->query($sql) === false) return false;

        $sql = "create table if not exists star (id int primary key auto_increment, name varchar(100), vno varchar(100), age int, hometown varchar(100), img varchar(100), sid int not null,  foreign key (sid) references season (sid));";
        if ($database->query($sql) === false) return false;

        // $sql = "create table if not exists booking (bid varchar(225) not null primary key, rid int not null, cid int not null, makedate date, maketime varchar(50), name varchar(100), phone varchar(15), bdate date, btime varchar(50), bill int, transaction varchar(100), status int, reject int, foreign key (rid) references restaurant (id), foreign key (cid) references customer (id));";
        // if ($database->query($sql) === false) return false;

        // $sql = "create table if not exists booking_chair (id int primary key auto_increment, bid varchar(225) not null, cid int not null, cno varchar(100), foreign key (bid) references booking (bid), foreign key (cid) references restaurant_chair (cid));";
        // if ($database->query($sql) === false) return false;

        // $sql = "create table if not exists booking_menu (id int primary key auto_increment, bid varchar(225) null, mid int not null, qty int, foreign key (bid) references booking (bid), foreign key (mid) references restaurant_menu (mid));";
        // if ($database->query($sql) === false) return false;

        // $sql = "create table if not exists page_user (email varchar(100) primary key not null, urole char(1));";
        // if ($database->query($sql) === false) return false;

    }
    
    createTable($database);