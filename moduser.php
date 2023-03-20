<?php

session_start();

include("connections.php");
include("functions.php");

$u_dat = check_log($cxn);
if (!$u_dat)//If not logged in, then redirect to login page
{
    header("Location: login.php");
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
        $q = "update user set FN = '$f_name', LN = '$l_name', UN = '$u_name', PW = '$passw', EM = '$ema', Bio = '$bio' where ID = '$u_dat[ID]'";

        mysqli_query($cxn, $q);

        header("Location: uoitmap.php");
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
            <form method="POST" name="modify">
                <div style="font-size: 20px; margin: 10px; color: black; background-color: goldenrod; text-align: center;">Account Details</div>
                <label>First Name:  
                <input id="text" type="text" name="fname" value="<?php echo $u_dat['FN'];?>" placeholder="Input first name...">
                </label><br><br>
                <label>Last Name:  
                <input id="text" type="text" name="lname" value="<?php echo $u_dat['LN'];?>" placeholder="Input last name...">
                </label><br><br>
                <label>Username:  
                <input id="text" type="text" name="uname" value="<?php echo $u_dat['UN'];?>" placeholder="Input username [Leave blank for 'Anonymous']...">
                </label><br><br>
                <label>E-Mail:  
                <input id="text" type="email" name="email" value="<?php echo $u_dat['EM'];?>" placeholder="Input e-mail...">
                </label><br><br>
                <label>Password:  
                <input id="text" type="password" name="pass" value="<?php echo $u_dat['PW'];?>" placeholder="Input password...">
                </label><br><br>
                <label>Profile Bio:
                <input id="text" type="text" name="biog" value="<?php echo $u_dat['Bio'];?>" placeholder="Why don't you share a bit about yourself? [OPTIONAL]...">
                </label><br><br>

                <input id="button" type="submit" value="Modify Details" style="width: 100%;">

                <a href="logout.php">Sign Out</a>
                <a href="uoitmap.php">Home Page</a>
            </form>
        </div>
    </body>
</html>