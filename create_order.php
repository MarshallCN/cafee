<?php
	error_reporting(E_ALL^E_NOTICE^E_WARNING^E_DEPRECATED);
	$sql_fcata = "select catalog_id,cata_name from food_catalogue where food_id = catalog_id;";
	$result_fcata = $mysql->query($sql_fcata);
	$sql_cusinfo = "SELECT customer_id,CONCAT(firstname,' ',lastname) FROM customer_info ORDER BY firstname, lastname;";
	$result_cusinfo = $mysql->query($sql_cusinfo);
?>
		<form action='index.php?page=create_order' method ='post'>
			<div class='big'><b>Customer:</b>
				<select name='cus_id' id='cus' class='width-6'>
					<option value=''>--</option>
					<?php 
					while($row = $mysql->fetch($result_cusinfo)) {
						echo "<option value=$row[0]>$row[1] @$row[0]</option>";
					}?>
				</select>
			</div>
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
				document.getElementById(<?php echo (int)$row_finfo['food_id'];?>).value = parseInt(x)+1;
				}
				function m<?php echo $row_finfo['food_id'];?>(){ 
				var x=document.getElementById(<?php echo $row_finfo['food_id'];?>).value; 
				document.getElementById(<?php echo (int)$row_finfo['food_id'];?>).value = parseInt(x)-1;
				}
				</script>
	<?php
			    echo "<td><button class='bnum' type='button' onclick='m".$row_finfo['food_id']."()' ><b>-</b></button>";
				echo "<input type='number' class='bnum' id=".$row_finfo['food_id']." name=".$row_finfo['food_id']." min = '0' max = '999'/>";
				echo "<button class='bnum' type='button' onclick='a".$row_finfo['food_id']."()' ><b>+</b></button></td>";
	            echo "</tr>";
            }
		}
	?>	
			</table><br/><blocks cols='2'>
			<div>
				<button type='reset' outline>Reset</button>
			</div>
			<div class='text-right'>
				<button id='creare_order' type='primary' name='create'>Create</button>
			</div>
		</form></blocks>
</div>
<div id='create_page'>
	<?php
		include 'create_order_page.php';
	?>
</div>


