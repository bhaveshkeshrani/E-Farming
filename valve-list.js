function onload()
					{
						getvlist2(2);
						getvlist1(1);
					}
function setupdateflag()
					{
						var xmlhttp = new XMLHttpRequest();	
						var url="php/setupdate.php";
						xmlhttp.open("GET",url, true);
						 xmlhttp.onreadystatechange = function() 
						 { 
  						};	
					xmlhttp.send();
					}


window.setInterval(function()
					{ 
						var d=new Date();
						document.getElementById("error").innerHTML = "VALVE TIMESTAMP :"+d;
						var xmlhttp = new XMLHttpRequest();	
						var url="php/getupdate.php";
						xmlhttp.open("GET",url, true);
						 xmlhttp.onreadystatechange = function() 
						 { 
							if(this.readyState == 4 && this.status == 200 && (this.responseText)==1) {
								getvlist1(1);
								getvlist2(2);
								setupdateflag();
							}
							else
							{
								//alert(this.responseText);
							}
  						};	
					xmlhttp.send();
					},60000);


					
function autoupdate(id)
					{	var xmlhttp = new XMLHttpRequest();
						var id1="t1"+id;
						var id2="t2"+id;
						var st=document.getElementById(id1).value;
						var stp=document.getElementById(id2).value;
						var url="php/autostart.php?st="+st+"&stp="+stp+"&vid="+id;
						xmlhttp.open("GET",url, true);
						//alert ("js");
						 xmlhttp.onreadystatechange = function() 
						 { 
							if(this.readyState == 4 && this.status == 200) {
								alert ("Updated successfully..");
									//document.getElementById("error").innerHTML += this.responseText;
							}
							else
							{
								//alert ("Error in updating..");
							//document.getElementById("b_list").innerHTML = "loading..";
							}
  						};
					xmlhttp.send();
						
					}
					
function getvlist1(flag)
					{
					var xmlhttp = new XMLHttpRequest();
					var url="btnlist.php?f="+flag;
					xmlhttp.open("GET",url, true);
						//alert ("js");
						 xmlhttp.onreadystatechange = function() 
						 { 
							if(this.readyState == 4 && this.status == 200) {
								//alert ("true");
								
									document.getElementById("b_list").innerHTML = this.responseText;
							}
							else
							{
								//alert ("false");
							document.getElementById("b_list").innerHTML = "loading..";
							}
  						};
					xmlhttp.send();
					}	
					


function getvlist2(flag)
					{
					var xmlhttp = new XMLHttpRequest();
					var url="btnlist.php?f="+flag;
					xmlhttp.open("GET",url, true);
						//alert ("js");
						 xmlhttp.onreadystatechange = function() 
						 { 
							if(this.readyState == 4 && this.status == 200) {
								//alert ("true");
							
									document.getElementById("valve_timestamp").innerHTML = this.responseText;
							}
							else
							{
								//alert ("false");
							document.getElementById("valve_timestamp").innerHTML = "loading..";
							}
  						};
					xmlhttp.send();
					}	
					
					
function addvalve()
					{
						document.getElementById("b_list").innerHTML = "Adding valve...	";
						var desc=document.getElementById("v_desc").value;
						if((desc==""))
						alert("Please enter valve description....");
						else
						{
							var xmlhttp = new XMLHttpRequest();
							var url="php/addvalve.php?desc="+desc;
							xmlhttp.open("GET",url, true);
							 xmlhttp.onreadystatechange = function() 
							 { 
								if(this.readyState == 4 && this.status == 200) {
								document.getElementById("v_desc").value="";
								getvlist1(1);
								delay(100);
								getvlist2(2);
								}
								else
								{
								document.getElementById("b_list").innerHTML = "Adding valve...	";
								}
								
							};
							xmlhttp.send();
						}
					
					}
					
function v_remove(id)
					{
						var xmlhttp = new XMLHttpRequest();
							var url="php/removevalve.php?vid="+id;
							xmlhttp.open("GET",url, true);
							 xmlhttp.onreadystatechange = function() 
							 { 
								if(this.readyState == 4 && this.status == 200) {
								getvlist1(1);
								getvlist2(2);
								}
								else
								{
								document.getElementById("b_list").innerHTML = "Removing......";
								}
								
							};
							xmlhttp.send();
							
					}
					
function v_onof(id,stat)
					{
						document.getElementById("b_list").innerHTML = "Please wait while switching valve..."
						var xmlhttp = new XMLHttpRequest();
							var url="php/switchvalve.php?vid="+id+"&stat="+stat;
							xmlhttp.open("GET",url, true);
							 xmlhttp.onreadystatechange = function() 
							 { 
								if(this.readyState == 4 && this.status == 200) {
								document.getElementById("switcherror").innerHTML="WATER FEED "+this.responseText;
								getvlist1(1);
								getvlist2(2);
								}
								else
								{
								//alert("Please wait while switching valve...");
								//document.getElementById("b_list").innerHTML = "Please wait while switching valve...";
								}
								
							};
							xmlhttp.send();
					}
					
function getmessage(no)
					{
						//alert ("hii");
						var xmlhttp = new XMLHttpRequest();
						var url="php/getmessage.php?no="+no;
					xmlhttp.open("GET",url, true);
						//alert ("js");
						 xmlhttp.onreadystatechange = function() 
						 { 
							if(this.readyState == 4 && this.status == 200) {
								//alert ("true");
							document.getElementById("msg_list").innerHTML = this.responseText;
							}
							else
							{
								//alert ("false");
							document.getElementById("msg_list").innerHTML = "loading..";
							}
  						};
					xmlhttp.send();
					}
					
				
					
						
			
		
	