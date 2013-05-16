<?php
         require 'utils/connect_db.php';

         if (!isset($_SESSION['date'])) {
             $timestamp = time();
             $_SESSION['date'] = date('H:i:s', $timestamp);
             $_SESSION['fuckyou'] = 'fuckyou';
             echo $_SESSION['date'];
         } else {
             echo $_SESSION['date'];
             echo $_SESSION['fuckyou'];
         }
?>

<!doctype html>

<html>
  <head>
   <title>Pegasus</title>
   <link rel="stylesheet" href="design/design.css" type="text/css">
   <script src="http://code.jquery.com/jquery-latest.pack.js" type="text/javascript"></script>
   <script src="js/md5.js" type="text/javascript"></script>
   <script src="js/main.js" type="text/javascript"></script>
  </head>
  <body>

  <div class="fullscreen">
    <div class="flipWrapper">
        <form class="login" id="login" action="utils/login.php">
            <input type="text" placeholder="E-Mail" id="email" />
            <input type="password" placeholder="Passwort" id="password" />
            <input type="submit" class="loginButton" value="Login" />
            <a href="#" class="registerLink">Register here</a>
            <?php
                 if (isset ($_SESSION['login'])) {
                          echo '<br><a href="#" class="logout">Logout biiitch!</a>';
                 }
            ?>
        </form>
        <form class="register" id="register" action="utils/register.php">
            <input type="text" placeholder="E-Mail" id="reg_email" />
            <input type="password" placeholder="Passwort" id="reg_password" />
            <input type="submit" class="registerButton" value="Register" />
            <a href="#" class="backLink">Back</a>
        </form>
        <div class="loginBack"></div>
    </div>
    <div class="hole">

    </div>
  </div>

  </body>
</html>
<?php
         mysql_close();
?>
