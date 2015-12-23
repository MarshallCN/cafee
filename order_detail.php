<?php
$page='index.php?page=order_detail';
include "timecond.php";
$sql = "SELECT Item_id,F.order_id,cus.lastname as lname,Cs.cata_name as Food_name,Cp.Cata_name,Quantity,Cs.price as Single_Price,(Cs.price*quantity)as Total_Price from order_food as F JOIN orders as O on F.order_id = O.order_id JOIN food_catalogue as Cs ON F.food_id = Cs.food_id JOIN food_catalogue as Cp ON Cp.food_id = Cs.catalog_id LEFT JOIN customer_info as cus ON cus.customer_id = O.customer_id ".$condition." ORDER BY Item_id DESC;";
	    $result = $mysql->query($sql);
        echo "<table class ='table-stripped'>"; 
        echo "<th colspan='10'>All Orders Detail:</th>";
        echo "<tr><td class='bold'>ID</td><td class='bold'>Order ID</td><td class='bold'>Customer</td><td class='bold'>Food Name</td><td class='bold'>Food Type</td><td class='bold'>Quantity</td><td class='bold'>Single Price</td><td class='bold'>Total Price</td><td></td></tr>";
        while($row = $mysql->fetch($result)) {
            echo "<tr>";
            echo "<td>".$row['Item_id']."</td>";
            echo "<td>".$row['order_id']." </td>";
			echo "<td>".$row['lname']." </td>";
			echo "<td>".$row['Food_name']." </td>";
			echo "<td>".$row['Cata_name']." </td>";
			echo "<td>".$row['Quantity']." </td>";
			echo "<td>&#165;".$row['Single_Price']." </td>";
			echo "<td>&#165;".$row['Total_Price']." </td>";
		?>
<script>
function firm(text,url) {  
       if (confirm(text)) {
			alert('Delete OK');		   
			window.open(url);
         }  
    }  
</script>
		<td>
			<a href="" onclick="confirm('Do you want to Edit this?')"><samp>o</samp></a>
			<a onclick="firm('Do you want to delete this record?','sql.php?sql=delete from order_food where item_id ='+<?php echo $row['Item_id'];?>);"><kbd>x</kbd></a>
		</td>
	</tr>
    <?php } ?>
</table>