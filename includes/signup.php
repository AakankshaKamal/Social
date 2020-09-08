<?php 
if(isset($_POST['signup']))
{
	$screenName=$_POST['screenName'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	if(empty($screenName) or empty($password) or empty($email))
{
$error="ALL FIEDS ARE REQUIRED ";
}
else
{
	$email=$getFromU->checkInput($email);
	$screenName=$getFromU->checkInput($screenName);
	$password=$getFromU->checkInput($password);

if(!filter_var($email))
{
	$error="INVALID EMAIL ";
}else if(strlen($screenName)>20)
{
	$error="Name must be between 6-20 characters";
}else if(strlen($password)<6)
{
	$error="Password must be  atleast 6characters";
}
else{
if($getFromU->checkEmail($email)===true)
{
	$error='EMAIL IS ALREADY IN USE';
}
else
{
$user_id=$getFromU->create('users',array('email'=>$email,'password'=>$password,'screenName'=>$screenName,'profileImage'=>'assets/images/defaultprofileimage.png','profileCover'=>'assets/images/defaultCoverImage.png'));
$_SESSION['user_id']=$user_id;
header('Location:signup2.php ? step=1');
}
}

}
}

 ?>

<form method="post">
<div class="signup-div"> 
	<h3>Sign up </h3>
	<ul>
		<li>
		    <input type="text" name="screenName" placeholder="Full Name"/>
		</li>
		<li>
		    <input type="email" name="email" placeholder="Email"/>
		</li>
		<li>
			<input type="password" name="password" placeholder="Password"/>
		</li>
		<li>
			<input type="submit" name="signup" Value="Signup for Twitter">
		</li>
	
<?php
if(isset($error))
{
	echo ' <li class="error-li">
	  <div class="span-fp-error">'.$error.'</div>
	 </li> ';
}
?>

	</ul>
	
	
	
</div>
</form>