<!DOCTYPE html>
<html>
    <head>
        <title>Laowai Cafe</title>
        <link type="text/css" rel="stylesheet" href="css/style.css"/>
        <link type="text/css" rel="stylesheet" href="css/kube.css"/>
    </head>
    <body><br/><br/><br/><br/>
        <row centered>
        <column cols="6">
        <?php
		    require "db.php";
            session_start();	
            if(isset($_SESSION['totalp'])){
                $totalp = $_SESSION['totalp'];
	            $create_res = $_SESSION['cres'];
	            $cus_id = $_SESSION['cus_id'];
                $itemnum = count($create_res['food_id']);
                $sql_inserto = 'INSERT orders(order_price,customer_id,date,time) VALUE('.$totalp.',"'.$cus_id.'",curdate(),curtime());';
                $mysql->query($sql_inserto);
				$order_id = mysql_insert_id();
	            $sql_upcredit = "UPDATE customer_info SET credit = (select sum(order_price) from orders where customer_id= '$cus_id') where customer_id= '$cus_id';";
	            $mysql->query($sql_upcredit);
                for ($itemcount=0;$itemcount<$itemnum;$itemcount++) {
                    $sql_insertf = "INSERT order_food(order_id,food_id,quantity) VALUE(".$order_id.",".$create_res['food_id'][$itemcount].",".$create_res['quantity'][$itemcount].")";
                    $mysql->query($sql_insertf);
                }
                echo "<div class='forms'><fieldset class='alert alert-success'><legend class='fat'>Create Order Successfully</legend>";  
                header("refresh:1;url='index.php?order_info='");				
            }else{
				if(!empty(preg_replace("/\s/","",(string)$_POST['lname'])) and !empty(preg_replace("/\s/","",(int)$_POST['newid']))){
	            $sql_newcus= "INSERT customer_info (customer_id,firstname,lastname,tel,birthdate,address) VALUE ('".preg_replace("/\s/","",(string)$_POST['newid'])."','".$_POST['fname']."','".preg_replace("/\s/","",(string)$_POST['lname'])."','".$_POST['tel']."','".$_POST['year']."-".$_POST['month']."-".$_POST['day']."','".$_POST['addr']."');";
		        $mysql->query($sql_newcus);
		        echo "<div class='forms'><fieldset class='alert alert-success'><legend class='fat'>Add Customer Successfully</legend>";
				header("refresh:1;url='index.php?cus_info='");
				}else{
					echo "<script language='javascript' type='text/javascript'>";
					echo "javascript: history.back(-1)</script>";
				}
            }
            echo "<p>Back to Home Page in 1 seconds...</p>";
            echo "<a href='index.php'>Back to Homepage immdiately</a></fieldset></div>";
            session_unset();
        ?>
        </column>
        </row>
    </body>
</html>