$(document).ready(function(e) {
    $("#actionbtn").click(function(e) {
		month();
		var id=$("#actionvalue").val();
		id=parseInt(id);
		id=id;
		
		var distance=(id-1)*40;
		var salt=10;
		if(id<=11)
			salt=id;
		if(id>21){
			salt=id%11;
			salt=10-salt;
		}
		
		var rand=Math.floor(Math.random() * salt);
		rand*=40;
		if(id<15){
			distance-=rand;
			$("#days li").css("background","none");
			$("#days li#e_"+id+"").css("background","rgba(32,191,104,1.00)");
        	$("#days").animate({right:-distance},1000,"easeInOutExpo");
			$("#indicator img").animate({right:rand},1000,"easeInOutExpo");
			
		}
		else{
			$("#days li").css("background","none");
			$("#days li#e_"+id+"").css("background","rgba(32,191,104,1.00)");
			distance=distance-400+rand;
        	$("#days").animate({right:-distance},1000,"easeInOutExpo");
			left=400-rand;
			$("#indicator img").animate({right:left},1000,"easeInOutExpo");
		}
		var rand=Math.floor(Math.random() * 31);
		$("#actionvalue").val(rand);
    });
});
function month(){
	var rand=Math.floor(Math.random() * 12);
	rand*=40;
	$("#month").animate({top:-rand},1000,"easeInOutExpo");
}
