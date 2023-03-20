<?php

session_start();

include("connections.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $ema = $_POST['email'];
    $passw = $_POST['pass'];

    if(!empty($ema) && !empty($passw))
    {
        $q = "select * from basic where EM = '$ema' limit 1";

        $res = mysqli_query($cxn, $q);

        if ($res)
        {
            if($res && mysqli_num_rows($res) > 0)
            {
                $u_dat = mysqli_fetch_assoc($res);

                if ($u_dat['PW'] === $passw)
                {
                    $_SESSION['ID'] = $u_dat['ID'];

                    header("Location: index.php");
                    die;
                }
            }
        }
    }
    
    echo '<script>alert("INVALID!  PLEASE ENTER VALID INFORMATION...")</script>';
}
?>

<!DOCTYPE html>

<html>
    <head>
        <link rel = "stylesheet"  type = "text/css"  href = "logstyle.css">
        <link href = 'http://fonts.googleapis.com/css?family=Arial'  rel = 'stylesheet'  type = 'text/css'>
        <title>Sign In</title>
    </head>

    <body>
        <div id="box">
            <form method="POST" name="login">
                <div style="font-size: 20px; margin: 10px; color: black; text-align: center; background-color: goldenrod;">Sign In</div>
                <label>E-Mail:  
                <input id="text" type="email" name="email" placeholder="Input email address...">
                </label><br><br>
                <label>Password:  
                <input id="text" type="password" name="pass" placeholder="Input password...">
                </label><br><br>
                <input id="button" type="submit" value="Sign In" style="width: 100%;">

                <a href="newuser.php">Sign Up</a>
                <a href="index.php">Home Page</a>
            </form>
        </div>
    </body>
</html>