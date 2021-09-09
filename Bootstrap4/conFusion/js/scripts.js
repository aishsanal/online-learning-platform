 $(document).ready(function(){
            $("#carouselButton").click(function(){
                if ($("#carouselButton").children("span").hasClass('fa-pause')) {
                    $("#mycarousel").carousel('pause');
                    $("#carouselButton").children("span").removeClass('fa-pause');
                    $("#carouselButton").children("span").addClass('fa-play');
                }
                else if ($("#carouselButton").children("span").hasClass('fa-play')){
                    $("#mycarousel").carousel('cycle');
                    $("#carouselButton").children("span").removeClass('fa-play');
                    $("#carouselButton").children("span").addClass('fa-pause');                    
                }
            });
        });
		
	$(document).ready(function(){
		$("#login-btn").click(function(){
			$('#loginModal').modal();
		});
	});
	$(document).ready(function(){
		$("#signup-btn").click(function(){
			$('#signupModal').modal();
		});
	});
	$(document).ready(function(){
		$("#reserve-btn").click(function(){
			$('#loginModal2').modal();
		});
	});