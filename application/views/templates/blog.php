<?php
header("Cache-Control: must-revalidate");
$offset = 60 * 60 * 24 * 10;
$ExpStr = "Expires: " . gmdate("D, d M Y H:i:s", time() + $offset) . " GMT";
header($ExpStr);
if (stristr($_SERVER["HTTP_ACCEPT"],"application/xhtml+xml"))
{
	header('Content-type: application/xhtml+xml; charset=utf-8');
	echo "".'<?xml version="1.0" encoding="utf-8"?>'."\n";
}
else
{
	header('Content-type: application/xml; charset=utf-8');
	echo "".'<?xml version="1.0" encoding="utf-8"?>'."\n";
	echo "".'<?xml-stylesheet type="text/xsl" href="/kohana/assets/copy.xsl"?>'."\n";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN" "http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head> 
	<title> chenw home </title> 
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	<meta name="keywords" content="chenw" /> 
	<meta name="description" content="chenw home page" /> 
<style type="text/css">
	div#header {height:80px;background:blue;}
	div#maincontent {width:100%;min-width:300px;background:#eee;}
	div#contentwrapper {float:left;width:100%;background:#eee;}
	div#sidebar_left {float:left;width:0px;margin-left: -100%;background:pink;}
	div#sidebar {float:left;width:200px;margin-left: -200px;background:red;}
	div#content {margin:0 200px 0 0;background:yellow;}
	div#footer {height:56px;background:green;clear:left;}
</style> 
</head> 
<body> 
	<div id="header" class="wide_row">
		<div><h2>LOGO</h2></div>
		<span><a>菜单1</a><a>菜单2</a></span>
	</div> 
	<div id="maincontent" class="wide_row"> 
<?php echo $content;?>
	</div> 
	<div id="footer" class="wide_row"></div> 
</body> 
</html>
