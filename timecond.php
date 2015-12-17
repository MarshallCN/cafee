<form action="<?php $page?>" method='post'>
<select name="timestamp" class="select-small">Time Stamp
	<option value='all'>All</option>
	<option value='today'>Today</option>
	<option value='in7day'>In 7 Day</option>
	<option value='thismonth'>This Month</option>
	<option value='thisweek'>This Week</option>
	<option value='thishour'>This Hour</option>
</select>
<button type='submit' value='OK'>OK</button>
</form>
<?php
$all = '';
$today ="where date =(select current_date)";
$in7day = "where DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date";
$thismonth = "where month(date) = month(now())";
$thisweek = "where week(date,1) = week(now())";
$thishour = "where hour(time) = hour(now())";
if(isset($_POST['timestamp'])){
	$condition = $$_POST['timestamp'];
	echo "<mark>".$_POST['timestamp']."</mark>";
}else {
	$condition='';
}?>