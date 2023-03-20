<?php

session_start();

include("connections.php");
include("functions.php");

$u_dat = check_log($cxn);

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $f_name = $_POST['fname'];
    $l_name = $_POST['lname'];
    $ema = $_POST['email'];
    $passw = $_POST['pass'];
    $cnm = $_POST['cnum'];
    $cnam = $_POST['cname'];
    $cxp = $_POST['cexp'];
    $cvvn = $_POST['cvv'];

    if (!empty($passw) && !empty($f_name) && !empty($l_name) && !empty($ema) && !empty($cnm) && !empty($cnam) && !empty($cxp) && !empty($cvvn))
    {
        $q = "update basic set FN = '$f_name', LN = '$l_name', PW = '$passw', EM = '$ema', CNum = '$cnm', CName = '$cnam', CExp = '$cxp', CVV = '$cvvn' where ID = '$u_dat[ID]'";

        mysqli_query($cxn, $q);

        header("Location: index.php");
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
                <div style="font-size: 20px; margin: 10px; color: black; background-color: goldenrod; text-align: center;">Account Details</div>
                <label>First Name:  
                <input id="text" type="text" name="fname" value="<?php echo $u_dat['FN'];?>" placeholder="Input first name...">
                </label><br><br>
                <label>Last Name:  
                <input id="text" type="text" name="lname" value="<?php echo $u_dat['LN'];?>" placeholder="Input last name...">
                </label><br><br>
                <label>E-Mail:  
                <input id="text" type="email" name="email" value="<?php echo $u_dat['EM'];?>" placeholder="Input e-mail...">
                </label><br><br>
                <label>Password:  
                <input id="text" type="password" name="pass" value="<?php echo $u_dat['PW'];?>" placeholder="Input password...">
                </label><br><br>
                <label>Credit Card #:
                <input id="text" type="number" name="cnum" min="0000000000000001"  max="9999999999999999" value="<?php echo $u_dat['CNum'];?>" placeholder="Input credit card #...">
                </label><br><br>
                <label>Card Name:  
                <input id="text" type="text" name="cname" value="<?php echo $u_dat['CName'];?>" placeholder="Input full name...">
                </label><br><br>
                <label>Expiry Date:
                <input id="text" type="number" name="cexp" min="012022" max="129999" value="<?php echo $u_dat['CExp'];?>" placeholder="mmyyyy">
                </label><br><br>
                <label>CVV:  
                <input id="text" type="number" name="cvv" min="000" max="999" value="<?php echo $u_dat['CVV'];?>" placeholder="Input CVV (###)...">
                </label><br><br>

                <input id="button" type="submit" value="Adjust Parameters" style="width: 100%;">

                <a href="logout.php">Sign Out</a>
                <a href="index.php">Home Page</a>
            </form>
        </div>
    </body>
</html>