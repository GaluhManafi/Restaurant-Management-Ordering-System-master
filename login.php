<?php
	function check_login($fname,$lname,$pass)
	{
		header("Access-Control-Allow-Origin: *");
		 $dbc = mysqli_connect('localhost','id8941173_galuh','12345','id8941173_kontak') or die ("could not connect database");
		//$dbc = mysql_connect('localhost','id10286545_galuh','12345','id10286545_restaurant');
		if(!$dbc)
			die('NOT CONNECTED:' . mysql_error());
		$db_selected = mysql_select_db("restaurant",$dbc);
		if(!$db_selected)
			die('NOT CONNECTED TO DATABASE:' . mysql_error());
		$admin = "admin";
		if($fname==$admin && $lname==$admin && $pass==$admin)
		{
			echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=admin.html\">";
		}
		else
		{
			$query = "SELECT * FROM USER WHERE Fname=\"$fname\" and Lname=\"$lname\" and Password=\"$pass\";";
			$res = mysql_query($query);
			$num = mysql_num_rows($res);
			if($num)
			{
				echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=user.html\">";
			}
			else
			{
				echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=login.html\">";
			}
		}

	}
	check_login(
		$_POST["firstname"],
		$_POST["lastname"],
		$_POST["pass1"]
		);
		
?>
