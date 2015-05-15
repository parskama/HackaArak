$(document).ready(function() {
    $("td[id=submitform_1]").click(function(e) {
        var username = document.getElementById("username").value;
		var password = document.getElementById("password").value;
		if(username == "" || password == "")
		{
			alert("لطفا همه ی فیلد ها را پر کنید");
		}
		else
		{
			$.ajax({
				url:"Opration.php",
				type:"POST",
				data:({command:"login",username:username,password:password}),
				success: function(data)
				{
					if($.trim(data) == "ok")					
					{
						var loc="panel/index.php";
						redirect(loc);
					}
					else
					{
						alert(data);
					}
				}
			})
		}
    });
	$("td[id=submitsignup]").click(function(e) {
        
		var name = document.getElementById("firstname").value;
		var lastname = document.getElementById("lastname").value;
		var singpass = document.getElementById("singpass").value;
		var singpass2 = document.getElementById("singpass2").value;
		var phone = document.getElementById("phone").value;
		var mail = document.getElementById("mail").value;
		if(name == "" || lastname == "" || singpass == "" || singpass2 == "" || phone == "" || mail == "")
		{
			alert("لطفا همه ی فیلد ها را پر کنید");
		}
		else
		{
			$.ajax({
				url:"Opration.php",
				type:"POST",
				data:({command:"signup",firstname:name,lastname:lastname,email:mail,password:singpass,mobile:phone}),
				success: function(data)
				{
					if($.trim(data) == "ok")					
					{
						var loc="panel/index.php";
						redirect(loc);
					}
					else
					{
						alert(data);
					}
					
				}
			});
		}
		
    });
});
function redirect(loc){
	window.location.href=loc;
}