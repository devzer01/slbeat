<?php

define('SLB_DB', 'slbeat');
define('SLB_DBHOST', 'localhost');
define('SLB_DBUSER', 'root');
define('SLB_DBPASS', '');

define('APP_ID', "386041674873265");
define('APP_SECRET', "");
define('MY_URL', "http://lab.slbeat.com:10045/fblogin");
define('FACEBOOK_LOGIN_URL', 'https://www.facebook.com/dialog/oauth/?client_id='.APP_ID.'&redirect_uri='.MY_URL.'&scope=email,user_birthday,user_location,user_about_me,publish_actions&state=');
