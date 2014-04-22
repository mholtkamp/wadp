
function highlight(element)
{
	var red = 255;
	var blue = 0;
	var green = 32;
	//element.style.background = 'rgb(' + red + ',' + green + ',' + blue + ');';
	element.style.background = '#ff0022';
}

function dim(element)
{
	element.style.background="#FFFFFF";
}

function toggleHeight(el)
{
	if(el.parentNode.classList.contains("proj-expanded"))
	{
		if(el.parentNode.style.maxHeight === "")
		{
			el.parentNode.style.maxHeight = document.defaultView.getComputedStyle(el.parentNode).getPropertyValue("height");
			el.parentNode.style.height = el.parentNode.style.maxHeight;
			el = document.getElementById(el.parentNode.id).children[1];
		
		}
		el.parentNode.classList.remove("proj-expanded");
		el.parentNode.classList.add("proj-collapsed");
		el.innerHTML = "<pre> + </pre>";
		el.parentNode.style.height = "24px";
	}
	else
	{
		el.parentNode.classList.remove("proj-collapsed");
		el.parentNode.classList.add("proj-expanded");
		el.innerHTML = "<pre> - </pre>";
		el.parentNode.style.height = el.parentNode.style.maxHeight;
	}
}