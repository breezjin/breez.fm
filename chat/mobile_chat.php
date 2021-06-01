<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php

function chat_keycode($select, $key, $server, $nick='', $id='', $level='') {
	//이 함수는 절대 수정하지 마세요.
	if($select)
		return md5(md5(iconv(mb_detect_encoding($nick, "UTF-8, EUC-KR, ASCII"), 'UTF-8', $nick).$key).$level.iconv(mb_detect_encoding($id, "UTF-8, EUC-KR, ASCII"), 'UTF-8', $id).$key);
	else
		return md5(md5($server['REMOTE_ADDR'].$key).$key);
}
?>

<script src='http://uchat.co.kr/uchat.php' charset='UTF-8'></script>
<script type='text/javascript'>
u_chat({
room:'gloomycafe'
, md5:'<?php echo chat_keycode(1, '1b6ab5e606eed55b4e5a643c5cdbb914', $_SERVER, $닉네임변수, $아이디변수, $레벨변수)?>'
, nick:'<?php echo $닉네임변수?>'
, mb_id:'<?php echo $아이디변수?>'
, level:'<?php echo $레벨변수?>'
, skin:'1'
, chat_record:true
, width:'305'
, height:'480'
});
</script>
</body>
</html>