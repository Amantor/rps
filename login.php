<?php 
if ( isset($_POST['cancel'] ) ) {
    header("Location: index.php");
    return;
}

$stored_hash = '218140990315bb39d948a523d61549b4';  

$failure = false;

if ( isset($_POST['who']) && isset($_POST['pass']) ) {
    if ( strlen($_POST['who']) < 1 || strlen($_POST['pass']) < 1 ) {
        $failure = "User name and password are required";
    } else {
        $check = hash('md5', $_POST['pass']);
        if ( $check == $stored_hash ) {
            
            header("Location: game.php?name=".urlencode($_POST['who']));
            return;
        } else {
            $failure = "Incorrect password";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<?php require_once "bootstrap.php"; ?>
<title>Alfonso Mantas - Login Page - cfe1b98c</title>
</head>
<body>
<div class="container">
<h1>Please Log In</h1>
<?php
if ( $failure !== false ) {
    echo('<p style="color: red;">'.htmlentities($failure)."</p>\n");
}
?>
<form method="POST">
<label for="nam">User Name</label>
<input type="text" name="who" id="nam"><br/>
<label for="id_1723">Password</label>
<input type="text" name="pass" id="id_1723"><br/>
<input type="submit" value="Log In">
<input type="submit" name="cancel" value="Cancel">
</form>
<p>
For a password hint, view source and find a password hint
in the HTML comments.
<!-- Hint: The password is the four character sound a cat
makes (all lower case) followed by 123. -->
</p>
</div>
</body>