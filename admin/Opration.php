<?php

if(isset($_POST["command"]))
{
	require_once("../func.php");
	require_once("../dataAccessLayer.php");
	$security = new security();
	$command = $security->Check_Post($_POST["command"]);
	/* add city */
	if($command == "addcity" && isset($_POST["city"]))
	{		
		$city = $security->Check_Post($_POST["city"]);
		if(!empty($city))
		{
			$sql2 = "SELECT * FROM `city` WHERE `city` = ?";
			$result = $connect->prepare($sql2);
			$result->bindValue(1,$city);
			$check = $result->execute();
			if($check)
			{
				if($result->rowCount() == 1)
				{
					echo "قبلا این شهر اضافه شده است .";
					exit();
				}
				else
				{
					$sql = "INSERT INTO `city`(`city`) VALUES (?)";		
					$result = $connect->prepare($sql);
					$result->bindValue(1,$city);
					$check = $result->execute();
					if($check)
					{
						echo "ok";
						exit();
					}
					else
					{
						echo "مشکل در ارتباط با دیتابیس لطفا بعدا سعی کنید";
						exit();
					}
				}
			}
							
		}
		else
		{
			echo "empty";
			exit();
		}
	}
	/* end add city */
	/* edit city */
	else if($command == "editcity")
	{
		if(isset($_POST["city"]) && isset($_POST["id"]))
		{
			$city = $security->Check_Post($_POST["city"]);
			$id = $security->Check_Post($_POST["id"]);
			if(!empty($id) && !empty($city))
			{
				$sql = "UPDATE `city` SET `city`=? WHERE `id` = ?";
				$result = $connect->prepare($sql);
				$result->bindValue(1,$city);
				$result->bindValue(2,$id);
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
				echo "empty";
				exit();
			}
		}
	}
	/* end edit city */
	/* delete city */
	else if($command == "deletecity")
	{
		if(isset($_POST["id"]))
		{
			$id = intval($_POST["id"]);
			$sql = "DELETE FROM `city` WHERE `id` = ?";
			$result = $connect->prepare($sql);
			$result->bindValue(1,$id);
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
			echo "noset";
			exit();
		}
	}
	/* end delete city */
	
	/****** end city *******/
	
	/**** event ****/
	else if($command == "addevent")
	{
		$sql = "INSERT INTO `event`(`datestart`, `dateend`, `timestart`, `timeend`, `timestartpm`, `timeendpm`, `tags`, `location`, `map`, `city`,`nameevent`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
		$datestart = $security->Check_Post($_POST["datestart"]);
		$dateend = $security->Check_Post($_POST["dateend"]);
		$timestart = $security->Check_Post($_POST["timestart"]);
		$timeend = $security->Check_Post($_POST["timeend"]);
		$timestartpm = $security->Check_Post($_POST["timestartpm"]);
		$timeendpm = $security->Check_Post($_POST["timeendpm"]);
		$tags = $security->Check_Post($_POST["tags"]);
		$city = $security->Check_Post($_POST["city"]);
		$location = $security->Check_Post($_POST["location"]);
		$map = $security->Check_Post($_POST["map"]);
		$name = $security->Check_Post($_POST["name"]);
		$result = $connect->prepare($sql);
		$result->bindValue(1,$datestart);
		$result->bindValue(2,$dateend);
		$result->bindValue(3,$timestart);
		$result->bindValue(4,$timeend);
		$result->bindValue(5,$timestartpm);
		$result->bindValue(6,$timeendpm);
		$result->bindValue(7,$tags);
		$result->bindValue(8,$location);
		$result->bindValue(9,$map);
		$result->bindValue(10,$city);
		$result->bindValue(11,$name);
		$check = $result->execute();
		if($check)
		{
			echo "ok";
			exit();
		}
		else
		{
			echo "خطاا در برقراری با پایگاه داده";
			exit();
		}
	}
	/* end add event */
	/* edit event */
	
	else if($command == "editevent")
	{
		$sql = "UPDATE `event` SET `datestart`=?,`dateend`=?,`timestart`=?,`timeend`=?,`timestartpm`=?,`timeendpm`=?,`tags`=?,`location`=?,`mapx`=?,`mapy`=?,`description`=? WHERE `id` = ?";
		$datestart = $security->Check_Post($_POST["datestart"]);
		$dateend = $security->Check_Post($_POST["dateend"]);
		$timestart = $security->Check_Post($_POST["timestart"]);
		$timeend = $security->Check_Post($_POST["timeend"]);
		$timestartpm = $security->Check_Post($_POST["timestartpm"]);
		$timeendpm = $security->Check_Post($_POST["timeendpm"]);
		$tags = $security->Check_Post($_POST["tags"]);
		$location = $security->Check_Post($_POST["location"]);
		$mapx = intval($_POST["mapx"]);
		$mapy =intval($_POST["mapy"]);
		$description = $security->Check_Post($_POST["description"]);
		$id = intval($_POST["id"]);
		$result = $connect->prepare($sql);
		$result->bindValue(1,$datestart);
		$result->bindValue(2,$dateend);
		$result->bindValue(3,$timestart);
		$result->bindValue(4,$timeend);
		$result->bindValue(5,$timestartpm);
		$result->bindValue(6,$timeendpm);
		$result->bindValue(7,$tags);
		$result->bindValue(8,$location);
		$result->bindValue(9,$mapx);
		$result->bindValue(10,$mapy);
		$result->bindValue(11,$description);
		$result->bindValue(12,$id);
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
	/* end edit event */
	/* delete event */
	else if($command == "deleteevent")
	{
		$sql = "DELETE FROM `event` WHERE `id` = ?";
		$result = $connect->prepare($sql);
		$result->bindValue(1,$id);
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
	/* end delete event */
	
	/**** end event *****/
	
	/**** organizer ****/
	
	
	/* add organizer ***/
	else if($command == "addorganizer")
	{
		$firstname = $security->Check_Post($_POST["firstname"]);
		$linkimg = $security->Check_Post($_POST["linkimg"]);
		$about = $security->Check_Post($_POST["about"]);
		$email = $security->Check_Post($_POST["email"]);
		$linktweet = $security->Check_Post($_POST["linktweet"]);
		$linkfb = $security->Check_Post($_POST["linkfb"]);
		$linkdin = $security->Check_Post($_POST["linkdin"]);
		$lastname = $security->Check_Post($_POST["lastname"]);
		$sql = "INSERT INTO `organizer`(`firstname`, `linkimg`, `about`, `email`, `linktweet`, `linkfb`, `linkdin`, `lastname`) VALUES (?,?,?,?,?,?,?,?)";
		$result = $connect->prepare($sql);
		$result->bindValue(1,$firstname, PDO::PARAM_STR);
		$result->bindValue(2,$linkimg, PDO::PARAM_STR);
		$result->bindValue(3,$about, PDO::PARAM_STR);
		$result->bindValue(4,$email, PDO::PARAM_STR);
		$result->bindValue(5,$linktweet, PDO::PARAM_STR);
		$result->bindValue(6,$linkfb, PDO::PARAM_STR);
		$result->bindValue(7,$linkdin, PDO::PARAM_STR);
		$result->bindValue(8,$lastname, PDO::PARAM_STR);	
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
	/* end add organizer ****/
	
	/* edit organizer */
	else if($command == "editorganizer")
	{
		$firstname = $security->Check_Post($_POST["firstname"]);
		$linkimg = $security->Check_Post($_POST["linkimg"]);
		$about = $security->Check_Post($_POST["about"]);
		$email = $security->Check_Post($_POST["email"]);
		$linktweet = $security->Check_Post($_POST["linktweet"]);
		$linkfb = $security->Check_Post($_POST["linkfb"]);
		$linkdin = $security->Check_Post($_POST["linkdin"]);
		$lastname = $security->Check_Post($_POST["lastname"]);
		$id = $security->Check_Post($_POST["id"]);
		$sql = "UPDATE `organizer` SET `firstname`=?,`linkimg`=?,`about`=?,`email`=?,`linktweet`=?,`linkfb`=?,`linkdin`=?,`lastname`=? WHERE `id` = ?";
		$result = $connect->prepare($sql);
		$result->bindValue(1,$firstname);
		$result->bindValue(2,$linkimg);
		$result->bindValue(3,$about);
		$result->bindValue(4,$email);
		$result->bindValue(5,$linktweet);
		$result->bindValue(6,$linkfb);
		$result->bindValue(7,$linkdin);
		$result->bindValue(8,$lastname);
		$result->bindValue(9,$id);	
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
	/* end edit organizer */
	
	/* delete organizer */
	else if($command == "deleteorganizer")
	{
		$id = intval($_POST["id"]);
		$sql = "DELETE FROM `organizer` WHERE `id` = ?";
		$result = $connect->prepare($sql);
		$result->bindValue(1,$id);
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
	/* end delete organizer */
	/**** end organizer *****/
	
	/* about hacka */
	
	else if($command == "addabout")
	{
		$text = $security->Check_Post($_POST["text"]);
		$fb = $security->Check_Post($_POST["fb"]);
		$twitter = $security->Check_Post($_POST["twitter"]);
		$sql = "INSERT INTO `hacka`( `text`, `fb`, `twitter`) VALUES (?,?,?)";
		$result = $connect->prepare($sql);
		$result->bindValue(1,$text);
		$result->bindValue(2,$fb);
		$result->bindValue(3,$twitter);		
		$check = $result->execute();
		if($check)
		{
			echo "ok";
			exit();
		}
		else
		{
			echo "مشکل در اتصال به دیتابیس لطفا بعدا سعی کنید";
			exit();
		}
	}
	else if($command == "editabout")
	{
		$id = intval($_POST["id"]);
		$text = $security->Check_Post($_POST["text"]);
		$fb = $security->Check_Post($_POST["fb"]);
		$twitter = $security->Check_Post($_POST["twitter"]);
		$sql = "UPDATE `hacka` SET `text`=?,`fb`=?,`twitter`=? WHERE `id` = ?";
		$result = $connect->prepare($sql);
		$result->bindValue(1,$text);
		$result->bindValue(2,$fb);
		$result->bindValue(3,$twitter);
		$result->bindValue(4,$id);
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
	
	/* end about hacka */
	
	/* add type event */
	else if($command == "addtypeevent" && isset($_POST["city"]))
	{		
		$city = $security->Check_Post($_POST["city"]);
		if(!empty($city))
		{
			$sql2 = "SELECT * FROM `typeevent` WHERE `name` = ?";
			$result = $connect->prepare($sql2);
			$result->bindValue(1,$city);
			$check = $result->execute();
			if($check)
			{
				if($result->rowCount() == 1)
				{
					echo "این نام قبلا استفاده شده است";
					exit();
				}
				else
				{
					$sql = "INSERT INTO `typeevent`(`name`) VALUES (?)";		
					$result = $connect->prepare($sql);
					$result->bindValue(1,$city);
					$check = $result->execute();
					if($check)
					{
						echo "ok";
						exit();
					}
					else
					{
						echo "مشکل در ارتباط با دیتابیس لطفا بعدا سعی کنید";
						exit();
					}
				}
			}
							
		}
		else
		{
			echo "empty";
			exit();
		}
	}
	/* end type event */
	
	/* start add admin */
	
	else if($command == "addadmin")
	{
		$username = $security->Check_Post($_POST["username"]);
		$password = $security->Check_Post($_POST["password"]);
		$email = $security->Check_Post($_POST["email"]);
		if(empty($username) || empty($password) || empty($email))
		{
			echo "لطفا همه ی فیلد ها پر کنید";
			exit();
		}
		else
		{
			if($security->check_email_address($email))
			{
				if(strlen($password) < 6 || strlen($password) > 32)
				{
					echo "طول پسورد باید بین 6 تا 32 کارکتر باشد .";
					exit();
				}
				else
				{
					$sql = "SELECT * FROM `login` WHERE `username` = ? OR `email` = ?";
					$result = $connect->prepare($sql);
					$result->bindValue(1,$username);
					$result->bindValue(2,$email);
					$check = $result->execute();
					if($check)
					{
						if($result->rowCount() == 1)
						{
							echo "کاربری با این نام کاربری / ایمیل قبلا وارد شده است";
							exit();
						}
						else
						{
							$sql = "INSERT INTO `login`(`username`, `password`, `email`) VALUES (?,?,?)";
							$result = $connect->prepare($sql);
							$result->bindValue(1,$username);
							$result->bindValue(2,$password);
							$result->bindValue(3,$email);
							$check = $result->execute();
							if($check)
							{
								echo "ok";
								exit();
							}
							else
							{
								echo "مشکل در ارتباط با دیتابیس لطفا بعدا سعی کنید";
								exit();
							}
						}
					}
					else
					{
						echo "مشکل در ارتباط با دیتابیس لطفا بعدا سعی کنید";
						exit();
					}
				}
			}
			else
			{
				echo "ایمیل وارد شده اشتباه می باشد .";
				exit();
			}
		}
	}
	
	/* end start add admin */
}
else
{
	echo "error";
	exit();
}

?>