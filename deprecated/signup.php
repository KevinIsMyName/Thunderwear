<html>
<head>
    <title> Weather Outfit Chooser | Sign up screen </title>
    <meta name = "description" contents = "Weather Outfit Chooser | Sign up page">
    <script type="text/javascript" src="Login.js"></script>
    <style>
        .error{color: #FF0000;}
        .Login{color: darkcyan;}
        .loginbutton{color: darkcyan}
    </style>
</head>

<?php
$Email1 = $CEmail = $Pass1 = $CPass = " ";
$Email1err = $Pass1err = $CEmail1err = $CPass1err = " ";
$EmailM = $PassM = $Login = " ";
$Congrats = " ";
$ConfirmE = 0; //confirmation values different to begin with (need to be altered by conditional statements to be same)
$ConfirmP = 1;
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $Email1 = $_POST["Email1"]; //establish that the variables are the same as the strings inputed in the textbox
    $CEmail = $_POST["CEmail"];
    $Pass1 = $_POST["Pass1"];
    $CPass = $_POST["CPass"];

    if (empty($_POST["Email1"])){ //ensures that the boxes are filled - won't go through if not filled
        $Email1err = "Please enter an email";
    }
    else {
        if (!filter_var($Email1, FILTER_VALIDATE_EMAIL)) { //ensures that a valid email was put in
            $Email1err = "Please enter a valid email";
        }
        else {
            if (Strcmp($Email1, $CEmail) !== 0) { //ensures the two emails were the same
                $Email1err = "Your two emails don't match";
            }
            else {
                $ConfirmE = 2; //sets value of "Confirm Email variable"
            }
        }
    }


    if (empty($_POST["CEmail"])){ //same thing as above except without checking if they match
        $CEmail1err = "Please enter an email";
    }
    else {
        if (!filter_var($CEmail, FILTER_VALIDATE_EMAIL)) {
            $CEmail1err = "Please confirm your email";
        }
    }

//Password verification after this point
    if (empty($_POST["Pass1"])){ //Password is needed here
        $Pass1err = "Please enter a Password";
    }
    else {

        if (Strcmp($Pass1, $CPass) !== 0) {
            $Pass1err = "Your two passwords don't match"; //Make sure two passwords match
        }
        else{
            $ConfirmP = 2; //Sets value of "Confirm password variable"
        }
    }

    if (empty($_POST["CPass"])){
     $CPass1err = "Please confirm your password";
    }
    else {


    }
 if($ConfirmP == $ConfirmE){ //only works if both conditional statements are fully fulfilled
     $Congrats = "Congrats you made an account! ";
     $PassM = "Your Password is $Pass1";
     $EmailM = "Your Email for this account is $Email1";
     $Login = "<html><button class = 'loginbutton' ><a href='../outfit.html'>Would you like to log?</a></button></html>";
     }
 else{
 }
}

?>

<h1 id = "Signup">Create an account with Thunderwear!</h1>
<span class = "Login"> Already have an account?</span>
<span class = "Login"><u><strong><a href = "Login.php">Login</a></strong></u></span>
<hr>
<body>
    <form method = "post" action = "signup.php">
    <label for = "Email1"><b>Email:</b></label>
    <input type = "text" name = "Email1" placeholder="Email" >
        <span class = "error">*<?php echo $Email1err?></span>
    <br><br>
    <Label for = "CEmail"><b>Confirm Email:</b></Label>
    <input type = "text" name = "CEmail" placeholder=" Confirm Email">
        <span class = "error">*<?php echo $CEmail1err?></span>
    <br><br>
<hr>
    <label for = "Pass1"><b>Password:</b></label>
    <input type = "text" name = "Pass1" placeholder="Password" >
        <span class = "error">*<?php echo $Pass1err?></span>
    <br><br>
    <Label for = "CPass"><b>Confirm Password:</b></Label>
    <input type = "text" name = "CPass" placeholder=" Confirm Password">
        <span class = "error">*<?php echo $CPass1err?></span>
        <br>
        <button type = "submit">Sign up!</button>
</form>
    <?php echo $Congrats;
    echo "<br>"?>
    <?php echo $EmailM;
    echo "<br>"; ?>
    <?php echo $PassM;
    echo "<br>";?>
    <?php echo $Login;
    echo "<br>";?>
</body>
</html>