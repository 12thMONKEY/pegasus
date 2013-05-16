var PGS = {
    login: function(action, email, password) {
         password = MD5(password);
         $.post(action, {email: email, password: password}, function(data) {
               alert(data);
         });
    },

    register: function(action, email, password) {
         password = MD5(password);
         $.post(action, {email: email, password: password}, function(data) {
               alert(data);
         });
    }
}

$(document).ready(function() {
    $('.loginButton').click( function(){
       $('.flipWrapper').addClass('fade');

       var action = $('#login').attr('action');
       var email = $('#email').val();
       var password = $('#password').val();

       PGS.login(action, email, password);

       return false;
    });

    $('.registerButton').click( function(){
       //$('.flipWrapper').addClass('fade');

       var action = $('#register').attr('action');
       var email = $('#reg_email').val();
       var password = $('#reg_password').val();

       PGS.register(action, email, password);

       return false;
    });

    $('.logout').click( function(){
      
       $.post('utils/logout.php', function(data) {
         alert(data);
       });

       return false;
    });

    $('.registerLink').click( function() {
       $('#login').hide();
       $('#register').show();

       return false;
    });

    $('.backLink').click( function() {
       $('#login').show();
       $('#register').hide();

       return false;
    });
});