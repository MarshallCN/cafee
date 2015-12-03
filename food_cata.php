<?php
$sql = "SELECT catalog_id,cata_name from food_catalogue where food_id = catalog_id and food_id != 51;"; 
	    $result = $mysql->query($sql); 
        echo "<table class ='table-stripped'>"; 
        echo "<th colspan='2'>Food catalogue:</th>";
        echo "<tr><td class='bold'>Catalogue ID</td><td class='bold'>Catalogue Name</td></tr>";
        while($row = $mysql->fetch($result)) {
            echo "<tr>";
            echo "<td>".$row['catalog_id']."</td>";
            echo "<td>".$row['cata_name']." </td>";
	        echo "</tr>";
        }
        echo "</table>";
?>