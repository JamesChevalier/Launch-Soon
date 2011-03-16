<?php
if(!defined('INCLUDE_CHECK')) die('You are not allowed to execute this file directly');

/* Begin Config */
// FQDN to the server hosting the database:
$db_host = 'HOST';

// Database admin username:
$db_user = 'USER';

// Database admin password:
$db_pass = 'PASSWORD';

// Database name:
$db_database = 'DATABASE';

// This site's domain name, including the www. if required (ie: google.com):
$sitedomain = 'DOMAIN.TLD';

// Title tag for the site:
$sitetitle = 'TITLE';

// Keywords for the site:
$sitekeywords = 'KEY, WORDS';

// Description for the site, also used in Tweet (for now) so keep it short!:
$sitedescription = 'DESCRIPTION';

// Blurb about site, displayed on main page:
$siteblurb = 'BLURB';

// Google Analytics code for the site:
$sitegoogleanalytics = 'UA-#######-##';

// Twitter name for site:
$twittername = 'TWITTERUSERNAME';
/* End Config */

$link = mysql_connect($db_host,$db_user,$db_pass) or die("Could not connect: " . mysql_error());
mysql_select_db($db_database,$link);
?>