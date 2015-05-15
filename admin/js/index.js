$(document).ready(function(e) {
    $("input[id=btnaddevent]").click(function(e) {
        var selecttype = document.getElementById("select_typeevent").value ;
		var nameevent = document.getElementById("txtnameevent").value; 
		var city = document.getElementById("select_addevent").value; 
		var dateevent = document.getElementById("dateevent").value; 
		var map = document.getElementById("map").value; 
		var selectpmstart = document.getElementById("selectpmstart").value; 
		var clockstart = document.getElementById("clockstart").value; 
		var selectpmend = document.getElementById("selectpmend").value; 
		var tags = document.getElementById("tags").value; 
		var endclock = document.getElementById("endclock").value; 
		var enddateevent = document.getElementById("enddateevent").value;
		var description = document.getElementById("descriptions").value;
		if(selecttype == 1)
		{
			selecttype = nameevent;
		}
		
		$.ajax({
			url:"Opration.php",
			type:"POST",
			data:({command:"addevent",name:selecttype,dateend:enddateevent,city:city,datestart:dateevent,map:map,timestartpm:selectpmstart,timestart:clockstart,timeendpm:selectpmend,tags:tags,timeend:endclock,location:description}),
			success: function(data)
			{
				if($.trim(data) == "ok")
				{
					alert("با موفقیت ذخیره شد .");
					document.getElementById("select_typeevent").value = 1;
					document.getElementById("txtnameevent").value = ""; 
					document.getElementById("select_addevent").value = ""; 
					document.getElementById("dateevent").value = ""; 
					document.getElementById("map").value = ""; 
					document.getElementById("selectpmstart").value = ""; 
					document.getElementById("clockstart").value = ""; 
					document.getElementById("selectpmend").value = ""; 
					document.getElementById("tags").value = ""; 
					document.getElementById("endclock").value = ""; 
					document.getElementById("enddateevent").value = "";
					document.getElementById("descriptions").value = "";
				}
				else
				{
					alert(data);					
				}
			}
		});
	
    });
	/* add city */
	$("input[id=addcity]").click(function() {
		
        var city = document.getElementById("txtaddcity").value ; 
		if(city == "")
		{
			alert("لطفا نام شهر مورد نظر را وارد نمایید .");
		}
		else
		{
			$.ajax({
				url:"Opration.php",
				type:"POST",
				data:({command:"addcity",city:city}),
				success: function(data)
				{
					if($.trim(data) == "ok")
					{
						alert("شهر مورد نظر اضافه شد .");
						document.getElementById("txtaddcity").value
					}
					else
					{
						alert(data);
					}
				}
			});
		}
    });
	/* add type event */
	$("input[id=addtypeevent]").click(function(e) {
        var city = document.getElementById("txtaddcity").value ; 
		if(city == "")
		{
			alert("لطفا نام هاکا را وارد نمایید .");
		}
		else
		{
			$.ajax({
				url:"Opration.php",
				type:"POST",
				data:({command:"addtypeevent",city:city}),
				success: function(data)
				{
					if($.trim(data) == "ok")
					{
						alert("با موفقیت در دیتابیس ذخیره شد");
						document.getElementById("txtaddcity").value = "";
					}
					else
					{
						alert(data);
					}
				}
			});
		}
    });
	$("input[id=btnsaveabout]").click(function(e) {
        
		var about = document.getElementById("txtareaabout").value;
		var linkfb = document.getElementById("linkfb").value;
		var linktweet = document.getElementById("linktweet").value;
		if(about == "")
		{
			alert("لطفا درباره هاکا را وارد نمایید .");
		}
		else
		{
			$.ajax({
				url:"Opration.php",
				type:"POST",
				data:({command:"addabout",text:about,fb:linkfb,twitter:linktweet}),
				success: function(data)
				{
					if($.trim(data) == "ok")
					{
						alert("با موفقیت در دیتابیس ذخیره شد .");
						document.getElementById("txtareaabout").value = "";
						document.getElementById("linkfb").value = "";
						document.getElementById("linktweet").value = "";
					}
					else
					{
						alert(data);
					}
				}
			});
		}
		
    });
	/* add admin */
	$("input[id=saveadmin]").click(function() {
		
        var username = document.getElementById("username").value;
		var password = document.getElementById("password").value;
		var repassword = document.getElementById("repassword").value;
		var email = document.getElementById("email").value;
		if(username == "" || password == "" || email == "")
		{
			alert("لطفا همه ی فیلد ها پر کنید");
		}
		else
		{
			if(password != repassword)
			{
				alert("پسوره با تکرار پسورد یکسان نمی باشد .");
			}
			else
			{
				$.ajax({
					url:"Opration.php",
					type:"POST",
					data:({command:"addadmin",username:username,password:password,email:email}),
					success: function(data)
					{
						if($.trim(data) == "ok")
						{
							alert("مدیر با موفقیت اضافه شد .");
						}
						else
						{
							alert(data);
						}
					}
				});
			}
		}
		
    });
	//add orgenizer
	$("input[id=addorgenizer]").click(function(e) {
        var name = document.getElementById("m_name").value ;
		var family = document.getElementById("m_family").value; 
		var skill = document.getElementById("m_skill").value; 
		var img = document.getElementById("m_img").value; 
		var mail = document.getElementById("m_mail").value; 
		var fb = document.getElementById("m_fb").value; 
		var tw = document.getElementById("m_tw").value; 
		var li = document.getElementById("m_li").value; 

		$.ajax({
			url:"Opration.php",
			type:"POST",
			data:({command:"addorganizer",firstname:name,lastname:family,about:skill,linkimg:img,email:mail,linkfb:fb,linktweet:tw,linkdin:li}),
			success: function(data)
			{
				if($.trim(data) == "ok")
				{
					alert("با موفقیت ذخیره شد .");
					$("#organizer_wrapper input[type=text]").val('');
				}
				else
				{
					alert(data);					
				}
			}
		});
    });
});
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