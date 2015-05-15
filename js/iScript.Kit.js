var programmingKitSTS=0;
$(document).ready(function(e) {
    $("#actionbtn").click(function(e) {
		if(!programmingKitSTS){
			$("#kit").animate({right:-960},1000,"easeInOutExpo",function(){
				if(!programmingKitSTS){
					$("#section_1").addClass('left');
					$("#section_2").addClass('right');
					
					$("#section_1").removeClass('right');
					$("#section_2").removeClass('left');
				}
				$("#kit").css("right","0px");
				programmingKitSTS=1;
			});
		}
		else if(programmingKitSTS){
			$("#kit").animate({right:-960},1000,"easeInOutExpo",function(){
				if(programmingKitSTS){
					$("#section_1").addClass('right');
					$("#section_2").addClass('left');
					
					$("#section_1").removeClass('left');
					$("#section_2").removeClass('right');
				}
				$("#kit").css("right","0px");
				programmingKitSTS=0;
			});
		}
		
    });
});