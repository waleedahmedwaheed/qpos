<?php

include("lib/db.class.php");

// Open the base (construct the object):
$base = "pos";
$server = "localhost";
$user = "root";
$pass = "";
$db = new DB($base, $server, $user, $pass);

?>