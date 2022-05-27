<?php
    !defined('INIT_PHPV') && header("Location: ../index.php");

	/*
    Knowledge about direct access to PHP pages is forbidden, only use require
    URL: http://blog.sina.com.cn/s/blog_5816512201009hnx.html
    Date Accessed: 2021/11/17
    */
?>
<?php
	/*
	 *	This is login.php file created by Siyuan Chen (B00831463)
	 *  Email: sy611254@dal.ca
	 *  This page used to implement the login functionality and include both login form and the login processing script.
	 */

	/*require the database */

	
	require_once "db.php";
	require_once "functions.php";


	/*
	 * knowledge about how to create login script from CSCI2170 class and zybook
	 * URL: https://learn.zybooks.com/zybook/DALCSCI2170SampangiFall2021/chapter/8/section/1
	 * Accessed Date: 2021/11/1 - 2021/11/14
	 */
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		//session_start()
		session_start();
		// Get values submitted from the login form
		$email = sanitizeData($_POST["email"]);
		$password = sanitizeData($_POST["password"]);

        //$passwordHash = password_hash($password, PASSWORD_BCRYPT);

		//select all of the email in login form is equal to the j_login table j_email column
		$SQL = "SELECT * FROM j_login WHERE j_email = '$email'";
		$result = $conn->query($SQL);
		//if the row of result is 0
		if ($result->num_rows == 0) {
            
			//then header index.php loginerro=true, echo the wrong message
			header("Location: ../index.php?loginerror=true");
			die();
			//if there exist result
		}else{
            
			$row = $result->fetch_assoc();
			//check the email and use function password_verify() function to verify password and hash password 
			//in table equal to users enter in
			/*
			 * Knowledge about how to verify the password and hash password in zybook create by CSCI2170 Professor Sampangi in Fall 2021
			 * URL: https://learn.zybooks.com/zybook/DALCSCI2170SampangiFall2021/chapter/8/section/1
			 * Accessed Date: 2021/11/8
			 */
			if ($row['j_email'] === $email && password_verify($password, $row['j_password'])){
                    //set $_SESSION[] = $row[];
                    $_SESSION["email"] = $row['j_email'];
                    $_SESSION["password"] = $row['j_password'];
                    $_SESSION["id"] = $row['j_id'];

                    //header the show=inbox part of index.php
                    header("Location: ../index.php?show=inbox");
                    die();
				//else there exist loginerror message
			}else{
				//else there exist error=true
                header("Location: ../index.php?loginerror=true");
                die();
            }
		}
	}
?>
	<?php 
		//if get loginerror
		if(isset($_GET["loginerror"])){
			//and the loginerror is true
			if($_GET["loginerror"] == "true"){
				//then echo the sentence for the usersname or password is wrong
				echo "<i><p id='incorrectInput'>*Wrong username or password. Please try again.</p></i>";
			}
		}
	?>
	<!--
		form for login, using post method and login.php action

		How to create login form from w3school
		URL: https://www.w3schools.com/howto/howto_css_login_form.asp
		Date Accessed: 2021-10-31
	-->

	<!--
		form for login
	-->
	<form id="form" action="includes/login.php" method="post">
		<!-- email part for label the email and input the email-->
		<div id="email-part">
			<label for="email" id="input-email-text">Your email: </label>
			<input type="text" name="email" id="input-email">
		</div>
		<!-- password part for label the password and input the password-->
		<div id="password-part">
			<label for="password" id="input-password-text">Your password: </label>
			<input type="password" name="password" id="input-password">
		</div>
		<!-- buttons part for submit the form and reset the form-->
		<div id="center-login-1">
			<input type="submit" name="button" id="input-submit-form" value="Login" class="center-login">
			<input type="reset" name="clear" id="input-clear-form" value="Clear" class="center-login">
		</div>

		<!--
			Knowledge about how to reset the form, use type="reset"
			URL: https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/reset
			Accessed Date: 2021/11/10
		-->
	</form>
