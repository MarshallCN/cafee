<html>
    <head>
        <title>Laowai Cafe</title>
        <link type="text/css" rel="stylesheet" href="css/style.css"/>
        <link type="text/css" rel="stylesheet" href="css/kube.css"/>
    </head>
    <body>
	    <center class="nav bar-fixed">
	    <div id="tab">
            <table class="table-stripped">
		        <tr><td class='text-centered' id='tab_in'>
                <button type="submit" onclick="window.location.href='index.php?page=food_cata'">Food catalogue</button>
                <button type="submit" onclick="window.location.href='index.php?page=food_detail'">Food Detail</button>
                <button type="submit" onclick="window.location.href='index.php?page=order_info'">All Orders</button>
                <button type="submit" onclick="window.location.href='index.php?page=order_detail'">Orders Detail</button>
                <button type="submit" onclick="window.location.href='index.php?page=food_sold'">Food Sold Info</button>
                <button type="submit" onclick="window.location.href='index.php?page=customer_info'">Customer Info</button>
		        <button id='customer' type="primary" onclick="window.location.href='index.php?page=new_customer'" outline>New Customer</button>
		        <button id='create' type="primary" onclick="window.location.href='index.php?page=create_order'">Create Order</button></td>
                </tr>
		    </table>
	    </div>
		</center>
		<div class='left'>
			<div class='left_tab'>
				<a href=#tab>TOP</a><br/>
				<?php
				if ($page == 'create_order' || $page == 'food_sold') {
					echo "<a href=#Sandwiches>Sandwiches</a><br/>";
					echo "<a href=#Salads>Salads</a><br/>";
					echo "<a href=#Eggs>Eggs</a> <br/>";
					echo "<a href=#BREAKFAST>Breakfast</a><br/>";
					echo "<a href=#Patisserie>Patisserie</a><br/>";
					echo "<a href=#COFFEE>COFFEE</a><br/>";
					echo "<a href=#HotChocolate>HotChocolate</a><br/>";
					echo "<a href=#Tea>Tea</a><br/>";
					echo "<a href=#Beverage>Beverage</a><br/>";
					echo "<a href=#Milkshakes>Milkshakes</a><br/>";
					echo "<a href=#Special>Special</a><br/>";
				}
				 ?>
				<a href=#buttom>Buttom</a><br/>
			</div>
		</div>
	    <div id='body'>
            <row>
                <column cols="10">		
