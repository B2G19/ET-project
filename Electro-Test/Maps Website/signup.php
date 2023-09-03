<?php
    require 'lang.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="js/js.js" defer></script>

    <link rel="icon" type="image/x-icon" href="images/logo2.png">
</head>
<body>

  <h1><?= __('Registreer')?></h1>

  <form action="php/process-signup.php" method="post" id="signup" novalidate>

      <div>
        <label for="name"><?= __('Naam')?>: </label>
        <input type="text" id="name" name="name" required>
      </div>

      <div>
        <label for="email"><?= __('Email')?>: </label>
        <input type="email" id="email" name="email" required>
      </div>

      <div>
        <label for="password"><?= __('Wachtwoord')?>: </label>
        <input type="password" id="password" name="password" required>
      </div>

      <div>
        <label for="password_confirmation"><?= __('Herhaal Wachtwoord')?>: </label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
      </div>

      <button><?= __('Registreer')?></button>
  </form>

  <p><?= __('Ga naar')?> <a href="index.php"><?= __('Inlog Pagina')?></a> </p>

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

</body>
</html>