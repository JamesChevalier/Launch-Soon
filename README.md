Launch-Soon
===========

Launch Soon is a drop-in PHP site that provides a viral launching soon page to collect users before your actual launch date.

The site is fairly standard in that it's collecting email addresses, but it also provides a unique URL to each user which keeps track of how many people they get to sign up.

This is an early release, so there's still a lot of customization that hasn't been added in yet.


Pre-requisites
--------------

* You need your own mysql database to be online and functional with the following characteristics:
	- Table name 'interested'
	- Field 'id' (bigint(20)?)
	- Field 'email' (varchar(1000)?)
	- Field 'hash' (varchar(8)?)
	- Field 'invites' (int(20)?)
	- The 'id' field must be set to auto-increment
	- The 'hash' field must be set as unique
* A Google Analytics Web Property ID (UA-#######-##) is required because Launch-Soon is currently hard-coded to use Google Analytics
* A Twitter account is require because Launch-Soon is currently hard-coded to link out to Twitter & provides custom Tweet sharing


SQL Statement
-------------

```sql
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
CREATE TABLE IF NOT EXISTS `interested` (
	`id` bigint(20) NOT NULL AUTO_INCREMENT,
	`email` varchar(1000) NOT NULL,
	`hash` varchar(8) NOT NULL,
	`invites` int(20) NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `hash` (`hash`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
```


Configuration
-------------

All configuration is done in the `config.php` file.  You are not required to touch any other files.