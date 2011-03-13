<?php
if(!defined('INCLUDE_CHECK')) die('You are not allowed to execute this file directly');

/* Database Config */
$db_host		= 'HOST'; // FQDN to the server hosting the database
$db_user		= 'USER'; // Database admin username
$db_pass		= 'PASSWORD'; // Database admin password
$db_database	= 'DATABASE';  // Database name
/* End Database Config */

/* Site Config */
$sitedomain = 'DOMAIN.TLD'; // This site's domain name, including the www. if required (ie: google.com)
$sitetitle = 'TITLE'; // Title tag for the site
$sitekeywords = 'key, words'; // Keywords for the site
$sitedescription = 'DESCRIPTION'; // Description for the site, also used in Tweet (for now) so keep it short!
$siteblurb = 'BLURB'; // Blurb about site, displayed on main page
$sitegoogleanalytics = 'UA-#######-##'; // Google Analytics code for the site
$twittername = 'TWITTERUSERNAME'; // Twitter name for site
/* End Site Config */

$link = mysql_connect($db_host,$db_user,$db_pass) or die("Could not connect: " . mysql_error());
mysql_select_db($db_database,$link);
?>