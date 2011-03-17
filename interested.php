<?php
	define('INCLUDE_CHECK',1);
	require "config.php";
?>
<!DOCTYPE html>
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

	<div id="top">
	</div>

	<div id="outer">
	
	<h1><a href="http://<?php echo $sitedomain; ?>"><?php echo $sitetitle; ?></a></h1>

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
	elseif (filter_var($email, FILTER_VALIDATE_EMAIL)){
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
			echo "<p>The more friends you invite, the sooner you'll get access!<br>Copy/paste this URL below into Twitter, Facebook, or an email:</p><p><input type=text size=27 readonly onClick=select(); value=\"http://".$sitedomain."/".$existinghash."\"></p>";
			echo "<p>Or use the buttons:<br><iframe src=\"http://www.facebook.com/plugins/like.php?href=http%3A%2F%2F".$sitedomain."%2F".$existinghash."&amp;layout=button_count&amp;show_faces=false&amp;width=150&amp;action=recommend&amp;font&amp;colorscheme=light&amp;height=20\" scrolling=\"no\" frameborder=\"0\" style=\"border:none; overflow:hidden; width:150px; height:20px;\" allowTransparency=\"true\"></iframe> <a href=\"http://twitter.com/share\" class=\"twitter-share-button\" data-url=\"http://".$sitedomain."/".$existinghash."\" data-text=\"I'm in line for @".$twittername."; ".$sitedescription."\" data-count=\"none\" data-via=\"".$sitetitle."\">Tweet</a><script type=\"text/javascript\" src=\"http://platform.twitter.com/widgets.js\"></script></p>";
		}
		elseif ($uri){
			$updateinvites = mysql_query("UPDATE interested SET invites=invites+1 WHERE hash='$uri'") or die('oh noes!');
			echo "<p>The more friends you invite, the sooner you'll get access!<br>Copy/paste this URL below into Twitter, Facebook, or an email:</p><p><input type=text size=27 readonly onClick=select(); value=\"http://".$sitedomain."/".$hashed."\"></p>";
			echo "<p>Or use the buttons:<br><iframe src=\"http://www.facebook.com/plugins/like.php?href=http%3A%2F%2F".$sitedomain."%2F".$hashed."&amp;layout=button_count&amp;show_faces=false&amp;width=150&amp;action=recommend&amp;font&amp;colorscheme=light&amp;height=20\" scrolling=\"no\" frameborder=\"0\" style=\"border:none; overflow:hidden; width:150px; height:20px;\" allowTransparency=\"true\"></iframe> <a href=\"http://twitter.com/share\" class=\"twitter-share-button\" data-url=\"http://".$sitedomain."/".$hashed."\" data-text=\"I'm in line for @".$twittername."; ".$sitedescription."\" data-count=\"none\" data-via=\"".$sitetitle."\">Tweet</a><script type=\"text/javascript\" src=\"http://platform.twitter.com/widgets.js\"></script></p>";
		}
		else{
			echo "<p>The more friends you invite, the sooner you'll get access!<br>Copy/paste this URL below into Twitter, Facebook, or an email:</p><p><input type=text size=27 readonly onClick=select(); value=\"http://".$sitedomain."/".$hashed."\"></p>";
			echo "<p>Or use the buttons:<br><iframe src=\"http://www.facebook.com/plugins/like.php?href=http%3A%2F%2F".$sitedomain."%2F".$hashed."&amp;layout=button_count&amp;show_faces=false&amp;width=150&amp;action=recommend&amp;font&amp;colorscheme=light&amp;height=20\" scrolling=\"no\" frameborder=\"0\" style=\"border:none; overflow:hidden; width:150px; height:20px;\" allowTransparency=\"true\"></iframe> <a href=\"http://twitter.com/share\" class=\"twitter-share-button\" data-url=\"http://".$sitedomain."/".$hashed."\" data-text=\"I'm in line for @".$twittername."; ".$sitedescription."\" data-count=\"none\" data-via=\"".$sitetitle."\">Tweet</a><script type=\"text/javascript\" src=\"http://platform.twitter.com/widgets.js\"></script></p>";
		}
	}
	else {
		echo "i can haz ur rite email?<br><ul><li><a href=\"/\">Yes</a></li><li>No</li><li>Maybe</li></ul>";
		header( "Location: $location" );
	}
?>

	<p class="tiny">(We're sort of on <a href="http://twitter.com/<?php echo $twittername; ?>" target="_blank">Twitter</a>.)</p>

	</div>
	<div id="bottom">
	</div>

</body>
</html>