<?php
session_start();
if(isset($_POST["command"]))
{
	require_once("../func.php");
	require_once("../dataAccessLayer.php");
	$security = new security();
	$command = $security->Check_Post($_POST["command"]);
	if($command == "changepassword")
	{
		$pass = $security->Check_Post($_POST["password"]);
		if(strlen($pass) < 6 || strlen($pass) > 32)
		{
			echo "length password";
			exit();
		}
		else
		{
			$sql = "SELECT * FROM `login`  WHERE `email`= ? AND `password` = ?";
			$result = $connect->prepare($sql);
			$result->bindValue(1,$email);
			$result->bindValue(2,$pass);
			$check = $result->execute();
			if($check)
			{
				if($result->rowCount() == 1)
				{
					$sql = "UPDATE `login` SET `password`= ? WHERE `email`= ?";
					$result = $connect->prepare($sql);
					$result->bindValue(1,$pass);
					$result->bindValue(2,$email);
					$check = $result->execute();
					if($check)
					{
						echo "ok";
						exit();
					}
					else
					{
						echo "db";
						exit();
					}
				}
			}
			else
			{
				echo "db";
				exit();
			}
		}
		
	}
	/* submit event */
	else if($command == "submitevent")
	{
		$idevent = intval($_POST["idevent"]);
		$idsingup = intval($_SESSION["userid"]);
		$nameevent = $_POST["nameevent"];
		$namefamily = $_SESSION["usernamefamiily"];
		$email = $_SESSION["email"];
		if(empty($idevent) || empty($idsingup) || empty($nameevent) || empty($namefamily) || empty($email))
		{
			echo "empty";
			exit();
		}
		else
		{
			$sql = "SELECT * FROM `submitevent` WHERE `id_signnup` = ? AND `id_event` =?";
			$result = $connect->prepare($sql);
			$result->bindValue(1,$idsingup);
			$result->bindValue(2,$idevent);
			$check = $result->execute();
			if($check)
			{
				if($result->rowCount() != 1)
				{					
					$sql = "INSERT INTO `submitevent`(`id_event`, `id_signnup`, `nameevent`, `namefamily`, `email`) VALUES (?,?,?,?,?)";
					$result = $connect->prepare($sql);
					$result->bindValue(1,$idevent);
					$result->bindValue(2,$idevent);
					$result->bindValue(3,$idevent);
					$result->bindValue(4,$idevent);
					$result->bindValue(5,$idevent);
					$check = $result->execute();
					if($check)
					{
						echo "ok";
						exit();
					}
					else
					{
						echo "db";
						exit();
					}
				}
				else
				{
					echo "befor submit";
					exit();
				}
			}
			else
			{
				echo "db";
				exit();
			}
		}
	}
}