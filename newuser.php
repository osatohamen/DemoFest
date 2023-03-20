<?php 

session_start();

include("connections.php");
include("functions.php");

$u_dat = check_log($cxn);
if ($u_dat)//If logged in, then redirect to home page
{
    header("Location: uoitmap.php");
    die;
}

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $f_name = $_POST['fname'];
    $l_name = $_POST['lname'];
    $u_name = $_POST['uname'];
    $passw = $_POST['pass'];
    $ema = $_POST['email'];
    $bio = $_POST['biog'];

    if (!empty($passw) && !empty($f_name) && !empty($l_name) && !empty($ema))
    {
        $q = "insert into user (FN, LN, UN, PW, EM, Bio) values ('$f_name', '$l_name', '$u_name', '$passw', '$ema', '$bio')";

        mysqli_query($cxn, $q);
        
        header("Location: login.php");
        die;
    }

    echo '<script>alert("INVALID!  PLEASE ENTER VALID INFORMATION...")</script>';
}
?>

<!DOCTYPE html>

<html>
    <head>
        <link rel = "stylesheet"  type = "text/css"  href = "newstyle.css">
        <link href = 'http://fonts.googleapis.com/css?family=Arial'  rel = 'stylesheet'  type = 'text/css'>
        <title>Sign Up</title>
    </head>

    <body>
        <div id="box">
            <form method="POST" name="signup">
                <div style="font-size: 20px; margin: 10px; color: black; background-color: goldenrod; text-align: center;">Sign Up</div>
                <label>First Name:  
                <input id="text" type="text" name="fname" placeholder="Input first name...">
                </label><br><br>
                <label>Last Name:  
                <input id="text" type="text" name="lname" placeholder="Input last name...">
                </label><br><br>
                <label>Username:  
                <input id="text" type="text" name="uname" placeholder="Input username [Leave blank for 'Anonymous']...">
                </label><br><br>
                <label>E-Mail:  
                <input id="text" type="email" name="email" placeholder="Input e-mail...">
                </label><br><br>
                <label>Password:  
                <input id="text" type="password" name="pass" placeholder="Input password...">
                </label><br><br>
                <label>Profile Bio:
                <input id="text" type="text" name="biog" placeholder="Why don't you share a bit about yourself? [OPTIONAL]...">
                </label><br><br>

                <input id="button" type="submit" value="Sign Up" style="width: 100%;">

                <a href="login.php">LogIn</a>
                <a href="uoitmap.php">Home Page</a>
            </form>
        </div>
    </body>
</html>