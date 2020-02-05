<?php
//$obj = new PDO("mysql:host=". HOST.";dbname=".DB, USER,PASS);
$obj = new PDO("mysql:host=localhost; dbname=bansach", "root",'');
$obj->query("set names utf8");
