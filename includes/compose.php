<?php
    !defined('INIT_PHPV') && header("Location: ../index.php");

    /*
    Knowledge about direct access to PHP pages is forbidden, only use require
    URL: http://blog.sina.com.cn/s/blog_5816512201009hnx.html
    Date Accessed: 2021/11/17
    */
?>

<?php
    if (isset($_GET["show"])) {
?>


<!--create compose a new email part-->
<h3>Compose a new email</h3>

<!--form for create a new email-->
<form id="form2" action="index.php?show=compose" method="POST">
    <!--fullname part-->
    <div id="fullname-part">
        <label for="fullname" id="input-fullname-text">Recipient full name: </label>
        <input type="text" name="fullname" id="input-fullname">
    </div>
    <!--new email part-->
    <div id="new-email-part">
        <label for="new-email" id="input-new-email-text">Recipient email: </label>
        <input type="email" name="newEmail" id="input-new-email">
    </div>
    <!--new-email-subject-part-->
    <div id="new-email-subject-part">
        <label for="new-email-subject" id="input-new-email-subject-text">Email subject: </label>
        <input type="text" name="newEmailSubject" id="input-new-email-subject">
    </div>
    <!--new-email-subject-content-->
    <div id="new-email-subject-content">
        <label for="new-email-text" id="input-new-email-subject-content-text">Email text content: </label>
        <textarea rows="10" name="newEmailSubjectContent" id="input-new-email-content-subject"></textarea>
    </div>
    <!--center compose button-->
    <div id="center-compose">
        <input type="submit" name="sendEmail" id="input-send-form" value="Send email">
        <input type="submit" name="saveDraft" id="input-save-form" value="Save draft">
        <input type="reset" name="clearContents" id="input-clear2-form" value="Clear contents">
    </div>
</form>


<?php

    //if isset send email 
    if (isset($_POST['sendEmail'])){
        //sanitize Data of input
        $recipientFullName = sanitizeData($_POST["fullname"]);
        $recipientEmail = sanitizeData($_POST["newEmail"]);
        $emailSubject = sanitizeData($_POST["newEmailSubject"]);
        $emailTextContent = sanitizeData($_POST["newEmailSubjectContent"]);
        $date = date("Y-m-d H:i:s");
        /*
            knowledge about date in php
            URL: https://www.w3schools.com/php/php_date.asp
            Accessed Date: 2021/11/10
         */

        //store the email, fname, lname in session
        $email = $_SESSION["email"];
        $firstname = $_SESSION["fname"];
        $lastname = $_SESSION["lname"];

        //if four input area is not empty then insert in to j_mail
        if (!empty($recipientFullName) && !empty($recipientEmail) && !empty($emailSubject) && !empty($emailTextContent)){
            $sendSQL = "INSERT INTO `j_mail`(`j_mail_id`, `j_mail_recipient_email`, `j_mail_recipient_fullname`, `j_mail_sender_email`, `j_mail_sender_fullname`, `j_mail_subject`, `j_mail_text`, `j_mail_date`, `j_mail_draft`) VALUES (NULL,'$recipientEmail', '$recipientFullName', '$email', '$firstname $lastname', '$emailSubject', '$emailTextContent', '$date', 0)";
			$conn->query($sendSQL);
        }
        header("Location: index.php?show=inbox");
        die();
    }

    //if isset saveDraft
    if (isset($_POST['saveDraft'])){
        //sanitize Data of input
        $recipientFullName = sanitizeData($_POST["fullname"]);
        $recipientEmail = sanitizeData($_POST["newEmail"]);
        $emailSubject = sanitizeData($_POST["newEmailSubject"]);
        $emailTextContent = sanitizeData($_POST["newEmailSubjectContent"]);
        $date = date("Y-m-d H:i:s");

        //store the email, fname, lname in session
        $email = $_SESSION["email"];
        $firstname = $_SESSION["fname"];
        $lastname = $_SESSION["lname"];

        //if four input area is not empty then insert in to j_mail
        if (!empty($recipientFullName) && !empty($recipientEmail) && !empty($emailSubject) && !empty($emailTextContent)){
            $saveSQL = "INSERT INTO `j_mail`(`j_mail_id`, `j_mail_recipient_email`, `j_mail_recipient_fullname`, `j_mail_sender_email`, `j_mail_sender_fullname`, `j_mail_subject`, `j_mail_text`, `j_mail_date`, `j_mail_draft`) VALUES (NULL,'$recipientEmail', '$recipientFullName', '$email', '$firstname $lastname', '$emailSubject', '$emailTextContent', '$date', 1)";
			$conn->query($saveSQL);
        }
        header("Location: index.php?show=inbox");
        die();

    }

?>

<?php
    }else{
        header("Location: ../index.php");
        die();
    }
?>