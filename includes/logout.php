<?php

include '../core/init.php';
$getFromU->logout();
if($getFromU->loggedIN()===false)
{
	header('Location:'.BASE_URL.'includes/index.php');
}
?>