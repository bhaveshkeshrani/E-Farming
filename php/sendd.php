		<body onLoad="send1();">
					<div id="switch"></div>

<script>
function send1()
{
var xmlhttp = new XMLHttpRequest();
							var url="http://192.168.0.2/?pin=052";
							xmlhttp.open("GET",url, true);
							 xmlhttp.onreadystatechange = function() 
							 { 
								if(this.readyState == 4 && this.status == 200) {
								document.getElementById("switch").innerHTML="WATER FEED "+this.responseText;
								//getvlist1(1);
								//getvlist2(2);
								}
								else
								{
								//alert("Please wait while switching valve...");
								//document.getElementById("b_list").innerHTML = "Please wait while switching valve...";
								}
								
							};
							xmlhttp.send();
					}
					</script>
			