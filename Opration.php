<?php
session_start();
if(isset($_POST["command"]))
{
	require_once("func.php");
	require_once("dataAccessLayer.php");
	$security = new security();
	$command = $security->Check_Post($_POST["command"]);
	if($command == "signup")
	{
		
		$firstname = $security->Check_Post($_POST["firstname"]);
		$lastname = $security->Check_Post($_POST["lastname"]);
		$email = $security->Check_Post($_POST["email"]);
		$mobile = $security->Check_Post($_POST["mobile"]);
		$password = $security->Check_Post($_POST["password"]);
		if(empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($mobile))
		{
			echo "فیلد های ضروری را پر کنید";
			exit();
		}
		else
		{
			if(strlen($password) < 6 || strlen($password) > 32)
			{
				echo "پسورد شما اشتباه است";
				exit();
			}
			else
			{
				if($security->check_email_address($email))
				{
					$sql = "SELECT * FROM `signup` WHERE `email` = ?";
					$result = $connect->prepare($sql);
					$result->bindValue(1,$email);
					$check = $result->execute();
					if($check)
					{
						if($result->rowCount() == 1)
						{
							echo "ایمیل تکراری است";
							exit();
						}
						else
						{
							$password = md5(sha1($password));
							$sql = "INSERT INTO `signup`(`firstname`, `lastname`, `password`, `email`,`mobile`) VALUES (?,?,?,?,?)";
							$result = $connect->prepare($sql);
							$result->bindValue(1,$firstname);
							$result->bindValue(2,$lastname);
							$result->bindValue(3,$password);
							$result->bindValue(4,$email);
							$result->bindValue(5,$mobile);
							$check = $result->execute();
							if($check)
							{
								$sql = "SELECT * FROM `signup` WHERE `email` = ? AND `password` = ?";
								$result = $connect->prepare($sql);
								$result->bindValue(1,$email);
								$result->bindValue(2,$password);
								$check = $result->execute();
								while($row = $result->fetch(PDO::FETCH_ASSOC)){
									$id=$row['id'];
									$familyname=$row['firstname']." ".$row['lastname'];
								}
								$_SESSION['checkp']=$password;
								$_SESSION['email']=$email;
								$_SESSION['timeout']=time();
								$_SESSION['userid']=$id;
								$_SESSION['usernamefamiily']=$familyname;
								$_SESSION['checki']=md5($security->GetRealIp());
								
								echo "ok";
								exit();
							}
							else
							{
								echo "خطای پایگاه داده";
								exit();
							}
						}
					}
					
				}
				else
				{
					echo "ایمیل اشتباه است";
					exit();
				}
			}
		}
	}/* end singup */
	else if($command == "login")
	{
		
		if(isset($_POST["username"]) && isset($_POST["password"]))
		{
			$username = $security->Check_Post($_POST["username"]);
			$password = md5(sha1($security->Check_Post($_POST["password"])));
			if(empty($username) || empty($password))
			{
				echo "empty";
				exit();
			}
			else
			{
				$sql = "SELECT * FROM `signup` WHERE `email` = ? AND `password` = ?";
				$result = $connect->prepare($sql);
				$result->bindValue(1,$username);
				$result->bindValue(2,$password);
				$check = $result->execute();
				if($check)
				{
					if($result->rowCount() == 1)
					{
						$sql = "SELECT * FROM `signup` WHERE `email` = ? AND `password` = ?";
						$result = $connect->prepare($sql);
						$result->bindValue(1,$username);
						$result->bindValue(2,$password);
						$check = $result->execute();
						while($row = $result->fetch(PDO::FETCH_ASSOC)){
							$id=$row['id'];
							$familyname=$row['firstname']." ".$row['lastname'];
						}
						$_SESSION['checkp']=md5(sha1($password));
						$_SESSION['email']=$username;
						$_SESSION['timeout']=time();
						$_SESSION['userid']=$id;
						$_SESSION['usernamefamiily']=$familyname;
						$_SESSION['checki']=md5($security->GetRealIp());
						
						echo "ok";
						exit();
					}
					else
					{
						echo "erroruserpass";
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
		else
		{
			echo "noset";
			exit();
		}
		
	}/* end login */
}


?>