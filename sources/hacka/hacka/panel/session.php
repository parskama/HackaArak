<?php
	session_start();
	require_once("../func.php");
	$security = new security();
	if(isset($_SESSION["checkp"]) && isset($_SESSION["email"]) && isset($_SESSION["timeout"])
	 && isset($_SESSION["checki"]) && isset($_SESSION["usernamefamiily"]) && isset($_SESSION["userid"]) )
	{
		$inactive = 600;
		$sessionTTL = time() - $_SESSION['timeout'];
		if($sessionTTL > $inactive){
		  session_destroy();
		  $security->redirect("../index.php");
		  exit();
		}
		else
		{
	  		$_SESSION["timeout"] = time(); 
			if(md5($security->GetRealIp()) != $_SESSION["checki"])
			{
				session_destroy();
				$security->redirect("../index.php");
				exit();
			}
			else
			{
				$sql = "SELECT * FROM `singup` WHERE `email` = ? AND `password` = ?";
				$result = $connect->prepare($sql);
				$result->bindValue(1,$_SESSION["email"]);
				$result->bindValue(2,$_SESSION["checkp"]);
				$check = $result->execute();
				if($check)
				{
					if($result->rowCount() != 1)
					{
						session_destroy();
						$security->redirect("../index.php?cmd");
						exit();
					}
					else
					{
						if(md5($security->GetRealIp()) != $_SESSION["checki"])
						{
							session_destroy();
							$security->redirect("../index.php");
							exit();
						}
					}
				}
				else
				{
					session_destroy();
					$security->redirect("../index.php");
					exit();
				}}
				}
	}
	else
	{
		session_destroy();
		$security->redirect("../index.php");
		exit();
	}
    ?>