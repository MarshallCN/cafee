<!DOCTYPE html>
<html>
    <head>
        <title>Laowai Cafe</title>
        <link type="text/css" rel="stylesheet" href="css/style.css"/>
        <link type="text/css" rel="stylesheet" href="css/kube.css"/>
    </head>
    <body>
	    <h1 id="ti" class='title'>Laowai Cafe</h1>
	    <center>
	    <div id="tab">
            <form method="get" action="index.php"> 
            <table class="table-stripped">
		        <tr><td class='text-centered' id='tab_in'>
                <button type="submit" name="food_cata">Food catalogue</button>
                <button type="submit" name="food_detail">Food Detail</button>
                <button type="submit" name="order_info">All Orders</button>
                <button type="submit" name="order_detail">Orders Detail</button>
                <button type="submit" name="food_sold">Food Sold Info</button>
                <button type="submit" name="cus_info">Customer Info</button>
		        <button id='customer' type="primary" name="cus_new" outline>New Customer</button>
		        <button id='create' type="primary" name="order_new">Create Order</button></td>
                </tr>
		    </table></form>
	    </div>
	    </center>
	    <div id='body'>
            <row centered>
                <column cols="9">
                    <?php
                        require "database.php";
                        $tables = new DB();
                        if(isset($_GET['food_cata'])) {
                            $tables->t_food_cata();
                        }else if(isset($_GET['food_detail'])) {
	                        $tables->t_food_detail();
                        }else if(isset($_GET['order_info'])) {
	                        $tables->t_order_info();
                        }else if(isset($_GET['order_detail'])) {
	                        $tables->t_order_detail(''); //table4(''),table4(DB::$today),DB::$in7day,DB::$thismonth,DB::$thisweek,DB::$thishour
                        }else if(isset($_GET['food_sold'])) {
	                        $tables->t_food_sold();
                        }else if(isset($_GET['cus_info'])) {
	                        $tables->t_cus_info();
                        }else if(isset($_GET['cus_new'])) {
	                        $tables->t_cus_new();
                        }else if(isset($_GET['order_new'])) {
	                        $tables->t_order_new();
                        }else{
	                        $tables->t_food_sold();
                        }
                    ?>
                </column>
            </row>
	    <div>
    </body>
</html>
