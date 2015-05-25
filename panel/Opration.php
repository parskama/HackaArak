<?php
session_start();
if(isset($_POST["command"]))
{
	require_once("../func.php");
	require_once("../dataAccessLayer.php");
	$security = new security();
	$command = $security->Check_Post($_POST["command"]);
	
	/* change password user */
	if($command == "changepassword")
	{
		$pass = $security->Check_Post($_POST["password"]);
		$oldpass = $security->Check_Post($_POST["oldpass"]);
		/* dar in ghesmat toole passworc check mishavad */
		if(strlen($pass) < 6 || strlen($pass) > 32)
		{
			echo "طول پسورد باید رشته ای بین 6 تا 32 کاراکتر باشد";
			exit();
		}
		else
		{
			$oldpass=md5(sha1($oldpass));
			/* dar in ghesmat check mishavad ke useri ba in email va password mojoood ast */
			$sql = "SELECT * FROM `signup`  WHERE `email`= ? AND `password` = ?";
			$result = $connect->prepare($sql);
			$result->bindValue(1,$_SESSION["email"]);
			$result->bindValue(2,$oldpass);
			$check = $result->execute() or die(mysql_error);
			$count=$result->rowCount();
			if($count>0)
			{
				if($result->rowCount() == 1)
				{
					/* Change Password */
					$pass = md5(sha1($pass));
					$sql = "UPDATE `signup` SET `password`= ? WHERE `email`= ?";
					$result = $connect->prepare($sql);
					$result->bindValue(1,$pass);
					$result->bindValue(2,$_SESSION["email"]);
					$check = $result->execute();
					if($check)
					{
						echo "ok";
						exit();
					}
					else
					{
						echo "خطایی رخ داده است! لطفا مجددا تلاش کنید";
						exit();
					}
				}
			}
			else
			{
				echo "خطایی رخ داده است! لطفا مجددا تلاش کنید";
				exit();
			}
		}
		
	}
	/* submit event 
	else if($command == "changepass")
	{
		$newpass= $security->Check_Post($_POST["newpss"]);
		$cpass= $security->Check_Post($_POST["cpass"]);
 		$checkp=$_SESSION["checkp"];
 		$cpass=md5(sha1($cpass));
 		$email = $_SESSION["email"];
 		if(strlen($newpass) < 6 || strlen($newpass) > 32){
			echo "طول پسورد باید رشته ای بین 6 تا 32 کاراکتر باشد";
 			exit();
 		}
	
		 else
 		{
 			$newpass = md5(sha1($newpass));
 			$sql = "UPDATE `signup` SET `password`=? WHERE `email`=?";
 			$result = $connect->prepare($sql);
 			$result->bindValue(1,$newpass);
 			$result->bindValue(2,$email);
 			$check = $result->execute();
 			if($check)
 			{
 				echo "کلمه عبور با موفقیت تغییر پیدا کرد";
 				exit();
 			}
 			else
 			{
 				echo "خطایی رخ داده است، لطفا مجددا تلاش کنید";
 				exit();
 			}
 		}
	}
	*/
	
	/* Submit Event */ 
	else if($command == "submitevent")
	{
		/* sabte nam karbar dar event */
		$idevent = intval($_POST["idevent"]);
		$idsingup = intval($_SESSION["userid"]);
		$nameevent = $_POST["nameevent"];
		$namefamily = $_SESSION["usernamefamiily"];
		$email = $_SESSION["email"];
		if(empty($idevent) || empty($idsingup) || empty($nameevent) || empty($namefamily) || empty($email))
		{
			echo "لطفا فیلد های ضروری را پر کنید";
			exit();
		}
		else
		{
			/* check mishe ke karbar dar in rooydad sabtenam nakarde bashe */
			$sql = "SELECT * FROM `submitevent` WHERE `id_signnup` = ? AND `id_event` =?";
			$result = $connect->prepare($sql);
			$result->bindValue(1,$idsingup);
			$result->bindValue(2,$idevent);
			$check = $result->execute();
			if($check)
			{
				if($result->rowCount() != 1)
				{
					/* Submit event */					
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
	else if($command == "searchpanel")
	{
		$city = $security->Check_Post($_POST["city"]);
		$type = $security->Check_Post($_POST["type"]);
		$sql = "SELECT * FROM `event` WHERE `status` = 0 AND `city` = ? AND `nameevent` = ? ORDER BY `ID`";
		$result = $connect->prepare($sql);
		$result->bindValue(1,$city);
		$result->bindValue(2,$type);
		$check = $result->execute();
		if($check)
		{
			while($row = $result->fetch(PDO::FETCH_ASSOC))
							{
						?>
						<li id="liview" onClick="eventreg(<?php echo $row["id"]; ?>);">
							<span id="spanname<?php echo $row["id"]; ?>"><?php echo $row["nameevent"]; ?></span>	
							<span id="spandatestar<?php echo $row["id"]; ?>"><?php echo $row["datestart"]; ?></span>	
							<span ><?php echo $row["timestart"]; if($row["timestartpm"] == 1) echo "PM";else echo "AM"; ?></span>	
							<span><?php echo $row["timeend"]; if($row["timeendpm"] == 1) echo "PM";else echo "AM"; ?></span>
                            <input type="hidden" id="location<?php echo $row["id"]; ?>" value="<?php echo $row["location"]; ?>" />	
						</li>
                        <?php } 
		}
	}
}