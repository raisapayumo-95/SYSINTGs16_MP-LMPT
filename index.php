<?php
session_start();
if (isset($_SESSION['badlogin'])){
if ($_SESSION['badlogin']>=3)
       header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."/blocked.php");
}

if (isset($_POST['submit'])){

$message=NULL;

 if (empty($_POST['username'])){
  $_SESSION['username']=FALSE;
  $message.='<p>You forgot to enter your username!';
 } else {
  $_SESSION['username']=$_POST['username']; 
 }

 if (empty($_POST['password'])){
  $_SESSION['password']=FALSE;
  $message.='<p>You forgot to enter your password!';
 } else {
  $_SESSION['password']=$_POST['password']; 
 }

 

if ($_SESSION['username']=="sysintg" &&   $_SESSION['password']=="dlsu") 
{

/*Of course, these should have been taken from a database*/
       header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."/user_welcome_php.php");
}
else if ($_SESSION['username']=="dlsu" &&   $_SESSION['password']=="sysintg")
{
	header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."/user_welcome_php.php");
} 
else 
{
	$message.='<p>Please try again';
	if (isset($_SESSION['badlogin']))
		$_SESSION['badlogin']++;
	else
		$_SESSION['badlogin']=1;
}
}/*End of main Submit conditional*/

if (isset($message)){
 echo '<font color="red">'.$message. '</font>';
}

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<fieldset><legend>Please login below: </legend>

<p>User Name: <input type="text" name="username" size="20" maxlength="30" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>"/>
<p>Password: <input type="password" name="password" size="20" maxlength="20" />
<div align="center"><input type="submit" name="submit" value="Login" /></div>

</form>

