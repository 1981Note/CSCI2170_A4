# CSCI 2170
## Assignment 4 (Fall 2021)


### Student Details
* Student Name: Siyuan Chen
* B00 Number: B00831463
* Dal E-mail Address: sy611254@dal.ca


## Description of Changes Made to Folders/Files
* A4/index.php: 
    1. I define this page is 'INIT_PHPV', check whether this constant exists on other subpages, and direct to index.php if it does not exist.
    2. session start, if not isset session email, then header login page, else give the nav bar.
    3. Give the option to require page, if get show in index page, then go to the pages that they require.
    4. Also, require header and footer page

* includes/index.php:
    1. add a index.php file, when users enter URL includes, then dump to index.php of the main page.

* css/main.css:
    1. change the style of A4 according to the video given by professor

* functions.php: 
    1. A function that sanitizeData

* inbox.php:
    1. if isset session email, then give the inbox page
    2. if isset mailID then give the subject content

* sent.php:
    1. if isset session email, then give the sent email and draft email
    2. if isset mailID then give the subject content
    3. if isset draft then give the draft content, else give the inbox content

* compose.php:
    1. if post sentEmail button, then insert draft = 0 to j_email table
    2. if post saveDraft button, then insert draft = 1 to j_email table

* db.php:
    1. connect database to server

* header.php, footree.php:
    1. header and footer

* login.php: 
    1. user login and verify the hash password

* more information can find in comment from code.

## More information
1. I try to write bonus, however, I do not know how to get the row of table if document position is changed...
2. My local port is 3307

## Citations
1. The session destroy code is considered to be standard / best-practice implementation. 
    It is available as Example #1 on: http://php.net/manual/en/function.session-destroy.php \
    Accessed on 19 Oct 2021. 

2. Knowledge about direct access to PHP pages is forbidden, only use require
    URL: http://blog.sina.com.cn/s/blog_5816512201009hnx.html \
    Date Accessed: 2021/11/17 

3. knowledge about date in php
    URL: https://www.w3schools.com/php/php_date.asp \
    Accessed Date: 2021/11/10 

4. Link to the CSS reset file, Normalize.css 
    Author: Nicolas Gallagher \
    URL: https://necolas.github.io/normalize.css/ \
    Date accessed: 31 Oct 2021 

5. Knowledge about how to list by descending order
    URL: https://www.w3schools.com/sql/sql_ref_desc.asp \
    Accessed Date: 2021/11/10 

6. Knowledge about how to echo data as it is in the database the same format
    URL: https://stackoverflow.com/questions/29088881/how-to-echo-data-as-it-is-in-the-db-the-same-format \
    Date Accessed: 2021/11/10 

7. knowledge about how to create login script from CSCI2170 class and zybook
    URL: https://learn.zybooks.com/zybook/DALCSCI2170SampangiFall2021/chapter/8/section/1 \
    Accessed Date: 2021/11/1 - 2021/11/14 

8. Knowledge about how to verify the password and hash password in zybook create by CSCI2170 Professor Sampangi in Fall 2021
    URL: https://learn.zybooks.com/zybook/DALCSCI2170SampangiFall2021/chapter/8/section/1 \
    Accessed Date: 2021/11/8 

9. How to create login form from w3school
    URL: https://www.w3schools.com/howto/howto_css_login_form.asp \
    Date Accessed: 2021-10-31 

10. Knowledge about how to reset the form, use type="reset"
    URL: https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/reset \
    Accessed Date: 2021/11/10 

11. I have used colours from the following website:
	URL: https://flatuicolors.com/ \
    Date Accessed: 15 November 2021

12. Website to find how to center two button side by side
    URL: https://coder-coder.com/how-to-center-button-with-html-css/ \
    Accessed Date: 2021/11/14