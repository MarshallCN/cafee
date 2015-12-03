<?php
$sql = "select s.food_id,s.cata_name as food_name,s.price,p.cata_name from food_catalogue as s join food_catalogue as p where p.food_id = s.catalog_id and s.price IS NOT NULL;"; 
	    $result = $mysql->query($sql);
        echo "<table class ='table-stripped'>"; 
        echo "<th colspan='4'>Food Category:</th>";
        echo "<tr><td class='bold'>Food ID</td><td class='bold'>Food Name</td><td class='bold'>Food Price</td><td class='bold'>Food Type</td></tr>";
        while($row = $mysql->fetch($result)) {
            echo "<tr>";
            echo "<td>".($row['food_id']-10)."</td>";
            echo "<td>".$row['food_name']." </td>";
			echo "<td>&#165;".$row['price']." </td>";
			echo "<td>".$row['cata_name']." </td>";
	        echo "</tr>";
        }
        echo "</table>";
?>