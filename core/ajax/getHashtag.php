<?php
include '../init.php';

if(isset($_POST['hashtag']))
{echo"GETR";
	$hashtag=$getFromU->checkInput($_POST['hashtag']);
		$mention=$getFromU->checkInput($_POST['hashtag']);
if(substr($hashtag,0,1)==='#'){
$trend=str_replace('#','',$hashtag);
$trends=$getFromT->getTrendByHash($trend);
foreach($trends as $hashtag)
{
	echo '<li><a href="#"><span class="getValue">'.$hashtag->hashtag.'</span></a></li>';
}
}
if(substr($mention,0,1)==='@'){
	echo'@WAla';
$mention=str_replace('#','',$mention); 
echo $mention.'--';
$mentions=$getFromT->getMention($mention);
foreach($mentions as $mention)
{echo 'HIII';
	echo '<li><div class="nav-right-down-inner">
	<div class="nav-right-down-left">
		<span><img src="'.BASE_URL.$mention->profileImage.'"></span>
	</div>
	<div class="nav-right-down-right">
		<div class="nav-right-down-right-headline">
			<a>'.$mention->screenName.'</a><span class="getValue">@'.$mention->username.'</span>
		</div>
	</div>
</div><!--nav-right-down-inner end-here-->
</li>
';
}
}

}
else{
	echo "NOT GOT";
}
?>