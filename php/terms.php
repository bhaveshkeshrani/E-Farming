<?php 
			//echo "done";
							include 'php/connect.php';
							$sql = "SELECT * FROM terms";
							$result = mysql_query($sql);
							if(!$result)
							{
								echo("Please try again later...");
							}
							else
							{
									$count_rows = mysql_num_rows($result);
									if($count_rows > 0)
									{
										 while($row = mysql_fetch_assoc($result))
										 {
        										$id=$row["tid"];
												$desc=$row["desc"];
												$header=$row["header"];
												echo "<li><h3>$header</h3><br><span>$desc<span></li>";
											
										}
									}
									else
									{	echo "No Terms and condition found..";
									}
							}
							
?>