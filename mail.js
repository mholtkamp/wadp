function openCompose()
{

	window.open("./compose.html","","width=400 height=250");
	
}

function deleteMessage()
{
	if(selected != -1)
		window.location.href = "./deletemessage.php?mid=" + msgIds[selected];
}

function updateBody(el)
{
	var msgs = document.getElementsByClassName("message-head");
	
	for(var i = 0; i < msgs.length; i++)
	{
		msgs[i].style.backgroundColor = "#ffAA99";
		msgs[i].style.color = "#000000";
	}
	
	if((msgs.length > 0) && (el == null))
	{
		msgs[0].style.backgroundColor = "#ff2211";
		msgs[0].style.color = "#ffffff";
		selected = 0;
		document.getElementById("message-body").innerHTML = bodies[selected];
	}
	else if(el != null)
	{
		el.style.backgroundColor = "#ff2211";
		el.style.color = "#ffffff";
		document.getElementById("message-body").innerHTML = bodies[selected];
	}
	else
		document.getElementById("message-body").innerHTML = "No messages";
}