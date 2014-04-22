	var canvas = document.getElementById("cgol");
	var context = canvas.getContext("2d");

	var cellMap = new Array();
	var mapWidth = canvas.width/16;//62;
	var mapHeight = canvas.height/16;//12;
	var cellWidth = 16;
	var cellHeight = 16;
	var spawnLimit = 0.2;
	var cellColor = "#FFCCBB";
	var updateInterval = 1000;
	
	init();
	setInterval(draw,updateInterval);
	document.addEventListener('keydown',function(event){draw();});
	
	function init()
	{
		context.fillStyle = cellColor;

		for(var i = 0; i < mapWidth*mapHeight; i++)
		{
			cellMap[i] = (Math.random() < spawnLimit) ? 1 : 0; 
		}

		draw();
		
	}
	
	function getNumNeighbors(x,y)
	{
		var sum = 0;
		if(x < mapWidth - 1 )
			sum += cellMap[x+1 + mapWidth*y];
		if( x > 0)
			sum += cellMap[x-1 + mapWidth*y];
		if( y < mapHeight - 1 )
			sum += cellMap[x + mapWidth*(y+1)];
		if( y > 0 )
			sum += cellMap[x + mapWidth*(y-1)];
		if((x < mapWidth - 1 ) && (y < mapHeight - 1 ))
			sum += cellMap[x+1 + mapWidth*(y+1)];
		if((x > 0) && (y < mapHeight - 1 ))
			sum += cellMap[x-1 + mapWidth*(y+1)];
		if((x < mapWidth - 1 ) && (y > 0))
			sum += cellMap[x+1 + mapWidth*(y-1)];
		if((x > 0) && (y > 0))
			sum += cellMap[x-1 + mapWidth*(y-1)];
		
		return sum;
		console.log(sum);
	}
	
	function updateMap()
	{
		var newMap = new Array();
		
		for(var i = 0; i < mapWidth*mapHeight; i++)
		{
			var n = getNumNeighbors(i%mapWidth,Math.floor(i/mapWidth));
			newMap[i] = 0;
			
			if(cellMap[i] == 0)
			{ 
				if(n == 3)
					newMap[i] = 1;
			}
			else
			{
				if(n < 2)
					newMap[i] = 0;
				else if(n > 3)
					newMap[i] = 0;
				else if((n == 3)||(n == 2))
					newMap[i] = 1;
			}
		}
		
		return newMap;
		
	}
	function draw()
	{
		context.fillStyle="#ffffff";
		context.fillRect(0,0,canvas.width,canvas.height);
		context.fillStyle= cellColor;
		
		cellMap = updateMap();


		for(var i = 0; i < mapWidth*mapHeight; i++)
		{
			if(cellMap[i] == 1)
				context.fillRect((i%mapWidth)*cellWidth, Math.floor(i/mapWidth)*cellHeight, cellWidth, cellHeight);
		}
	}