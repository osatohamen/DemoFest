<?php

session_start();

if (isset($_SESSION['ID']))
{
    unset($_SESSION['ID']);
}

header("Location: uoitmap.php");
die;