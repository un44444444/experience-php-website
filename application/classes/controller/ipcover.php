<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Ipcover extends Controller {

	public function action_index()
	{
		if(!function_exists('imagetypes'))
			die("ERROR: GD LIB IS NOT LOADED!");
		//header("Content-type: image/png");
		$this->response->headers('Content-type', 'image/png');
		
		/*=================*/
		
		$im = @imagecreatefrompng (APPPATH."cover.png");//读取图片名
		$color = imagecolorallocate($im, 183, 150, 37); //文字颜色
		
		$client_address = $_SERVER["REMOTE_ADDR"];
		//$user_agent = $_SERVER['HTTP_USER_AGENT'];
		//$client_system = $this->_get_system($user_agent);
		//$client_browser = $this->_get_browser($user_agent);
		$browser = new Browser();
		$client_system = $browser->getPlatform();
		$client_browser = $browser->getBrowser();
		imagestring($im,3,125,44,
			"[ From $client_address / $client_system / $client_browser ]",
			$color); //（$im,字大小，左右，上下）
		imagepng($im);
		imagedestroy($im);
		//$this->response->body('');
	}

	private function _get_browser($b)
	{
		$ie40 = preg_match("/IE 4.0/i", $b);
		$ie50 = preg_match("/IE 5.0/i", $b);
		$ie55 = preg_match("/IE 5.5/i", $b);
		$ie60 = preg_match("/IE 6.0/i", $b);
		$opera = preg_match("/Opera/i", $b);
		if ($ie40 == 1) {
			$browser = "Ie 4.0";
		} else if ($ie50 == 1) {
			$browser = "IE 5.0";
		} else if ($ie55 == 1) {
			$browser = "IE 5.5";
		} else if ($ie60 == 1) {
			$browser = "IE 6.0";
		} else if ($opera == 1) {
			$browser = "Opera";
		} else {
			$browser = "n/a";
		}
		return($browser);
	}

	private function _get_system($so)
	{
		$windowsxp = preg_match("/Windows nt 5.1/i", $so);
		$windowsxp2 = preg_match("/Windows xp/i", $so);
		$linux = preg_match("/Linux/i", $so);
		$windowsme = preg_match("/Win 9x 4.90/i", $so);
		$windowsme2 = preg_match("/Windows me/i", $so);
		$windows2k = preg_match("/Windows nt 5.0/i", $so);
		$windows2kb = preg_match("/Windows 2000/i", $so);
		$windowsnt = preg_match("/Windows nt 3.1/i", $so);
		$windowsnt2 = preg_match("/Windows nt 3.5.0/i", $so);
		$windowsnt3 = preg_match("/Windows nt 3.5.1/i", $so);
		$windowsnt4 = preg_match("/Windows nt 4.0/i", $so);
		$windows98 = preg_match("/Windows 98/i", $so);
		$windows95 = preg_match("/Windows 95/i", $so);
		if ($windowsxp == 1 or $Windowsxp2 == 1) {
			$sys = "Win XP";
		} else if ($linux == 1) {
			$sys = "Linux";
		} else if ($windowsme == 1 or $windowsme2 == 1) {
			$sys = "Win ME";
		} else if ($windows2k == 1 or $windows2kb == 1) {
			$sys = "Win 2000";
		} else if ($windowsnt == 1 or $windowsnt2 == 1 or $windowsnt3 == 1 or $windowsnt4 == 1) {
			$sys = "Win NT";
		} else if ($windows98 == 1 and $windowsme != 1) {
			$sys = "Win 98";
		} else if ($windows95 == 1) {
			$sys = "Win 95";
		} else {
			$sys = "n/a";
		}
		return($sys);
	}

} // End Controller_Ipcover
