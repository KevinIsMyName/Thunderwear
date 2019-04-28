<html>
<head>
    <title> Weather Outfit Chooser | Login screen </title>
    <meta name = "description" contents = "Weather Outfit Chooser | Login page">
    <script type="text/javascript" src="Login.js"></script>
    <style>
        .error {color: #FF0000;}
        .random{color: aqua;}
        .signup{color: darkcyan;
        }
    </style>
</head>

<?php
$email = $pass = $comment =  " ";
$emailerr = $passerr = $commenterr = " ";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["email"])){
        $emailerr = "bish enter your email";
    }
    else{
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailerr = "Bruh give me a real email";
        }

    }

    if(empty($_POST["pass"])){
        $passerr = "bish you do have a password yo";
    }
    else{
        $pass = test_input($_POST["pass"]);
    }

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h1 id = "login"> Login Screen </h1>
<span class = "signup"> Don't have an account?</span>
<span class = "signup"><u><strong><a href = "signup.php">Sign up</a></strong></u></span>

<form method = "post" action= "login.php">
    <label for = "email"><b>Email</b></label>
    <input type = "text" placeholder= "Email" name = "email" value = "<?php echo $email?>">
    <span class = "error">* <?php echo $emailerr;?></span>
    <br><br>
    <!--Creates username input for site-->
    <label for = "pass"><b>Password</b></label>
    <input type = "text" placeholder = "password" name = "pass" value = "<?php echo $pass ?>">
    <span class = "error">* <?php echo $passerr;?></span>
    <!--Creates password input for site-->
    <br><br>
    <button type = "submit">Login</button>
    <!--Submit button for login-->
    <label> <input type = "checkbox" checked = "checked" name = "remember"> Remember me </label>
    <!--Lets people be remembered when logged in-->
</form>
<hr>

<h2>Your Input:</h2>

Your Email is <?php echo $email;
echo "<br>"; ?>
Your password is <?php echo $pass;
echo "<br>";?>
<?php echo $comment;
echo "<br>";?>

<h3>Random buttons because why not</h3>
<p class = "random" id="paragraph">hiiiii</p>
<p class = "random" id = "test"> I love you </p>
<p class = "random" id = "test2"> I love CS</p>
<button type="button" onclick="testing()">Try it</button>

<button type = "button" onclick = "help()">Don't touch this</button>

<button type = "button" onclick="testing2()">Why are there so many buttons</button>
</html>
<hr>