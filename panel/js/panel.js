var span;
var id;
var nameevent;
var span;
var date;
var span;
var location;
$(document).ready(function(e) {
    $("li[id=liview]").click(function(e) {
        id = $(this).attr('name');
		
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
    });
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
						alert('ok');
					else
						alert(data);
				}
			});
		}
		else
		{
			alert("لظفا یک رویداد را انتخاب کنید");
		}
    });
});