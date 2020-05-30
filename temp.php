<html>
	<head>
		<script type="text/javascript" >
		var xmlhttp = new XMLHttpRequest();
		
					function gettemp()
					{
						//alert("intemp");
						 xmlhttp.onreadystatechange = function() 
						 {
							if (this.readyState == 4 && this.status == 200) {
							document.getElementById("list").innerHTML = this.responseText;
							}
  						};
		
					}	
						
		xmlhttp.open("POST","btnlist.php", true);
					
		xmlhttp.send();
		</script>
	</head>
	<body onLoad="gettemp();">
		<div id="list">
		</div>
	</body>
</html>