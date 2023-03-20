<?php

$dbh = "localhost";
$dbu = "root";
$dbp = "";
$dbn = "log";

if (!$cxn = mysqli_connect($dbh, $dbu, $dbp, $dbn))
{
    die("ERROR!  FAILED TO ESTABLISH CONNECTION!");
}