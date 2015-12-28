		<?php
			date_default_timezone_set('PRC'); 
			$cus_id = preg_replace("/\s/","",(int)$_POST['cus_id']);
            $sql_foodinfo = "select s.food_id,s.cata_name as food_name,s.price,p.cata_name from food_catalogue as s join food_catalogue as p where p.food_id = s.catalog_id and  s.food_id != s.catalog_id;";
            $result = $mysql->query($sql_foodinfo);
            $food_cata_info = array();
            echo "<form id='order_submit' action ='submit.php' method = 'post'>";
            echo "<table class ='table-bordered'>"; 
            while($row = $mysql->fetch($result)) {
	            $food_cata_info['name'][$row['food_id']] = $row['food_name'];
	            $food_cata_info['price'][$row['food_id']] = $row['price'];
	            $food_cata_info['cata'][$row['food_id']] = $row['cata_name'];
            }
			$datetime = date('m-d-y h:i:s',time());
			$sql_cusinfo = "SELECT firstname,lastname,tel,address from customer_info where customer_id = $cus_id;";
			$result = $mysql->query($sql_cusinfo);  
			$row = $mysql->fetch($result);
			if ($cus_id==0){	
				$cusname='New Order';
			}else{
				$cusname=$row[0]."&nbsp".$row[1];
			}
			echo "<script>function showid(){
				document.getElementById('cusid').style.display= 'inline' ;
			}
			function hideid(){
				document.getElementById('cusid').style.display= 'none';
			}</script>";
			echo "<tr class='bold'><td style='font-size: 26px;border-right:0;' onmousemove='showid()' onmouseout='hideid()'>".$cusname."&nbsp<span id='cusid' style='display:none;position: absolute;font-size:16px;font-weight:normal;'>@$cus_id</span></td><td colspan='2' style='border-left:0;text-align:right;'>$datetime</td></tr>";
            echo "<tr class='fat'><td>Food Name</td><td>Price</td><td>Quantity</td></tr>"; 
		    $totalid = $mysql->fetch($mysql->query('select count(*) from food_catalogue;'))[0];
		    $create_res = array();
		    $totalp = 0;	
		    $itemcount = 0;
			for ($f_id=11;$f_id<$totalid;$f_id++) {
				$f_quantity = (int)$_POST[$f_id];
	            if(!empty($f_quantity)) {
	                echo "<tr><td><b>".$food_cata_info['name'][$f_id]."</b></td>";
				    echo "<td>&#165;".$food_cata_info['price'][$f_id]."</td>";
                    echo "<td>".$f_quantity."</td></tr>";
				    $create_res['food_id'][$itemcount] =$f_id;
                    $create_res['quantity'][$itemcount]= $f_quantity;
                    $totalp += $food_cata_info['price'][$f_id] * $f_quantity;
				    $itemcount++;
	            }
            }
		    echo "<tr><td colspan='2' class='fat'>Total Price</td><td colspan='2' class='text-centered'>&#165;  ".$totalp."</td></tr></table></form>";
		        /*echo "<tr><td colspan='1' class='bold'>Phone Number</td><td colspan='3'>".$row[2]."</td></tr>";
	         	echo "<tr><td colspan='1' class='bold'>Address</td><td colspan='3'>".$row[3]."</td></tr>";*/
	        if ($totalp > 0) {
		?>
				<script language="javascript"> 
					document.getElementById('createbtn').style.display= "none";
					function printdiv(printpage) { 
						var headstr = "<html><head><title></title></head><body>"; 
						var footstr = "</body>"; 
						var newstr = document.all.item(printpage).innerHTML; 
						var oldstr = document.body.innerHTML; 
						document.body.innerHTML = headstr+newstr+footstr; 
						window.print(); 
						document.body.innerHTML = oldstr; 
						return false; 
					} 
					function reset() {  
						if (confirm("Do you want to reset?")) {  
							window.location.href='index.php?page=create_order';
						}  
					}
				</script> <!--<link href='' rel='stylesheet' media='all' />
					<link href='' rel='stylesheet' media='print'/>-->
					
			<nav id='submitbtn'>
				<ul>
					<li><button type="primary" onclick="document.getElementById('order_submit').submit();">Submit</button></li>
					<li><button onclick="printdiv('create_page');">Print</button></li>
					<li><button onclick ="history.back(-1);" outline>Modify</button></li>
					<li><button onclick ="reset();" outline>Reset</button></li>
				</ul>
			</nav>
			
		    <?php
				$_SESSION['totalp'] = $totalp;
		        $_SESSION['cres'] = $create_res;
		        $_SESSION['cus_id']= $cus_id;
            }
			
        ?>
		
