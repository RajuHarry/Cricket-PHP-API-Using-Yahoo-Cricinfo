<html>
<head>
<title>Cricinfo - Live Cricket Score Update</title>
<link rel="stylesheet" href="http://shine4mobile.hexat.com/creator_template.css" type="text/css" />
</head>
<body>
<h1>Live Cricket Score Feed</h1>
<?php
$rss = simplexml_load_file('http://static.cricinfo.com/rss/livescores.xml');
foreach ($rss->channel->item as $item) { 
   echo '<div class="line">';
   echo "<p>" . $item->description . "</p>";
   echo '</div>';
} 
?>
</body>
</html>