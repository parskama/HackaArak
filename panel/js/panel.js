var span;
var id;
var nameevent;
var span;
var date;
var span;
var location;
function eventreg(name){
		id=name;
		span = "spanname"+id;
		nameevent = document.getElementById(span).innerHTML;
		span = "spandatestar"+id;
		date = document.getElementById(span).innerHTML;
		span = "location"+id;
		loc = document.getElementById(span).value;
		document.getElementById("name_a").innerHTML = nameevent;
		document.getElementById("date_a").innerHTML = date;
		document.getElementById("location_a").innerHTML = loc;
		document.getElementById("id").value = id;
		document.getElementById("nameevent").value = nameevent;
}
$(document).ready(function(e) {
	$("b[id=submitevent_a]").click(function(e) {
        if(document.getElementById("id").value != -1)
		{
			$.ajax({
				url:"Opration.php",
				type:"POST",
				data:({command:"submitevent",idevent:id,nameevent:nameevent}),
				success: function(data)
				{
					if(data=='ok')
						alert('افزوده شد');
					else
						alert(data);
				}
			});
		}
		else
		{
			alert("لطفا یک مورد را انتخاب کنید");
		}
    });
});
function changepass() {

var cpass=$("#cpass").val();
var npass=$("#npass").val();
var rnpass=$("#rnpass").val();
if(npass!='' || cpass!='' || rnpass!=''){
if(npass==rnpass){
$.ajax({
				url:"Opration.php",
				type:"POST",
				data:({command:"changepass",newpss:npass,cpass:cpass}),
				success: function(data)
				{
					
						alert(data);
				}
			});
}
else
alert('کلمه عبور خود را به درستی وارد کنید');
}
else
alert('لطفا فیلدهای ضروری را پر کنید');
 }

$(document).ready(function(e) {
    $("b[id=searchbutton]").click(function(e) {
        
		var city = document.getElementById("selectedcity").value;
		var typeevent = document.getElementById("selecttypeevent").value;
		$.ajax({
			url:"Opration.php",
			type:"POST",
			data:({command:"searchpanel",city:city,type:typeevent}),
			success: function(data)
			{
				
				document.getElementById("ul-viewsearch").innerHTML = data ; 	
			}
		});
		
    });
});
$(document).ready(function(e) {
    $(".changepassbtn").click(function(e) {
        var oldpass=$("#oldpass").val();
		var newpass=$("#newpass").val();
		var renpass=$("#renpass").val();
		
		if(oldpass=='' || newpass=='' || renpass==''){
			alert('لطفا فیلدهای ضروری را پر کنید');
			return;
		}
		if(newpass!=renpass){
			alert("لطفا کلمه عبور خود را به دقت وارد کنید");
			return;
		}
		
		$.ajax({
			url:"Opration.php",
			type:"POST",
			data:({command:"changepassword", oldpass:oldpass, password:newpass}),
			success: function(data)
			{
				if(data=='ok')
					alert('کلمه عبور با موفقیت تغییر یافت');
				else
					alert(data);	
			}
		});

    });
});