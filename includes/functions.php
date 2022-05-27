<?php
    !defined('INIT_PHPV') && header("Location: ../index.php");
    /*
    Knowledge about direct access to PHP pages is forbidden, only use require
    URL: http://blog.sina.com.cn/s/blog_5816512201009hnx.html
    Date Accessed: 2021/11/17
    */
?>

<?php
/*function for sanitizeData */
    function sanitizeData($data) {
        $cleanData = trim($data);
        $cleanData = stripslashes($cleanData);
        $cleanData = htmlspecialchars($cleanData);
        return $cleanData;
    }
?>
