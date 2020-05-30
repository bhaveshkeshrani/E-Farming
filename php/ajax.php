
<html>
	<head>
		<script type="text/javascript" language="javascript1.5">
		var xmlhttp = new XMLHttpRequest();
		
					function gettemp()
					{
							
						xmlhttp.onreadystatechange=
						function()
						{
							 if (this.readyState == 4 && this.status == 200)
							{
								
								document.getElementById("amit").innerHTML = xmlhttp.responseTex;
							}
							else
							{
								document.getElementById("amit").innerHTML = "requesting";
							}
						}	
					xmlhttp.open("GET",'http://192.168.0.2?pin=051', true);
					
					xmlhttp.send();
					}
		</script>
	</head>
	<body>
	<form name="simple">
		<input type="button" value="click" onClick="gettemp();">
		<input type="text" value="" id="txt">
	</form>
	<div id="amit"> </div>  
	</body>
</html>
