<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
</head>

<body>
<?php
//Do not put http:// in front of the IP address or the script will not work
$sc_url_ip = "joycast.net";
$sc_url_port = "7600";
////////////////////
// END OF CONFIG AREA
//
// DO NOT EDIT BELOW
// UNLESS YOU KNOW WHAT YOU ARE DOING
////////////////////

function getNowPlaying($sc_url_ip,$sc_url_port)
{

$open = fsockopen($sc_url_ip,$sc_url_port,$errno,$errstr,'.5'); 
	if ($open) { 
	fputs($open,"GET /7.html HTTP/1.1\nUser-Agent:Mozilla\n\n"); 
	stream_set_timeout($open,'1');
	$read = fread($open,2000);
	$text = explode(",",$read);
	if($text[6] == '' || $text[6] == '</body></html>'){ $msg = ' live stream '; } else { $msg = $text[6]; }
	$text = ''.$msg;
	} else {  return false; } 
	fclose($open);
	
	return $text;	
}

//////////////////

//get the now playing
$current_song = getNowPlaying($sc_url_ip,$sc_url_port);
if(preg_match('/Live - Default User/',$current_song))
echo "  ";
else
print $current_song;
?>
</body>
</html>