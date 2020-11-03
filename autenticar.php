<?php 

	session_start();

	//SI LA SESSION NO ESTA
	if (!isset($_SESSION['login']))
		{
			header('location:formLogin.php?error=2');
		}

 ?>