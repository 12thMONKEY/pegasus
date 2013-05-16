var PGS = {
    login: function(action, email, password) {
         password = MD5(password);
         $.post(action, {email: email, password: password}, function(data) {
               $('.fullscreen').remove();
               $('body').html(data);
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
    $('.loginButton').on('click', function(){
       $('.flipWrapper').addClass('fade');

       var action = $('#login').attr('action');
       var email = $('#email').val();
       var password = $('#password').val();

       PGS.login(action, email, password);

       return false;
    });

    $('.registerButton').on('click', function(){
       //$('.flipWrapper').addClass('fade');

       var action = $('#register').attr('action');
       var email = $('#reg_email').val();
       var password = $('#reg_password').val();

       PGS.register(action, email, password);

       return false;
    });

    $(document).on('click', '.logout', function(){

       $.post('utils/logout.php', function(data) {
                 $('.testDIV').remove();
                 $('body').html(data);
       });

       return false;
    });

    $('.registerLink').on('click', function() {
       $('#login').hide();
       $('#register').show();

       return false;
    });

    $('.backLink').on('click', function() {
       $('#login').show();
       $('#register').hide();

       return false;
    });
});