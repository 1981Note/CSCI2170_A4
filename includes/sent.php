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


<?php
//if isset mailID
    if (!isset($_GET['mailID'])){
?>
    <!--then show the table about sent emails-->
    <h3>Sent emails</h3>
    <table>
        <tr class="thead">
            <th>SENT TO</th>
            <th>EMAIL SUBJECT</th>
            <th>RECEIVED</th>
        </tr>

        <?php
            //store the session fname from session
            $firstname = $_SESSION["fname"];
            //store the session lname from session
            $lastname = $_SESSION["lname"];

            //select the mail record is sent and not a draft when j_mail_draft is 0
            $querySQL = "SELECT * FROM j_mail WHERE j_mail_sender_fullname LIKE '%$firstname%' AND j_mail_draft = 0 ORDER BY j_mail_date DESC";
            $result = $conn->query($querySQL);
            //echo all the result
            //knowledge from CSCI2170 while loop the table
            if($result){
                if (mysqli_num_rows($result) > 0) {
                    while ($row = $result->fetch_assoc()){
                        //echo the result
                        echo "<tr class='inbox'>";
                        echo "<td class='fullname'>" . $row["j_mail_recipient_fullname"] . "</td>";
                        echo "<td class='subject'><a href='index.php?show=sent&mailID={$row['j_mail_id']}'>" . $row["j_mail_subject"] . "</a></td>";
                        echo "<td class='date'>" . $row["j_mail_date"] . "</td>";
                        echo "</tr>";
                    }
                }
            }

        ?>
    </table>

    <!--then show the table about Draft/saved emails-->
    <h3>Draft/saved emails</h3>
    <table>
        <tr class="thead">
            <th>SENT TO</th>
            <th>EMAIL SUBJECT</th>
            <th>RECEIVED</th>
        </tr>

        <?php
        
            //store the session fname from session
            $firstname = $_SESSION["fname"];
            //store the session lname from session
            $lastname = $_SESSION["lname"];

            //select the email record is saved and not sent and is a draft when j_mail_draft is 1
            $querySQL = "SELECT * FROM j_mail WHERE j_mail_sender_fullname LIKE '%$firstname%' AND j_mail_draft = 1 ORDER BY j_mail_date DESC";
            $result = $conn->query($querySQL);
            //echo all the result
            //knowledge from CSCI2170 while loop the table
            if($result){
                if (mysqli_num_rows($result) > 0) {
                    while ($row = $result->fetch_assoc()){
                        //echo the result
                        echo "<tr class='inbox'>";
                        echo "<td class='fullname'>" . $row["j_mail_recipient_fullname"] . "</td>";
                        echo "<td class='subject'><a href='index.php?show=sent&draft=true&mailID={$row['j_mail_id']}'>" . $row["j_mail_subject"] . "</a></td>";
                        echo "<td class='date'>" . $row["j_mail_date"] . "</td>";
                        echo "</tr>";
                    }
                }
            }

        ?>
    </table>

<?php
//if isset mailID and not isset draft
    }else if (isset($_GET['mailID']) && !isset($_GET['draft'])){
        //find the sameID in j_mail
        $mailID = $_GET['mailID'];
        $sameid = "SELECT * FROM  j_mail where j_mail_id = " . $mailID;
        $result3 = $conn->query($sameid);
        
        if ($result3){
            while ($row3 = $result3->fetch_assoc()){
                //echo the result
                echo "<h3>Sent emails</h3>";
                echo "<p class='content'><strong class='italic'>Sent to: </strong>" . $row3['j_mail_recipient_fullname'] . " (" . $row3['j_mail_recipient_email'] . ")</p>";
                echo "<p class='content'><strong class='italic'>Email sent on: </strong>" . $row3['j_mail_date'] . "</p>";
                echo "<p class='content'><strong class='italic'>Subject：</strong><a href='index.php?show=sent&mailID={$row3['j_mail_id']}'>" . $row3['j_mail_subject'] . "</a></p>";
                echo "<p class='email-content'><strong class='italic'>Email content: </strong></p>";
                echo "<p class='email-all-content'>" . nl2br($row3['j_mail_text']) . "</p>";
            }
        }
?>   

<?php
//if isset mailID and isset draft
    }else if (isset($_GET['mailID']) && isset($_GET['draft'])){
        //find the sameID in j_mail
        $mailID = $_GET['mailID'];
        $sameid = "SELECT * FROM  j_mail where j_mail_id = " . $mailID;
        $result3 = $conn->query($sameid);
        
        if ($result3){
            while ($row3 = $result3->fetch_assoc()){
                //echo the result
                echo "<h3>Draft/saved emails</h3>";
                echo "<p class='content'><strong class='italic'>Sent to: </strong>" . $row3['j_mail_recipient_fullname'] . " (" . $row3['j_mail_recipient_email'] . ")</p>";
                echo "<p class='content'><strong class='italic'>Email sent on: </strong>" . $row3['j_mail_date'] . "</p>";
                echo "<p class='content'><strong class='italic'>Subject：</strong><a href='index.php?show=sent&draft=true&mailID={$row3['j_mail_id']}'>" . $row3['j_mail_subject'] . "</a></p>";
                echo "<p class='email-content'><strong class='italic'>Email content: </strong></p>";
                echo "<p class='email-all-content'>" . nl2br($row3['j_mail_text']) . "</p>";
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