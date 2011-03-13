<?php
	define('INCLUDE_CHECK',1);
	require "config.php";
?>
<!DOCTYPE HTML>
<html>
<head>
	<title><?php echo $sitetitle; ?></title>
	<meta name="keywords" content="<?php echo $sitekeywords; ?>"/>
	<meta name="description" content="<?php echo $sitedescription; ?>"/>
	<link rel="stylesheet" href="style.css" type="text/css">
	<script type="text/javascript">

		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', '<?php echo $sitegoogleanalytics; ?>']);
		_gaq.push(['_trackPageview']);
		
		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();

</script>
</head>
<body>
	<h1><?php echo $sitetitle; ?></h1>
	<div id="container"> 

<?php
	$location = "index.php";
	$email = strtolower(mysql_real_escape_string($_REQUEST['email']));
	$hashed = substr(md5($email), 0, 4);
	$invites = 0;
	$uri = $_REQUEST['uri'];
	
	if (!$email){
		echo "lol! ur doin it rong!<br>Go <a href=\"/\">here</a>.<br>";
		header( "Location: $location" );
	}
	else{	
		$insertinto = mysql_query("INSERT IGNORE INTO interested (email, hash, invites) VALUES ('$email', '$hashed', '$invites')") or die('Sad pandas');
		if (mysql_affected_rows() == 0){
			$getlink = mysql_query("SELECT hash,invites from interested WHERE hash='$hashed'");
			while($row = mysql_fetch_assoc($getlink)){
				$existinghash = $row['hash'];
				$totalinvites = $row['invites'];
			}
			echo "<p>Welcome back!<br>";
			if ($totalinvites > 0){
				echo "You have ".$totalinvites." invites under your belt.</p>";
			}
			else{
				echo "You don't have any invites under your belt, yet.</p>";
			}
			echo "The more friends you invite, the sooner you'll get access!<br>Copy/paste this URL below into Twitter, Facebook, or an email:<br><input type=text size=27 readonly onClick=select(); value=\"http://".$sitedomain."/".$existinghash."\"><br>";
			echo "<p>You can also use the buttons below to easily share this invite link to your social networks:<br><script src=\"http://connect.facebook.net/en_US/all.js#xfbml=1\"></script><fb:like href=\"http://".$sitedomain."/".$existinghash."\" layout=\"button_count\" show_faces=\"false\" width=\"450\" action=\"recommend\" font=\"\"></fb:like> <a href=\"http://twitter.com/share\" class=\"twitter-share-button\" data-url=\"http://".$sitedomain."/".$existinghash."\" data-text=\"I'm in line for @".$twittername."; ".$sitedescription."\" data-count=\"none\" data-via=\"".$sitetitle."\">Tweet</a><script type=\"text/javascript\" src=\"http://platform.twitter.com/widgets.js\"></script></p>";
		}
		elseif ($uri){
			$updateinvites = mysql_query("UPDATE interested SET invites=invites+1 WHERE hash='$uri'") or die('oh noes!');
			echo "The more friends you invite, the sooner you'll get access!<br>Copy/paste this URL below into Twitter, Facebook, or an email:<br><input type=text size=27 readonly onClick=select(); value=\"http://".$sitedomain."/".$hashed."\"><br>";
			echo "<p>You can also use the buttons below to easily share this invite link to your social networks:<br><script src=\"http://connect.facebook.net/en_US/all.js#xfbml=1\"></script><fb:like href=\"http://".$sitedomain."/".$hashed."\" layout=\"button_count\" show_faces=\"false\" width=\"450\" action=\"recommend\" font=\"\"></fb:like> <a href=\"http://twitter.com/share\" class=\"twitter-share-button\" data-url=\"http://".$sitedomain."/".$hashed."\" data-text=\"I'm in line for @".$twittername."; ".$sitedescription."\" data-count=\"none\" data-via=\"".$sitetitle."\">Tweet</a><script type=\"text/javascript\" src=\"http://platform.twitter.com/widgets.js\"></script></p>";
		}
		else{
			echo "The more friends you invite, the sooner you'll get access!<br>Copy/paste this URL below into Twitter, Facebook, or an email:<br><input type=text size=27 readonly onClick=select(); value=\"http://".$sitedomain."/".$hashed."\"><br>";
			echo "<p>You can also use the buttons below to easily share this invite link to your social networks:<br><script src=\"http://connect.facebook.net/en_US/all.js#xfbml=1\"></script><fb:like href=\"http://".$sitedomain."/".$hashed."\" layout=\"button_count\" show_faces=\"false\" width=\"450\" action=\"recommend\" font=\"\"></fb:like> <a href=\"http://twitter.com/share\" class=\"twitter-share-button\" data-url=\"http://".$sitedomain."/".$hashed."\" data-text=\"I'm in line for @".$twittername."; ".$sitedescription."\" data-count=\"none\" data-via=\"".$sitetitle."\">Tweet</a><script type=\"text/javascript\" src=\"http://platform.twitter.com/widgets.js\"></script></p>";
		}
	}
?>

		<p><a href="http://<?php echo $sitedomain; ?>">Home</a> | We're sort of <a href="http://twitter.com/<?php echo $twittername; ?>" target="_blank">on Twitter</a></p> 
		</form> 
	</div>
</body>
</html>