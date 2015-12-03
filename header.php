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
	    <div id='body'>
            <row centered>
                <column cols="9">		