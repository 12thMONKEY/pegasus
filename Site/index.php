<!doctype html>

<html>
  <head>
   <link rel="stylesheet" href="design/design.css" type="text/css">
   <script src="http://code.jquery.com/jquery-latest.pack.js" type="text/javascript"></script>
   <script type="text/javascript">
   <!---
   $(document).ready(function() {
         $('.loginButton').click( function()
                 {
                         $('.flipWrapper').addClass('fade');
                         return false;
                 });
         });

   -->
   </script>

  </head>
  <body>
  <div class="fullscreen">
    <div class="flipWrapper">
        <form class="login" id="login">
            <input type="text" placeholder="E-Mail"/>
            <input type="password" placeholder="Passwort"/>
            <input type="submit" class="loginButton" value="Login" />
        </form>
        <div class="loginBack"></div>
    </div>
    <div class="hole">

    </div>
  </div>

  </body>
</html>