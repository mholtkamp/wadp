function openCompose()
{

	window.open("./compose.html","","width=400 height=250");
	
}

function updateBody()
{
	document.getElementById("message-body").innerHTML = bodies[selected];

}