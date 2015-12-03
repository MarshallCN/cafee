<?php
$sql_cusinfo = "SELECT * FROM customer_info order by credit desc;";
		$result = $mysql->query($sql_cusinfo);
		echo "<form action='index.php?page=customer_info' method='post'><table class ='table-stripped'>"; 
        echo "<th colspan='8'>Customer Information:</th>";
        echo "<tr><td class='bold'>Customer ID</td><td class='bold'>First Name</td><td class='bold'>Last Nmae</td><td class='bold'>Phone Number</td><td class='bold'>Birthday</td><td class='bold'>Address</td><td class='bold'>Credit</td></tr>";
		while($row = $mysql->fetch($result)) {
		    echo "<tr>";
            /*echo "<td>".$row['cus_number']."</td>";*/
			echo "<td>".$row['Customer_ID']."</td>";
			echo "<td>".$row['FirstName']."</td>";
			echo "<td>".$row['LastName']."</td>";
			echo "<td>".$row['Tel']."</td>";
			echo "<td>".$row['Birthdate']."</td>";
			echo "<td>".$row['Address']."</td>";
			echo "<td>&#165;".$row['credit']."</td>";
			echo "</tr>";
	    }
		echo "</table>";
		echo "<div class='text-right'><button type='primary' name='refresh'>Refresh</button></div></form></blocks></form>";
		if (isset($_POST['refresh'])){                                            //refresh credit
			$sql_cusnum = 'SELECT COUNT(*) FROM customer_info;';
			$result = $mysql->query($sql_cusnum); 
			$row = $mysql->fetch($result);
			$cus_num = $row[0];
			for($num=1;$num<=$cus_num;$num++){
				$sql_cuscredit="select sum(order_price) from orders as o Join customer_info as c ON o.customer_id=c.customer_id where c.cus_number='$num';"; 
				$result_cuscredit=$mysql->query($sql_cuscredit);
				$row_cuscredit = $mysql->fetch($result_cuscredit);
				$sql_refcredit="UPDATE customer_info SET credit = '$row_cuscredit[0]' where cus_number='$num';";
				$mysql->query($sql_refcredit);
			}
		}
?>