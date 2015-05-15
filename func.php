<?php

class security
{
	function redirect2($url,$get)
	{		
		if(!isset($get))
		{	
			$url=$url.".php";		
			header("location:$url");
		}
		else
		{
			$url = $url.".php?".$get ;
			header("location:$url");			
		}
	}
	function redirect($url)
	{		
		header("location:$url");		
	}
	function Check_Post($value)
	{
		$value = htmlspecialchars($value);
		$value = strip_tags($value);
		return $value;
	}
	function Check_Get($value)
	{
		
		$value = htmlspecialchars($value);
		$value = htmlentities($value);
		return $value;
	}
	function GetRealIp()
	{
		if (!empty($_SERVER['HTTP_CLIENT_IP']))
			//check ip from share internet
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
			//to check ip is pass from proxy
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else
			$ip = $_SERVER['REMOTE_ADDR'];
		return $ip;
	}
 
	function exixsts($url)
	{
		$page = $url.".php";
		include "$page";		
	}
	function check_email_address($email) {
        // First, we check that there's one @ symbol, and that the lengths are right
        if (!preg_match("/^[^@]{1,64}@[^@]{1,255}$/", $email)) {
            // Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
            return false;
        }
        // Split it into sections to make life easier
        $email_array = explode("@", $email);
        $local_array = explode(".", $email_array[0]);
        for ($i = 0; $i < sizeof($local_array); $i++) {
            if (!preg_match("/^(([A-Za-z0-9!#$%&'*+\/=?^_`{|}~-][A-Za-z0-9!#$%&'*+\/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$/", $local_array[$i])) {
                return false;
            }
        }
        if (!preg_match("/^\[?[0-9\.]+\]?$/", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
            $domain_array = explode(".", $email_array[1]);
            if (sizeof($domain_array) < 2) {
                return false; // Not enough parts to domain
            }
            for ($i = 0; $i < sizeof($domain_array); $i++) {
                if (!preg_match("/^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$/", $domain_array[$i])) {
                    return false;
                }
            }
        }

        return true;
    }	
}

?>