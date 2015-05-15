$(document).ready(function(e) {
    $("li[id=liview]").click(function(e) {
        var id = $(this).attr('name');
		var span = "spanname"+id;
		var nameevent = document.getElementById(span).innerHTML;
		var span = "spandatestar"+id;
		var date = document.getElementById(span).innerHTML;
		var span = "location"+id;
		var location = document.getElementById(span).value;
		document.getElementById("name_a").innerHTML = nameevent;
		document.getElementById("date_a").innerHTML = date;
		document.getElementById("location_a").innerHTML = location;
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