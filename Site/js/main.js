// important so the variable scope is not window
(function() {
        // defining some global vars
        var windowheight, windowwidth;

        // start of the PGS mini-framework
        var PGS = {
                // Getting the whole thing off!
                init : function() {
                        this.resize();
                },
                // Handling the resize-event
                // Has its own function for more clearness
                resize : function() {
                        $(window).resize(function() {
                                PGS.dimensions();
                        }).resize();
                },
                // Handling the resizing stuff
                // Gets called on every resize-event
                dimensions : function() {
                        windowheight = $(window).height();
                        windowwidth = $(window).width();

                        $('.PGS_wrapper').css({'width': windowwidth, 'height': windowheight});
                },
                login : function(action, email, password) {
                        password = MD5(password);
                        $.post(action, {
                                email : email,
                                password : password
                        }, function(data) {
                                $('.PGS_wrapper').append(data);
                                $('.mainContent').hide();
                                $('.fullscreen').fadeOut(500, function() {
                                        $(this).remove();
                                });
                                $('.mainContent').fadeIn(500);
                        });
                },
                logout : function() {

                        $.post('utils/logout.php', function(data) {
                                $('.PGS_wrapper').append(data);
                                $('.fullscreen').hide();
                                $('.mainContent').fadeOut(500, function() {
                                        $(this).remove();
                                });
                                $('.fullscreen').fadeIn(500);
                        });

                },
                register : function(action, email, password) {
                        password = MD5(password);
                        $.post(action, {
                                email : email,
                                password : password
                        }, function(data) {
                                alert(data);
                        });
                },
                change_pageContent : function (file) {
                        $.post(file, function(data) {
                                 $('.pageContent').html(data);
                        });
                },
                send_message: function(action, message_text, conversation_ID) {
                	$.post(action, {
                		'conversation_ID': conversation_ID, 
                		'message_text': message_text
                	}, function(data) {
                		alert(data);
                	});
                }
        }

        $(document).ready(function() {
                PGS.init();
				$document = $(document);
				
                $document.on('click', '.loginButton', function() {
                        $('.flipWrapper').addClass('fade');

                        var action = $('#login').attr('action');
                        var email = $('#email').val();
                        var password = $('#password').val();

                        PGS.login(action, email, password);

                        return false;
                });

                $document.on('click', '.registerButton', function() {

                        var action = $('#register').attr('action');
                        var email = $('#reg_email').val();
                        var password = $('#reg_password').val();

                        PGS.register(action, email, password);

                        return false;
                });

                $document.on('click', '.logout', function() {
                        PGS.logout();
                        return false;
                });

                $document.on('click', '.registerLink', function() {
                        $('#login').hide();
                        $('#register').show();

                        return false;
                });

                $document.on('click', '.backLink', function() {
                        $('#login').show();
                        $('#register').hide();

                        return false;
                });

                $document.on('click', 'body', function(e) {
                        $('.profileLink').removeClass('active');
                        $('.navAccountMenu').removeClass('visible');
                });

                $document.on('click', '.profileLink', function(e) {
                        $('.navAccountMenu').toggleClass('visible');
                        $(this).toggleClass('active');

                        return false;
                });

                $document.on('click', 'a[data-change="main"]', function() {
                        var href = $(this).attr('href');
                        PGS.change_pageContent(href);

                        return false;
                });
                
                $document.on('submit', '#message_form', function() {
                	var message_action = $('#message_form').attr('action');
                	var message_text = $('#message_text').val();
                	var conversation_ID = $('#conversation_ID').val();
                	PGS.send_message(message_action, message_text, conversation_ID);

                	return false;
                });
        });

})();