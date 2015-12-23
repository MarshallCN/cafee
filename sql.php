<?php
	if(isset($_GET['sql'])) {
		$mysql = new PDO('mysql:host=localhost;dbname=entity_diagram','root','');
		$sql = $_GET['sql'];
		$sta = $mysql->prepare($sql);
		$sta = $sta->execute();
	}
?>
<script>
window.opener=null;window.open('','_self');window.close();
</script>