<?php

					include 'class-http-request.php';
					$r = new HttpRequest("get","192.168.0.2?pin=050");
					echo ($r->getError()) ;
					echo $r->getResponse();
						  // parse json and show tweets
					$tweets =$r->getRequestInfo();
					echo "<pre>";
					print_r ($tweets);
					
					  
?>