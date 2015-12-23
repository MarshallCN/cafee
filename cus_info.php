<?php
		$sql_cusinfo = "SELECT * FROM customer_info;";
		$result = $mysql->query($sql_cusinfo);
		echo "<form action='index.php?page=customer_info' method='post'><table class ='table-stripped'>"; 
        echo "<th colspan='8'>Customer Information:</th>";
        echo "<tr><td class='bold'>Customer ID</td><td class='bold'>First Name</td><td class='bold'>Last Nmae</td><td class='bold'>Phone Number</td><td class='bold'>Birthday</td><td class='bold'>Address</td><td class='bold'>Credit</td></tr>";
		while($row = $mysql->fetch($result)) {
		    echo "<tr>";
			$sql_order="select order_id from orders where customer_id = {$row['Customer_ID']}";
			$res = $mysql->query($sql_order);
			$cond='';
				while($row_order=$mysql->fetch($res)) {
				$cond= $cond." or order_id= {$row_order['order_id']}";
				}
				$sql_sum="select sum(f.price * quantity) as credit from order_food inner join food_catalogue as f ON order_food.food_id = f.food_id where order_id =0 $cond";
				$res_cre=$mysql->query($sql_sum);
				$row_cre=$mysql->fetch($res_cre);
            /*echo "<td>".$row['cus_number']."</td>";*/
			echo "<td>".$row['Customer_ID']."</td>";
			echo "<td>".$row['FirstName']."</td>";
			echo "<td>".$row['LastName']."</td>";
			echo "<td>".$row['Tel']."</td>";
			echo "<td>".$row['Birthdate']."</td>";
			echo "<td>".$row['Address']."</td>";
			echo "<td>&#165;".$row_cre['credit']."</td>";
			echo "</tr>";
	    }
		echo "</table>";
?>