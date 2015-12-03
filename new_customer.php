<?php
$sql_cusinfo = "SELECT cus_number,customer_id from customer_info order by customer_id DESC;";
		$result = $mysql->query($sql_cusinfo); 
        $row = $mysql->fetch($result);
		$newid = $row[1]+1;	
        $newnum = $row[0]+1;		
		?>
		<form action='submit.php' method='post'><table><th colspan='4'>New Customer</th>
		<tr><td class='bold' class='width-2'>Customer Number</td><td class='width-2'><input type='text' maxlength='6' value=<?php echo "'$newnum'";?> disabled='disabled'/></td>
		<td class='bold' class='width-2'>Customer ID<span class="req"> *</span></td><td class='width-2'><input type='text' name='newid' value=<?php echo "'$newid'";?> /></td></tr>
		<tr><td class='bold'>First Name</td><td><input type='text' maxlength='10' name='fname'/></td>
		<td class='bold'>Last Name<span class="req"> *</span></td><td><input type='text' maxlength='10' name='lname'/></td></tr>
		<tr><td class='bold'>Phone Number</td><td><input type='text' maxlength='20' name='tel'/></td>
		<td class='bold'><row><column cols='6'>Birthday Date</column></td>
		<td><column cols='6'><row end>
		<column cols='2'><input type='text' name='month' size='1' maxlength='2' placeholder='Month'/></column>
		<column cols='2'><input type='text' name='day' size='1' maxlength='2' placeholder='Day'/></column>
		<column cols='2'><input type='text' name='year' size='1' maxlength='4' placeholder='Year'/></column>
		</row></column>
		</row></td></tr>
		<tr><td class='bold'>Address</td><td><textarea name='addr' rows='3' class='width-12' maxlength='50'></textarea></td></tr></table>
		<div class='text-right'><button class='submit' type='primary' name='submit'>Submit</button></div></blocks></form>
