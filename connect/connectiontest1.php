<?php
Class dbObj{
/* Database connection start */
var $dbhost = "localhost";
var $username = "root";
var $password = "";
var $dbname = "ansell";
var $conn;
function getConnstring() {
$con = mysqli_connect($this->dbhost, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());
 
/* check connection */
if (mysqli_connect_errno()) {
printf("Connect failed: %s\n", mysqli_connect_error());
exit();
} else {
$this->conn = $con;
}
return $this->conn;
}
}
$db = new dbObj();
$connString =  $db->getConnstring();
 
$sql_query = "SELECT * FROM dipping_Lot INNER JOIN statistical1st ON dipping_Lot.Productionlot = statistical1st.Productionlot
ORDER BY dipping_Lot.Productionlot ASC";
$resultset = mysqli_query($connString, $sql_query) or die("database error:". mysqli_error($conn));
$statistical1st = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {
$statistical1st[] = $rows;
}


?>