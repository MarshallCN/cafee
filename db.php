<?php
 class Mysql{
	function __construct(){
		$this->conn=$this->getConn();
	}
	function getConn(){
        $conn =  mysql_connect('localhost','root','') or die("Cannot connect to server".mysql_error());
        mysql_select_db("entity_diagram",$conn) or die("Cannot use this Database");
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
$mysql = new Mysql();

?>