<?php
function check_log($cxn)
{
    if(isset($_SESSION['ID']))
    {
        $id = $_SESSION['ID'];
        $q = "select * from basic where ID = '$id' limit 1";

        $res = mysqli_query($cxn, $q);
        if($res && mysqli_num_rows($res) > 0)
        {
            $u_dat = mysqli_fetch_assoc($res);

            return $u_dat;
        }
    }
}