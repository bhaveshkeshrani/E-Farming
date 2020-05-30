<?php

							//session_start();
							$no=$_GET['no'];
							include 'connect.php';
							$sql = "SELECT * FROM message LIMIT $no";
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
												$header=$row["header"];
        										$msg=$row["msg"];
												$date=$row["time"];
												echo "<li>
                                            <a href=\"#\">
                                                <div class=\"pull-left\">
                                                     <i class=\"fa fa-envelope fa-5\" ></i>
                                                </div>
                                                <h4>
                                                   $header

                                                </h4>
                                                <p>$msg</p>
                                                <small class=\"pull-right\"><i class=\"fa fa-clock-o\">$date</i></small>
                                            </a>
                                        </li>";
												
										}
									}
									else
									{	echo "No entry for valve was found..";
									}
							}
							
							
											

?>


