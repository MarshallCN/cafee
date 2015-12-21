<?php
$page='index.php?page=order_info';
include "timecond.php";
$sql = "select Order_id,o.customer_id,firstname as fname,lastname as lname,Order_Price,Date,Time from orders as o LEFT JOIN customer_info as c ON o.customer_ID = c.customer_id ".$condition." ORDER BY order_id DESC;";
	    $result = $mysql->query($sql);
        echo "<table class ='table-stripped'>"; 
        echo "<th colspan='7'>All Orders:</th>";
        echo "<tr><td class='bold'>Order ID</td><td class='bold'>Customer ID</td><td class='bold'>Customer</td><td class='bold'>Order Price</td><td class='bold'>Date</td><td class='bold'>Time</td><td></td></tr>";
		while($row = $mysql->fetch($result)) {
			echo "<tr>";
            echo "<td>".$row['Order_id']." </td>";
			echo "<td>".$row['customer_id']." </td>";
			echo "<td>".$row['fname']." ".$row['lname']." </td>";
			echo "<td>&#165;".$row['Order_Price']." </td>";
			echo "<td>".$row['Date']." </td>";
			echo "<td>".$row['Time']." </td>";
?>
		<td>
			<a onclick="confirm('Do you want to edit this record?');"><samp>o</samp></a>
			<a onclick="confirm('Delete this Record forever?');confirm('Are you sure?');"><kbd>x</kbd></a>
		</td>
	</tr>
<?php } ?> 
</table>
