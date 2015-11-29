<?php
 class Mysql{
	function __construct(){
		$this->conn=$this->getConn();
	}
	function getConn(){
        $conn =  mysql_connect('localhost','root',"") or die("Cannot connect to server".mysql_error());
        mysql_select_db("retail",$conn) or die("Cannot use this Database");
        mysql_query("set names gbk");
        return $conn;
    }
	function fetch($result){
        $row = mysql_fetch_array($result);
        return $row;
    }
	function query($sql){
        $res = mysql_query($sql,$this->conn) or die(mysql_error());
		return $res;
	}
}
 class DB {
	public static $today ="where o.date =(select current_date)";
	public static $in7day = "where DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date";
    public static $thismonth = "where month(date) = month(now())";
    public static $thisweek = "where week(date,1) = week(now())";
	public static $thishour = "where hour(time) = hour(now())";
	public function t_food_cata() {                //Big catalogue 
	    $mysql= new MySQL();
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
    }
	public function t_food_detail() {                //All food detail
	    $mysql= new MySQL();
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
	}
	public function t_order_info() {                //ALL ORDERS
	    $mysql= new MySQL();
		$sql = "select Order_id,o.customer_id,firstname as fname,lastname as lname,Order_Price,Date,Time from orders as o LEFT JOIN customer_info as c ON o.customer_ID = c.customer_id ORDER BY order_id DESC;";
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
			echo "<td><a href='test.php'><samp>o</samp></a><a href='test.php'><kbd>x</kbd></a></td>";
	        echo "</tr>";
			
        }
        echo "</table>";
	}
	public function t_order_detail($condition) {                //ALL order detail
	    $mysql= new MySQL();
		$sql = "SELECT Item_id,f.Order_id,cus.lastname as lname,Cs.cata_name as Food_name,Cp.Cata_name,Quantity,Cs.price as Single_Price,(Cs.price*quantity)as Total_Price from order_food as F JOIN orders as O on F.order_id = O.order_id JOIN food_catalogue as Cs ON F.food_id = Cs.food_id JOIN food_catalogue as Cp ON Cp.food_id = Cs.catalog_id LEFT JOIN customer_info as cus ON cus.customer_id = o.customer_id ".$condition." ORDER BY Item_id DESC;";
	    $result = $mysql->query($sql);
        echo "<table class ='table-stripped'>"; 
        echo "<th colspan='10'>All Orders Detail:</th>";
        echo "<tr><td class='bold'>ID</td><td class='bold'>Order ID</td><td class='bold'>Customer</td><td class='bold'>Food Name</td><td class='bold'>Food Type</td><td class='bold'>Quantity</td><td class='bold'>Single Price</td><td class='bold'>Total Price</td><td></td></tr>";
        while($row = $mysql->fetch($result)) {
            echo "<tr>";
            echo "<td>".$row['Item_id']."</td>";
            echo "<td>".$row['Order_id']." </td>";
			echo "<td>".$row['lname']." </td>";
			echo "<td>".$row['Food_name']." </td>";
			echo "<td>".$row['Cata_name']." </td>";
			echo "<td>".$row['Quantity']." </td>";
			echo "<td>&#165;".$row['Single_Price']." </td>";
			echo "<td>&#165;".$row['Total_Price']." </td>";
			echo "<td><a href='test.php'><samp>o</samp></a><a href='test.php'><kbd>x</kbd></a></td>";
	        echo "</tr>";
        }
        echo "</table>";
	}
	public function t_food_sold() {                //Food sold info
	    $mysql= new MySQL();
		$sql_fcata = "select catalog_id,cata_name from food_catalogue where price IS NULL;";
		$result_fcata = $mysql->query($sql_fcata);
		echo "<table class ='table-stripped'>"; 
		while($row_fcata = $mysql->fetch($result_fcata)) {
			$cata_id = $row_fcata['catalog_id'];	
            $sql_finfo = "select food_id,s.cata_name as food_name,s.price from food_catalogue as s where S.catalog_id = ".$cata_id." and s.price IS NOT NULL;";
	        $result_finfo = $mysql->query($sql_finfo); 
            echo "<th colspan='4'>".$row_fcata['cata_name']."</th>";
            echo "<tr><td class='bold'>Food Name</td><td class='bold'>Price</td><td class='bold'>Quantity</td></tr>";
			while($row_finfo = $mysql->fetch($result_finfo)) {
				echo "<tr>";
     			echo "<td>".$row_finfo['food_name']."</td>";
			    echo "<td>&#165;".$row_finfo['price']." </td>";   
                $foodid = $row_finfo['food_id'];
                $sql_fquantity = "SELECT sum(quantity)as Quantity from order_food where food_id = ".$foodid.";";
				$result_fquantity = $mysql->query($sql_fquantity); 
  				while($row_fquantity = $mysql->fetch($result_fquantity)) {
			        echo "<td>".$row_fquantity['Quantity']."</td></tr>";
		        }
	        }   
	    }echo "</table>";
	}
	public function t_order_new() {                //Create orders
	    $mysql= new MySQL();
		$sql_fcata = "select catalog_id,cata_name from food_catalogue where food_id = catalog_id;";
		$result_fcata = $mysql->query($sql_fcata);
		echo "<form action='create.php' method ='post'>";
		echo "<a href=#Sandwiches>Sandwiches</a> ";
		echo "<a href=#Salads>Salads</a>  ";
		echo "<a href=#Eggs>Eggs</a>  ";
		echo "<a href=#BREAKFAST>Breakfast</a>  ";
		echo "<a href=#Patisserie>Patisserie</a>  ";
		echo "<div id='cusid' class='bold'>Customer ID: <input type='text' name='cus_id' maxlength='6' placeholder='Less than 6 numbers'/></div>";
		echo "<table class ='table-stripped'>"; 
		while($row_fcata = $mysql->fetch($result_fcata)) {
			$cata_id = $row_fcata['catalog_id']; 
	        $sql_finfo = "select s.food_id,s.cata_name as food_name,s.price,s.catalog_id from food_catalogue as s join food_catalogue as p where p.food_id = s.catalog_id and s.price IS NOT NULL and s.catalog_id = ".$cata_id.";"; 
	        $result_finfo = $mysql->query($sql_finfo); 
            echo "<th colspan='5' id=".$row_fcata['cata_name'].">".$row_fcata['cata_name']."</th>";
            echo "<tr><td class='bold'>Food ID</td><td class='bold'>Food Name</td><td class='bold'>Food Price</td><td class='bold'>Quantity</td></tr>";
            while($row_finfo = $mysql->fetch($result_finfo)) {
                echo "<tr>";
                echo "<td>".$row_finfo['food_id']."</td>";
                echo "<td>".$row_finfo['food_name']." </td>";
			    echo "<td>&#165;".$row_finfo['price']." </td>";
			    echo "<td><input type='number' name='".$row_finfo['food_id']."' min = '0' max = '999'/></td>" ;
	            echo "</tr>";
            }
		}
		echo "</table><br/><blocks cols='2'><div><button type='reset' outline>Reset</button></div>";
		echo "<div class='text-right'><button type='primary' name='create'>Create</button></div></form></blocks>";	
	}
	public function t_cus_info(){                //customer info
		$mysql= new MySQL();
		$sql_cusinfo = "SELECT * FROM customer_info order by credit desc;";
		$result = $mysql->query($sql_cusinfo);
		echo "<form action='index.php?cus_info=' method='post'><table class ='table-stripped'>"; 
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
		if (isset($_POST['refresh'])){
			$this->refresh_cus_credit();
		}
		
	}
	
	
	public function t_cus_new(){                     //New customer
		$mysql= new MySQL();
		$sql_cusinfo = "SELECT cus_number,customer_id from customer_info order by customer_id DESC;";
		$result = $mysql->query($sql_cusinfo); 
        $row = $mysql->fetch($result);
		$newid = $row[1]+1;	
        $newnum = $row[0]+1;		
		?>
		<form action='submit.php' method='post'><table><th colspan='4'>New Customer</th>
		<tr><td class='bold' class='width-2'>Customer Number</td><td class='width-2'><input type='text' maxlength='6' value=<?php echo "'$newnum'";?> disabled='disabled'/></td>
		<td class='bold' class='width-2'>Customer ID<span class="req">*</span></td><td class='width-2'><input type='text' name='newid' value=<?php echo "'$newid'";?> /></td></tr>
		<tr><td class='bold'>First Name</td><td><input type='text' maxlength='10' name='fname'/></td>
		<td class='bold'>Last Name<span class="req">*</span></td><td><input type='text' maxlength='10' name='lname'/></td></tr>
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
<?php
	}
	
	function refresh_cus_credit(){
		$mysql= new MySQL();
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
}
?>