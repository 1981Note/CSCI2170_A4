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


<!--head for inbox section-->
<h3>Inbox</h3>
<!--if not get the mailID from subject-->
<?php
    if (!isset($_GET['mailID'])){
?>
<!--then show the table-->
<table id="inboxTable">
    <tr class="thead">
        <th>FROM</th>
        <th>EMAIL SUBJECT</th>
        <th>RECEIVED</th>
    </tr>

    <?php
        //store the session fname from session
        $firstname = $_SESSION["fname"];
        //store the session lname from session
        $lastname = $_SESSION["lname"];

        //use sql to find the recipient name like the first name order by j_mail_date
        /*
         * Knowledge about how to list by descending order
         * URL: https://www.w3schools.com/sql/sql_ref_desc.asp
         * Accessed Date: 2021/11/10
         */

        $querySQL = "SELECT * FROM j_mail WHERE j_mail_recipient_fullname LIKE '%$firstname%' ORDER BY j_mail_date DESC";
        $result = $conn->query($querySQL);


        //echo all the result
        //knowledge from CSCI2170 while loop the table
        if($result){
            //if result of row bigger than 0
            
            if (mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()){
                    //then echo the result
                    echo "<tr class='inbox'>";
                    echo "<td class='fullname'>" . $row["j_mail_sender_fullname"] . "</td>";
                    //echo the href link about subject
                    echo "<td class='subject'><a href='index.php?show=inbox&mailID={$row['j_mail_id']}'>" . $row["j_mail_subject"] . "</a></td>";
                    echo "<td class='date'>" . $row["j_mail_date"] . "</td>";
                    echo "</tr>";
                }
            }
        }
        

    ?>
</table>

<?php
//if get the mailID then use same id to find the mail
    }else if (isset($_GET['mailID'])){
        $mailID = $_GET['mailID'];
        $sameid = "SELECT * FROM  j_mail where j_mail_id = " . $mailID;
        $result3 = $conn->query($sameid);
        
        //echo the result
        if ($result3){
            while ($row3 = $result3->fetch_assoc()){
                echo "<p class='content'><strong class='italic'>Sender: </strong>" . $row3['j_mail_sender_fullname'] . " (" . $row3['j_mail_sender_email'] . ")</p>";
                echo "<p class='content'><strong class='italic'>Email sent on: </strong>" . $row3['j_mail_date'] . "</p>";
                echo "<p class='content'><strong class='italic'>Subject：</strong><a href='index.php?show=inbox&mailID={$row3['j_mail_id']}'>" . $row3['j_mail_subject'] . "</a></p>";
                echo "<p class='email-content'><strong class='italic'>Email content: </strong></p>";
                echo "<p class='email-all-content'>" . nl2br($row3['j_mail_text']) . "</p>";
                /*
                Knowledge about how to echo data as it is in the database the same format
                URL: https://stackoverflow.com/questions/29088881/how-to-echo-data-as-it-is-in-the-db-the-same-format
                Date Accessed: 2021/11/10
                */
            }
        }
    }

?>

<?php


    }else{
        header("Location: ../index.php");
        die();
    }
?>