
<?php
	!defined('INIT_PHPV') && header("Location: ../index.php");

	/*
    Knowledge about direct access to PHP pages is forbidden, only use require
    URL: http://blog.sina.com.cn/s/blog_5816512201009hnx.html
    Date Accessed: 2021/11/17
    */

	
	/*
	 *	db.php
	 *	Connects to the Database on localhost.
	 */

	$host = "localhost:3307";
	$username = "root";
	$password = "root";
	$dbname = "jedi";

	$conn = new mysqli($host, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Nooooooooo!" . $conn->connect_error);
	}
    /*
	else {
	 	echo "<p>Connected!</p>";
	}
    */
?>

