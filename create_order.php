<?php
	error_reporting(E_ALL^E_NOTICE^E_WARNING^E_DEPRECATED);
	$sql_fcata = "select catalog_id,cata_name from food_catalogue where food_id = catalog_id;";
	$result_fcata = $mysql->query($sql_fcata);
	$sql_cusinfo = "SELECT customer_id,CONCAT(firstname,' ',lastname) FROM customer_info ORDER BY firstname, lastname;";
	$result_cusinfo = $mysql->query($sql_cusinfo);
?>
		<form id='order_table' action='index.php?page=create_order' method ='post'>
			<div class='big'><b>Customer:</b>
				<select name='cus_id' id='cus'>
					<option value='0'>--</option>
					<?php 
					while($row = $mysql->fetch($result_cusinfo)) {
						echo "<option value=$row[0]>$row[1] @$row[0]</option>";
					}?>
				</select>
					<div id='bgg' onclick='close1()'></div>
					<img id='tree' src='img/tree.png' onclick='close1()'/>
					<img id='xmas' src='img/xmas.gif' onclick='close1()'/>
			</div>
<script>
	function reset(text) {  
       if (confirm(text)) {  
             alert("Reset OK");  
			 document.getElementById("order_table").reset();
         }  
    }  
	function xmas1(){
		if (confirm("Merry Christmas")){
			  document.getElementById("xmas").style.display = "inline";
			 document.getElementById("tree").style.display = "inline";
			 document.getElementById("bgg").style.display = "inline";
		}
	}
	function close1(){
		document.getElementById("xmas").style.display = "none";
			 document.getElementById("tree").style.display = "none";
			 document.getElementById("bgg").style.display = "none";
	}	
</script>
			<nav>
			<ul>
				<li><a onclick='document.getElementById("order_table").submit()'>CreateOpt</a>
					<ul>
						<li><a onclick='document.getElementById("order_table").submit()'>Create</a></li>
						<li><a onclick='reset("Do you want to reset this order?")'>Reset</a></li>
						<li><a onclick='xmas1()'>Xmas</a></li>
					</ul>
				</li>
			</ul>
			</nav>
			<div class='create_order'>
				<table class ='table-stripped'>
	<?php
		while($row_fcata = $mysql->fetch($result_fcata)) {
			$cata_id = $row_fcata['catalog_id']; 
	        $sql_finfo = "select s.food_id,s.cata_name as food_name,s.price,s.catalog_id from food_catalogue as s join food_catalogue as p where p.food_id = s.catalog_id and s.price IS NOT NULL and s.catalog_id = ".$cata_id.";"; 
	        $result_finfo = $mysql->query($sql_finfo); 
            echo "<th colspan='5' id=".$row_fcata['cata_name'].">".$row_fcata['cata_name']."</th>";
            echo "<tr><td><b>Food ID</b></td><td><b>Food Name</b></td><td><b>Food Price</b></td><td class='text-centered'><b>Quantity</b></td></tr>";
            while($row_finfo = $mysql->fetch($result_finfo)) {
                echo "<tr>";
                echo "<td>".$row_finfo['food_id']."</td>";
                echo "<td>".$row_finfo['food_name']." </td>";
			    echo "<td>&#165;".$row_finfo['price']." </td>";
	?>
				<script>
				function a<?php echo $row_finfo['food_id'];?>(){ 
					var x=document.getElementById(<?php echo $row_finfo['food_id'];?>).value; 
					if(x.length==0){ x=0; }
					if(x < 999){
						document.getElementById(<?php echo (int)$row_finfo['food_id'];?>).value = parseInt(x)+1;
					}
				}
				function m<?php echo $row_finfo['food_id'];?>(){ 
					var x=document.getElementById(<?php echo $row_finfo['food_id'];?>).value;
					if(x > 0){
						document.getElementById(<?php echo (int)$row_finfo['food_id'];?>).value = parseInt(x)-1;
					}
				}
				function vis<?php echo $row_finfo['food_id'];?>(){
					document.getElementById('l<?php echo $row_finfo['food_id'];?>').style.visibility = "visible";
					document.getElementById('r<?php echo $row_finfo['food_id'];?>').style.visibility = "visible";
				}
				function check<?php echo $row_finfo['food_id'];?>(){
					var q = document.getElementById('<?php echo $row_finfo['food_id'];?>').value;
					if (q <= 0 || q != parseInt(q)){
						document.getElementById('<?php echo $row_finfo['food_id'];?>').value = '';
						document.getElementById('<?php echo $row_finfo['food_id'];?>').style.backgroundColor = "white";
					}else{
						document.getElementById('<?php echo $row_finfo['food_id'];?>').style.backgroundColor = "rgba(10, 135, 84, 0.13)";
					}
				}
				function hide<?php echo $row_finfo['food_id'];?>(){
					document.getElementById('l<?php echo $row_finfo['food_id'];?>').style.visibility = "hidden";
					document.getElementById('r<?php echo $row_finfo['food_id'];?>').style.visibility = "hidden";
				}
				</script>
	<?php
			    echo "<td onmousemove='vis{$row_finfo['food_id']}()' onmouseout='hide{$row_finfo['food_id']}();check{$row_finfo['food_id']}()'><button id='l{$row_finfo['food_id']}' class='bnum' type='button' onclick='m{$row_finfo['food_id']}()' ><b>-</b></button>";
				echo "<input type='number' id='{$row_finfo['food_id']}' name=".$row_finfo['food_id']." min = '0' max = '999'/>";
				echo "<button id='r{$row_finfo['food_id']}' class='bnum' type='button' onclick='a{$row_finfo['food_id']}()' ><b>+</b></button></td>";
	            echo "</tr>";
            }
		}
	?>	
			</table><br/>
		</form>
</div>
<div id='create_page'>
	<?php include 'create_order_page.php';?>
</div>




