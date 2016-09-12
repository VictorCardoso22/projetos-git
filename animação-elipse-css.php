<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Transform</title>

	<style type="text/css">
		.box{
			width: 50px;
			height: 50px;
			margin: 300px auto;
			background: yellow;
			position: relative;

			animation:minhaanimacao linear 4s infinite alternate;
			/*animation-timing-function: linear;
			animation-direction:alternate;*/
			
		}

		@keyframes minhaanimacao
		{

			from {border-radius: 50%;}
			to 	  {box-shadow: 0 0 1px 20px green, 0 0 1px 40px yellow,0 0 1px 60px green, 0 0 1px 80px yellow, 0 0 1px 100px green, 0 0 1px 120px yellow, 0 0 1px 140px green, 0 0 1px 160px yellow, 0 0 1px 180px green;border-radius: 50%;}
			/*1% 		{border-radius: 50%;}
			25% 	{box-shadow: 0 0 1px 20px green, 0 0 1px 40px yellow; border-radius: 50%;}
			50%		{box-shadow: 0 0 1px 20px green, 0 0 1px 40px yellow,0 0 1px 60px green, 0 0 1px 80px yellow;border-radius: 50%;}
			70%		{box-shadow: 0 0 1px 20px green, 0 0 1px 40px yellow,0 0 1px 60px green, 0 0 1px 80px yellow, 0 0 1px 100px green, 0 0 1px 120px yellow;border-radius: 50%;}
			100%	{box-shadow: 0 0 1px 20px green, 0 0 1px 40px yellow,0 0 1px 60px green, 0 0 1px 80px yellow, 0 0 1px 100px green, 0 0 1px 120px yellow, 0 0 1px 140px green;border-radius: 50%;}*/
	
		}
	</style>
</head>
<body>

	<div class="box"></div>
	
</body>
</html>