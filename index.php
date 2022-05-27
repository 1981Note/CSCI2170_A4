<?php

	/*
	 * CSCI 2170: Fall 2021, Assignment 4
	 * index.php - the main homepage file for this template
	 * Author: Raghav V. Sampangi (raghav@cs.dal.ca)
	 */

	define('INIT_PHPV', true);
	require_once "includes/header.php";

	/*
    Knowledge about direct access to PHP pages is forbidden, only use require
    URL: http://blog.sina.com.cn/s/blog_5816512201009hnx.html
    Date Accessed: 2021/11/17
    */
?>

		<?php
		
			//session_start
			session_start();

			//if session email is set
			if (isset($_SESSION["email"])) {
				?>
				<!--nav bar-->
				<nav class="primary-nav">
					<a href="index.php?show=inbox" id="InboxLink" >Inbox</a>
					<a href="index.php?show=sent">Sent &amp; drafts</a>
					<a href="index.php?show=compose">Write new email</a>
					
					<?php
					//use id to find the fname and lname and colour in j_user
					$id = $_SESSION["id"];
					$SQLuser = "SELECT * FROM j_user WHERE j_user_login_id = $id";
					$result2 = $conn->query($SQLuser);
					if ($result2){
						while ($row2 = $result2->fetch_assoc()){
							$_SESSION["fname"] = $row2['j_user_fname'];
							$_SESSION["lname"] = $row2['j_user_lname'];
							$_SESSION["colour"] = $row2['j_user_sabercolour'];
						}
					}
					//then $firstname is session firstname
					$firstname = $_SESSION["fname"];
					$lastname = $_SESSION["lname"];
					//then echo the sentence with logout href 
					echo "<a href='includes/logout.php' id='whiteColor'>Logged in as $firstname $lastname (logout)</a>";
					?>
				</nav>
				<?php
			}
			
	   ?>
	
	<main id="homepg-main-content" class="pg-main-content">

	<?php
		//if session email is not set
			if (!isset($_SESSION['email'])) {
		?>
		<!--
			then give login form for the users to login
		-->
			<h3>Login to JediMail</h3>
			
		<?php
				require_once "includes/login.php";
			}
			//if session email is set
			else {
				//if isset show 
				if(isset($_GET["show"])){
					$option = $_GET["show"];
					//if isset show equal to inbox
					if($option === "inbox"){
						//then go to inbox.php
						require_once "includes/inbox.php";
						//isset show equal to sent
					}else if($option === "sent"){
						//then go to sent.php
						require_once "includes/sent.php";
						//isset show equal to compose
					}else if($option === "compose"){
						//then go to compose.php
						require_once "includes/compose.php";
					}

				}else{
					header("Location: index.php?show=inbox");
					die();
				}
			}
		?>
	</main>

<?php
	require_once "includes/footer.php";
?>