<?php
$dsn='mysql:host=localhost;dbname=tweety';
$user='root';
$pass='';
try{
	$pdo=new PDO( $dsn, $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
}
catch(PDOException $e)
{
echo "Error : Connection failed ".$e->getMessage();
}


?>

 