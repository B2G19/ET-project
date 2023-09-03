
<?php

require 'lang.php';

if (isset($_SESSION["user_id"])){
    $mysqli = require __DIR__ . "/php/database.php";

    $sql = "SELECT * FROM gebruiker
            WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author" content="Meskens Xander">
    <meta name="keywords" content="Electro-Test, planning, maps, keurders, melsbroek">
    <meta name="description" content="Tool for employees of Electro-Test.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Electro-Test | Maps</title>
    <link rel="stylesheet" type="text/css" href="css/uikit.css">
    <link rel="stylesheet" type="text/css" href="css/layout.css" defer>
    <script href="js/uikit.js"></script>
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.1/mapbox-gl-directions.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.1/mapbox-gl-directions.css" type="text/css">
    <script src="js/map.js" defer></script>
</head>
<body>

<!-- filter -->
<div class="uk-card uk-card-default uk-card-body uk-width-1-4 uk-align-right hi">
    <div class="uk-link-reset">
        <ul>
            <a>gas</a>&nbsp; - &nbsp;
            <a>cerga</a>&nbsp; - &nbsp;
            <a>elek</a>&nbsp; - &nbsp;
            <a>brand</a>&nbsp; - &nbsp;
            <a>water</a>&nbsp; - &nbsp;
        </ul>
    </div>
</div>

<!-- Keurders -->
<div>

</div>

<!-- maps -->
<div>
    <div id='map'></div>
</div>

<!-- Language -->
<footer class="uk-section-secondary uk-light uk-margin-medium-top">
    <div class="uk-container">
        <div class="uk-child-width-1-1@m uk-margin-small-top uk-margin-small-bottom" uk-grid>

            <div>
                <p class="uk-text-uppercase"><?= __('Talen')?></p>
                <div class="uk-column-1-4">
                    <p><a href="maps.php?lang=fr"> Français</a></p>
                    <p><a href="maps.php?lang=nl"> Nederlands</a></p>
                    <p><a href="maps.php?lang=en"> English</a></p>
                    <div class="hi uk-align-right">
                        <?php if (isset($user)) ?>
                        <p><?= __('Ingelogd als: ')?><?= htmlspecialchars($user["username"]) ?></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</footer>

</body>
</html>