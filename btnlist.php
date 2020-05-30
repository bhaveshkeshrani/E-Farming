<?php 
			//echo "done";
							session_start();
							$fid=$_SESSION['fid'];
							$flg=$_GET['f'];
							//echo $fid;
							include 'php/connect.php';
							$sql = "SELECT * FROM valve WHERE fid=$fid";
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
        										$id=$row["vid"];
												$desc=$row["desc"];
												$btn=$row["status"];
												$ltime=$row["last_chng"];
												$autoon=$row["autoon"];
												$autooff=$row["autooff"];
												//echo $btn;
											
												if($btn==0)
												{
												$button="OFF";
												$type="danger";
												}
												else
												{
												$button="ON";//ON;
												$type="success";//success;
												}
											if($flg==1)
											{
												echo "<div class=\"media-body\">
													<span class=\"text-muted pull-right\">
													<a href='javascript:v_onof($id,$btn);'><span class=\"badge badge-$type\" >$button</span></a>
													<a href='javascript:v_remove($id);'><span class=\"label label-danger\">REMOVE</span></a>
													</span>
													</span>
													
														<strong>VALVE </strong>
														<p>$desc</p>";
											}
											else if($flg==2)
											{
													date_default_timezone_set('Asia/Kolkata');
													$interval =time()-strtotime($ltime);
													$hr = floor($interval / 3600);
													$mn = floor(($interval / 60) % 60);
													$t1id="t1".$id;
													$t2id="t2".$id;
													echo" <tr>
														  <td>$desc</td>
														  <td>$ltime</td>
														  <td>$hr:$mn</td>
														  <td><input type='time' value=$autoon size=8 id=$t1id></td>
														  <td><input type='time' value=$autooff size=8 id=$t2id></td>	
														  <td><a href='javascript:autoupdate($id);'><span class=\"label label-success\">UPDATE</span></a></td>												
														  <td>$button</td>
														 
														  </tr>";
											}
										}
									}
									else
									{	echo "No entry for valve was found..";
									}
							}
							
							
							
							?>