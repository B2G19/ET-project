<?php

    require 'lang.php';
   $is_invalid = false;

    if ($_SERVER["REQUEST_METHOD"] === "POST"){
        $mysqli = require __DIR__ . "/php/database.php";
        $sql = sprintf("SELECT * FROM gebruiker
                        WHERE mail = '%s'",
                        $mysqli->real_escape_string($_POST["mail"]));

        $result = $mysqli->query($sql);
        $user = $result->fetch_assoc();

        if ($user){
            if (password_verify($_POST["wachtwoord"], $user["password"])){

                session_start();
                session_regenerate_id();

                $_SESSION["user_id"] = $user["id"];

                header("location: maps.php");
                exit();
            }
        }

        $is_invalid = true;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author" content="Meskens Xander">
    <meta name="keywords" content="Electro-Test, planning, log in">
    <meta name="description" content="Tool for employees of Electro-Test.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Electro-Test | Login</title>
    <link rel="stylesheet" type="text/css" href="css/uikit.css">
    <link rel="stylesheet" type="text/css" href="css/uikit.min.css">
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <script src="js/uikit.js"></script>
    <script src="js/uikit-icons.min.js"></script>
    <script src="js/js.js"></script>
    <link rel="icon" type="image/x-icon" href="images/logo2.png">

</head>
<body>

<!-- Electro-Test Logo -->
<div>
    <img src="images/logo.png" class="uk-align-center">
</div>

<!-- log in form -->
<div class="uk-card uk-card-body uk-card-login uk-align-center uk-width-1-2@m uk-width-1-3@s uk-margin-xlarge-bottom">
    <h1 class="uk-card-title uk-text-center uk-text-bolder uk-text-uppercase"><?= __('Inloggen')?></h1>
    <form method="post">
        <div class="input-box">
        <label for="email"><?= __('E-mailadres')?>:</label>
        <input type="email" id="email" name="mail" class="uk-input" value="<?= htmlspecialchars($_POST["mail"] ?? "") ?>" required>
        </div>
        <br>
        <div class="input-box">
            <label for="pw"><?= __('Wachtwoord')?> :<img class="pwshowhide" src="images/eye-close.png" id="eyeicon"></label>
            <input type="password" id="pw" name="wachtwoord" class="uk-input" required>
        </div>
        <br>
        <button class="uk-align-center"><?= __('Log in')?></button>

        <div>
            <?php if ($is_invalid): ?>
                <em class="uk-text-center uk-text-large"><?= __('Foutieve login')?></em>
            <?php endif; ?>
        </div>

    </form>
</div>

<!-- Language -->
<footer class="uk-section-secondary uk-light uk-margin-medium-top">
    <div class="uk-container">
        <div class="uk-child-width-1-1@m uk-margin-small-top uk-margin-small-bottom" uk-grid>

            <div>
                <p class="uk-text-uppercase"><?= __('Talen')?></p>
                <div class="uk-column-1-3">
                    <p><a href="index.php?lang=fr"> Français</a></p>
                    <p><a href="index.php?lang=nl"> Nederlands</a></p>
                    <p><a href="index.php?lang=en"> English</a></p>
                </div>
            </div>

        </div>
    </div>
</footer>

<script>
    let eyeicon = document.getElementById("eyeicon");
    let password = document.getElementById("pw");

    eyeicon.onclick = function (){
        if(password.type == "password"){
            password.type = "text";
            eyeicon.src = "images/eye-open.png"
        }else{
            password.type = 'password';
            eyeicon.src = "images/eye-close.png"
        }
    }
</script>

</body>
</html>