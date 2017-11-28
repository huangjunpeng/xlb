<?php
class My_View_Helper_Googleads {
	public $view;
	var $show_das;
	var $pubid;
	var $adchannel;
	public function setView(Zend_View_Interface $views) {
		$this->view = $views;
	}
	
	/**
	 * google广告函数
	 *
	 */
	function googleads($ad_format, $color_border="FFFFFF", $color_bg="FFFFFF", $color_link="1480CD", $color_url="000000", $color_text="000000")
	{
		$this->show_das = $this->view->show_das;
		$this->pubid = $this->view->ads_id;
		$this->adchannel = $this->view->ads_channel;
		
		if ($this->show_das == true) {
			$adsense = '';
			switch($ad_format) {
				//Text only ads
				case "728x90_as": // LEADERBOARD
				$ad_width = "728";
				$ad_height = "90";
				$ad_type = "text";
				break;
				case "468x60_as": // BANNER
				$ad_width = "468";
				$ad_height = "60";
				$ad_type = "text";
				break;
				case "336x280_as": // LARGE RECTANGLE
				$ad_width = "336";
				$ad_height = "280";
				$ad_type = "text";
				break;
				case "300x250_as": // MEDIUM RECTANGLE
				$ad_width = "300";
				$ad_height = "250";
				$ad_type = "text";
				break;
				case "250x250_as": // SQUARE
				$ad_width = "250";
				$ad_height = "250";
				$ad_type = "text";
				break;
				case "234x60_as": // HALF BANNER
				$ad_width = "234";
				$ad_height = "60";
				$ad_type = "text";
				break;
				case "180x150_as": // SMALL RECTANGLE
				$ad_width = "180";
				$ad_height = "150";
				$ad_type = "text";
				break;
				case "160x600_as": // WIDE SKYSCRAPER
				$ad_width = "160";
				$ad_height = "600";
				$ad_type = "text";
				break;
				case "125x125_as": // BUTTON
				$ad_width = "125";
				$ad_height = "125";
				$ad_type = "text";
				break;
				case "120x600_as": // SKYSCRAPER
				$ad_width = "120";
				$ad_height = "600";
				$ad_type = "text";
				break;
				case "120x240_as": // VERTICAL BANNER
				$ad_width = "120";
				$ad_height = "240";
				$ad_type = "text";
				break;
				// LINK UNITS (4 LINKS PER UNIT)
				case "728x15_0ads_al":
					$ad_width = "728";
					$ad_height = "15";
					$ad_type = "";
					break;
				case "468x15_0ads_al":
					$ad_width = "468";
					$ad_height = "15";
					$ad_type = "";
					break;
				case "200x90_0ads_al":
					$ad_width = "200";
					$ad_height = "90";
					$ad_type = "";
					break;
				case "180x90_0ads_al":
					$ad_width = "180";
					$ad_height = "90";
					$ad_type = "";
					break;
				case "160x90_0ads_al":
					$ad_width = "160";
					$ad_height = "90";
					$ad_type = "";
					break;
				case "120x90_0ads_al":
					$ad_width = "120";
					$ad_height = "90";
					$ad_type = "";
					break;
					// LINK UNITS (5 LINKS PER UNIT)
				case "728x15_0ads_al_s":
					$ad_width = "728";
					$ad_height = "15";
					$ad_type = "";
					break;
				case "468x15_0ads_al_s":
					$ad_width = "468";
					$ad_height = "15";
					$ad_type = "";
					break;
				case "200x90_0ads_al_s":
					$ad_width = "200";
					$ad_height = "90";
					$ad_type = "";
					break;
				case "180x90_0ads_al_s":
					$ad_width = "180";
					$ad_height = "90";
					$ad_type = "";
					break;
				case "160x90_0ads_al_s":
					$ad_width = "160";
					$ad_height = "90";
					$ad_type = "";
					break;
				case "120x90_0ads_al_s":
					$ad_width = "120";
					$ad_height = "90";
					$ad_type = "";
					break;
			}
			$adsense .=
			"\n" . "<script type=\"text/javascript\"><!--
	google_ad_client = \"".$this->pubid."\";
	google_ad_width = $ad_width;
	google_ad_height = $ad_height;
	google_ad_format = \"$ad_format\";";
			if ($ad_type !== "") {
				$adsense .= "\n" . "google_ad_type = \"$ad_type\";";
			}
			$adsense .= "\n" . "google_ad_channel =\"".$this->adchannel."\";
	google_color_border = \"$color_border\";
	google_color_bg = \"$color_bg\";
	google_color_link = \"$color_link\";
	google_color_url = \"$color_url\";
	google_color_text = \"$color_text\";
	//--></script>
	<script type=\"text/javascript\" src=\"http://pagead2.googlesyndication.com/pagead/show_ads.js\">
	</script>";
			$adsense .= "\n";
			echo $adsense;
		}
	}
}
?>
