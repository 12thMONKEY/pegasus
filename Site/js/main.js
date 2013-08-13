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
                },
                
                submit_form: function(action, string) {
                		$.post(action, string, 
                			function(data) {alert(data)
                			});
                	
                },
                
                
                events: {
                	add: function(action, date, subject, describtion, location, s_day, s_month, s_year, s_hour, s_minute, e_day, e_month, e_year, e_hour, e_minute) {
                		$.post(action, {
                			'date': date,
                			'subject': subject,
                			'describtion': describtion,
                			'location': location,
                			's_day': s_day,
                			's_month': s_month,
                			's_year': s_year, 
                			's_hour': s_hour, 
                			's_minute': s_minute,
                			'e_day':  e_day,
                			'e_month':  e_month,
                			'e_year':  e_year,
                			'e_hour':  e_hour,
                			'e_minute':  e_minute
                		}, function(data) {                			
                				$('.pageContent').html(data);
                		});
                		
                	},
                	invite: function(action) {
                		$.post(action, function(data) {
                				$('.pageContent').html(data);
                		});
                	}
                	
                }
        }

        $(document).ready(function() {
                PGS.init();
                                $document = $(document);

                $document.ajaxStart( function() {
                         console.log('loading...');
                }).ajaxStop( function() {
                         console.log('finished!');
                });

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

                /* $document.on('submit', '#message_form', function() {
                        var message_action = $('#message_form').attr('action');
                        var message_text = $('#message_text').val();
                        var conversation_ID = $('#conversation_ID').val();
                        PGS.send_message(message_action, message_text, conversation_ID);

                        return false;
                });
                
                $document.on('submit', '#add_event_form', function() {

                		var add_action = $('#add_event_form').attr('action');
                		var add_date = $('#add_event_date').val();
                		var add_subject = $('#add_event_subject').val();
                		var add_describtion = $('#add_event_describtion').val();
                		var add_location = $('#add_event_location').val();
                		var add_s_day = $('#add_event_start_day').val();
                		var add_s_month = $('#add_event_start_month').val();
                		var add_s_year = $('#add_event_start_year').val();
                		var add_s_hour = $('#add_event_start_hour').val();
                		var add_s_minute = $('#add_event_start_minute').val();
                		var add_e_day = $('#add_event_end_day').val();
                		var add_e_month = $('#add_event_end_month').val();
                		var add_e_year = $('#add_event_end_year').val();
                		var add_e_hour = $('#add_event_end_hour').val();
                		var add_e_minute = $('#add_event_end_minute').val();
                		           		
                		PGS.events.add(add_action, add_date, add_subject, add_describtion, add_location, add_s_day, add_s_month, add_s_year, add_s_minute, add_s_minute, add_e_day, add_e_month, add_e_year, add_e_minute, add_e_minute);
                		
                		return false;                	
                });
                
                $document.on('submit', '#invite_friends_form', function() {
                		
                		var invited_friends = [];
                		var invite_action = $('#invite_friends_form').attr('action');
                		$('#invited_friends:checked').each( function() {          			
                							invited_friends.push($(this).val());               			                						
                						});
                						
                		console.log(invited_friends);
                		
                		PGS.events.invite(invite_action);
                		
                		return false;
                });*/
               
               $document.on('submit', 'form', function() {
               			
               			var action = $(this).attr('action');
               			var string = $(this).serialize();
               			
               			PGS.submit_form(action, string);
               	
               			return false;
               	
               });
                
                
        });

})();