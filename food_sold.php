<?php
$sql_fcata = "select catalog_id,cata_name from food_catalogue where price IS NULL;";
		$result_fcata = $mysql->query($sql_fcata);
		echo "<table class ='table-stripped'>"; 
		while($row_fcata = $mysql->fetch($result_fcata)) {
			$cata_id = $row_fcata['catalog_id'];	
            $sql_finfo = "select food_id,s.cata_name as food_name,s.price from food_catalogue as s where s.catalog_id = ".$cata_id." and s.price IS NOT NULL;";
	        $result_finfo = $mysql->query($sql_finfo); 
            echo "<th colspan='3' id=".$row_fcata['cata_name'].">".$row_fcata['cata_name']."</th>";
            echo "<tr><td  class='text-centered'><b>Food Name</b></td><td class='bold'>Price</td><td class='bold'>Quantity</td></tr>";
			while($row_finfo = $mysql->fetch($result_finfo)) {
				echo "<tr>";
     			echo "<td class='text-centered'>".$row_finfo['food_name']."</td>";
			    echo "<td>&#165;".$row_finfo['price']." </td>";   
                $foodid = $row_finfo['food_id'];
                $sql_fquantity = "SELECT sum(quantity)as Quantity from order_food where food_id = ".$foodid.";";
				$result_fquantity = $mysql->query($sql_fquantity); 
  				while($row_fquantity = $mysql->fetch($result_fquantity)) {
			        echo "<td>".$row_fquantity['Quantity']."</td></tr>";
		        }
	        }   
	    }echo "</table>";
?>