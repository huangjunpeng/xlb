<?php

class Common_Plugin_Test
{
	public function say()
	{
		echo 'hello world!<br>';	
	}
}

require_once dirname(__FILE__).'/MsgCenterClient.php';
require_once dirname(__FILE__).'/Socket.php';
//说明
$client = new MsgCenterClient();
$client->SetSrv("127.0.0.1", 8081);

echo "\n\n----------心跳包------------\n\n";
//心跳
$body = "<msg cabiNo=\"3\" optType=\"cabiHeart\" />";
$reason = "";
//$client->SendOne2OneMsg("3", "8081", $body, 0, $reason);
//echo "return reason: ".$reason."\n";

echo "\n\n---------开门包-------------\n\n";
//开柜门命令
$body = "<msg cabiNo=\"3\" cabiSpaceNo=\"1\" bookNo=\"3001001\" userId=\"73\" optType=\"getBook\" />";
$reason = "";
$client->SendOne2OneMsg("73", "3", $body, 1, $reason);
echo "\n\n---------------------------\n\n";
//echo "return reason: ".$reason."\n";

?>
