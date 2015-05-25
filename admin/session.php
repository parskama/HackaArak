<?php
require_once("../func.php");
require_once("../dataAccessLayer.php");
$security = new security();
session_start();
if(isset($_SESSION["user_a"]) && isset($_SESSION["checkp_a"]) && isset($_SESSION["timeout_a"]) && isset($_SESSION["checki_a"]) )
{
	$inactive = 1200;
	$sessionTTL = time() - $_SESSION['timeout_a'];
	if($sessionTTL > $inactive){
	  session_destroy();
	  $security->redirect2("../admin-login","cmd=timeout");
	  exit();
	}
	else
	{
                        $_SESSION["timeout"] = time(); 
			$sql = "SELECT * FROM `login` WHERE `username` = ? AND `password` = ?";
			$result = $connect->prepare($sql);
			$result->bindValue(1,$_SESSION["user_a"]);
			$result->bindValue(2,$_SESSION["checkp_a"]);
			$check = $result->execute();
			if($check)
			{
				if($result->rowCount() != 1)
				{
					$security->redirect("index.php"); 
					exit();
				}
				else
				{
					if(md5($security->GetRealIp()) != $_SESSION["checki_a"])
					{
						session_destroy();
						$security->redirect("../admin-login.php?cmd=ip");
						exit();
					}
				}
			}
			else
			{
				$security->redirect2("../admin-login.php","login=error");
				exit();
			}			
	}
}
else
{
	session_destroy();
	$security->redirect("../admin-login.php?cmd=login");
	exit();	
}
?>