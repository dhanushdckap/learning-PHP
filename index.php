<?php

require "functions.php";
//require "route.php";
require "Database.php";

$config = require ("config.php");

$db = new database($config);

$id = $_GET['id'];
$data = $db->query("select * from user_data where id = {$id}")->fetchAll();



dumpAndDie($data);