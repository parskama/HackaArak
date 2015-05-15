////////////// LOGIN CIRCLE MENU \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
jQuery(document).ready(function($){
	var overlayNav = $('.cd-overlay-nav'),
		overlayContent = $('.cd-overlay-content'),
		navigation = $('.cd-primary-nav'),
		toggleNav = $('.cd-nav-trigger,a#circlepopTrigger');

	//inizialize navigation and content layers
	layerInit();
	$(window).on('resize', function(){
		window.requestAnimationFrame(layerInit);
	});

	//open/close the menu and cover layers
	toggleNav.on('click', function(){
		if(!toggleNav.hasClass('close-nav')) {
			$(".cd-logo, .cd-nav-trigger").css({"position":"fixed"});
			//it means navigation is not visible yet - open it and animate navigation layer
			toggleNav.addClass('close-nav');
			
			overlayNav.children('span').velocity({
				translateZ: 0,
				scaleX: 1,
				scaleY: 1,
			}, 500, 'easeInCubic', function(){
				navigation.addClass('fade-in');
			});
		} else {
			$(".cd-logo, .cd-nav-trigger").css({"position":"absolute"});
			//navigation is open - close it and remove navigation layer
			toggleNav.removeClass('close-nav');
			
			overlayContent.children('span').velocity({
				translateZ: 0,
				scaleX: 1,
				scaleY: 1,
			}, 500, 'easeInCubic', function(){
				navigation.removeClass('fade-in');
				
				overlayNav.children('span').velocity({
					translateZ: 0,
					scaleX: 0,
					scaleY: 0,
				}, 0);
				
				overlayContent.addClass('is-hidden').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
					overlayContent.children('span').velocity({
						translateZ: 0,
						scaleX: 0,
						scaleY: 0,
					}, 0, function(){overlayContent.removeClass('is-hidden')});
				});
				if($('html').hasClass('no-csstransitions')) {
					overlayContent.children('span').velocity({
						translateZ: 0,
						scaleX: 0,
						scaleY: 0,
					}, 0, function(){overlayContent.removeClass('is-hidden')});
				}
			});
		}
	});

	function layerInit(){
		var diameterValue = (Math.sqrt( Math.pow($(window).height(), 2) + Math.pow($(window).width(), 2))*2);
		overlayNav.children('span').velocity({
			scaleX: 0,
			scaleY: 0,
			translateZ: 0,
		}, 50).velocity({
			height : diameterValue+'px',
			width : diameterValue+'px',
			top : -(diameterValue/2)+'px',
			left : -(diameterValue/2)+'px',
		}, 0);

		overlayContent.children('span').velocity({
			scaleX: 0,
			scaleY: 0,
			translateZ: 0,
		}, 50).velocity({
			height : diameterValue+'px',
			width : diameterValue+'px',
			top : -(diameterValue/2)+'px',
			left : -(diameterValue/2)+'px',
		}, 0);
	}
});
function loginfunc(sts){
	if(sts=='2'){
		$("#loginfrm").fadeIn(1000,"easeInOutExpo");
		$("#signupform").fadeOut(1000,"easeInOutExpo");
		$("#forgetpassform").fadeOut(1000,"easeInOutExpo");
	}
	else if(sts=='1'){
		$("#loginfrm").fadeOut(1000,"easeInOutExpo");
		$("#signupform").fadeIn(1000,"easeInOutExpo");
		$("#forgetpassform").fadeOut(1000,"easeInOutExpo");
	}
}
function forgetopass(){
	$("#loginfrm").fadeOut(1000,"easeInOutExpo");
	$("#signupform").fadeOut(1000,"easeInOutExpo");
	$("#forgetpassform").fadeIn(1000,"easeInOutExpo");
}
////////////// Tooltip \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
$(document).ready(function() {
				$('.tooltip').tooltipster({
   					animation: 'fade',
					position: 'top',
   					delay: 200,
   					theme: 'tooltipster-default',
   					touchDevices: true
				});
});
$(document).ready(function() {
				$('.navtooltip').tooltipster({
   					animation: 'fade',
					position: 'right',
   					delay: 200,
   					theme: 'tooltipster-default',
   					touchDevices: true
				});
});
////////////// Programming Kit \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
var programmingKitSTS=0;
function p_kit(str) {
		str="<span>"+str+"</scpa>";
		if(!programmingKitSTS){
			$("#section_2 #center").html(str);
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
			$("#section_1 #center").html(str);
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
}
////////////// MeetUp Calendar \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
function MeetUpCalendar(day,month,time,c_sup,place,selected) {
		month=parseInt(month);
		month_f(month);
		selected_f(selected);
		id=parseInt(day);
		
		$("#meetup_board span#date").html(""+time+"<sup>"+c_sup+"</span>");
		$("#meetup_board td#address").html(place);
		
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
			//$("#days li#e_"+id+"").css("background","rgba(32,191,104,1.00)");
        	$("#days").animate({right:-distance},1000,"easeInOutExpo");
			$("#indicator img").animate({right:rand},1000,"easeInOutExpo");
			
		}
		else{
			$("#days li").css("background","none");
			//$("#days li#e_"+id+"").css("background","rgba(32,191,104,1.00)");
			distance=distance-400+rand;
        	$("#days").animate({right:-distance},1000,"easeInOutExpo");
			left=400-rand;
			$("#indicator img").animate({right:left},1000,"easeInOutExpo");
		}
}
function month_f(month){
	//var rand=Math.floor(Math.random() * 12);
	month-=1;
	month*=40;
	$("#month").animate({top:-month},1000,"easeInOutExpo");
}
function selected_f(selected){
	//selected=parseInt(selected);
	
	$("#meetup_cities a").removeClass("selected");
	$("#meetup_cities a#c_"+selected+"").addClass("selected");
}
function nextbtn(element){
	value=parseInt(element.value);
	if(value<6){
		var id;
		id=value;

		MeetUpCalendar(c_days[id],c_month[id],c_time[id],c_sup[id],place[id],value+1);
		$("#prev").attr('value',value);
		$(element).attr('value',value+1);
	}
}
function prevtbn(element){
	value=parseInt(element.value);
	if(value>=1){
		var id;
		id=value-1;

		MeetUpCalendar(c_days[id],c_month[id],c_time[id],c_sup[id],place[id],value);
		$("#next").attr('value',value);
		$(element).attr('value',value-1);
	}
}
function nextprev(value){
	$("#next").attr('value',value);
	$("#prev").attr('value',value-1);
}
////////////// CUSTOM SCROLL \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
$(document).ready(function() {
	$(window).load(function(){
		$(".content").mCustomScrollbar({
			theme:"dark-3",
			scrollButtons:{
				enable:true
			}
		});
    });
});