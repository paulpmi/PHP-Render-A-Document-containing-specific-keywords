<?php

session_start();
$error = "";
if ($_POST)
{
	if (isset($_POST['name']) && isset($_POST['pass']))
	{
		$databaseCon = new mysqli("localhost", "root", "", "examen");

		$ok = 0;
		$name = $_POST['name'];
		$pass = $_POST['pass'];

		$names = $databaseCon->query("Select name from Users");

		foreach ($names as $name2)
			foreach ($name2 as $name1) {
				# code...
			if ($name1 == $name)
			{
				$pass1 = $databaseCon->query("Select pass from Users where Users.name = '$name'")->fetch_object()->pass;
					if ($pass == $pass1)
					{
						$ok = 1;
						break;
					}
			}
		}
		if ($ok == 1)
		{
			header("Location: home.php?username='$name");
		}
		else
			$error = "Wrong Username/pass";
	}
}

?>



<div>
<form action="" method="post">
    Username: <input type="text" name="name"><br>
    Password: <input type="password" name="pass"><br>
    <input type="submit" value = "Login">
</form>
</div>

<div>
<?php
if (isset($error))
{
	echo $error;
}
?>
<div>