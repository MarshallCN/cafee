<html>
    <head>
        <title>Cafe system</title>

		<link type="text/css" rel="stylesheet" href="css/style.css"/>
        <link type="text/css" rel="stylesheet" href="css/kube.css"/>
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">       
  	  	<script src="js/jquery.min.js"></script>
  	  	<script src="js/bootstrap.min.js"></script>
    </head>
    <body>
	    <center class="tab_out">
            <table class="table-stripped">
		        <tr><td class='text-centered' id='tab'>
				<nav>
					<div class="left-menu">
						<a href="index.php?page=create_order"><button type="primary">Create order</button></a>
						<a href="index.php?page=order_info"><button>All orders</button></a>
					</div>
					<div class="right-menu">
						<div class="nav dropdown">
						    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Menu
						    <span class="caret"></span></button>
						    <ul class="dropdown-menu">
						      <li class="dropdown-header">Overviews</li>
							  <li><a href="index.php?page=food_sold">Food sold</a></li>
							  <li><a href="index.php?page=order_detail">Order detail</a></li>
						      <li class="divider"></li>
						      <li class="dropdown-header">Manage</li>
						      <li><a href="index.php?page=customer_info">Customer info</a></li>
							  <li><a href="index.php?page=new_customer">New customer</a></li>
						      <li class="divider"></li>
							  <li class="dropdown-header">Manage</li>							  
							  <li><a href="index.php?page=food_detail">Food items</a></li>	
							  <li><a href="index.php?page=food_cata">Food categories</a></li>
						    </ul>
						  </div>
						
					</div>
				</nav>
					</td>
                </tr>
		    </table>
		</center>
		<div class='left'>
			<div class='left_tab'>
				<a href=#><img src='img/up.png'/></a><br/>
				<?php
				 if ($page == 'create_order'|| $page == 'food_sold') {
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
				<a href=#bottom><img src='img/down.png'/></a>
			</div>
		</div>
		<div class='body'>
            <row>
                <column cols="12">		
