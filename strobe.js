var strobeElement = null;
var strobeCountMax = 20;
var strobeCount = 0;
var strobeUpdate = 30.0;
var offRight = null;
var offTop = null;
var offLeft = null;


var intv = null;

if(strobeElement != null)
{
		intv = setInterval(strobe,strobeUpdate);
}

function strobe()
{
	if(strobeElement != null)
	{
		strobeElement.style.borderWidth = "" + (strobeCount + 1) + "px";
		strobeElement.style.borderColor = "rgb(255,"+Math.floor((strobeCount/strobeCountMax)*255)+","+Math.floor((strobeCount/strobeCountMax)*255) + ")";
		strobeElement.style.right = ""+ (offRight - strobeCount) + "px";
		strobeElement.style.top = "" + (offTop - strobeCount) + "px";
		strobeCount++;
		if(strobeCount > strobeCountMax)
			strobeCount = 0;
	}
}

function resetStrobe()
{
	if(strobeElement != null)
	{
		strobeElement.style.borderWidth = "1px";
		strobeElement.style.borderColor = "#ff0000";
		strobeElement.style.removeProperty("right");
		strobeElement.style.removeProperty("top");
		strobeCount = 0;
		
		clearInterval(intv);
		strobeElement = null;
	}
}

function setStrobe(el)
{
	strobeElement = el;
	
	
		offRight = parseInt(document.defaultView.getComputedStyle(strobeElement).getPropertyValue("right"),10);
		offTop = parseInt(document.defaultView.getComputedStyle(strobeElement).getPropertyValue("top"),10);

	intv = setInterval(strobe,strobeUpdate);

}