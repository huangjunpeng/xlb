<?php require_once("Socket.php");?>

<?php
define ("PROTOCAL", "%cu");

class MsgCenterClient
{
	public function __construct()
	{
		$this->m_tcpClient = new TcpClient();
	}
	
	public function __destruct()
	{}

	public function SetSrv($ip, $port)
	{
		$this->m_srvIp = $ip;
		$this->m_srvPort = $port;
	}

	function getMillisecond() {
		list($s1, $s2) = explode(' ', microtime());		
		return (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000);	
	}

	public function SendOne2OneMsg($from, $to, $body, $protocal, &$reason)
	{
		global $PROTOCAL;
		$sendmsg = "";
                if( 0 == $protocal ){//心跳包
                   $sendmsg .= '"cu';
                }elseif( 1 == $protocal ){//开柜门命令
                   $sendmsg .= '%cu'; 
                }else{
                    $reason = "protocal err";
                    return false;
                }
		//$sendmsg .= PROTOCAL;
		$sendmsg .= "from:"; $sendmsg .= $from; $sendmsg .= ";";
		$sendmsg .= "to:";	 $sendmsg .= $to;	$sendmsg .= ";";
		$callid = "webclient_".$this->getMillisecond();
		$callid .= $this->m_srvIp;

		$sendmsg .= "callid:"; $sendmsg .= $callid; $sendmsg .= ";";
		$sendmsg .= "body:";
		$sendmsg .= $body;
			
		$sz_stream = $this->Value2Stream(strlen($sendmsg), 4);
		$send_stream = $sz_stream.$sendmsg;
		$reason = "";

		if ( !$this->m_tcpClient->Connect($this->m_srvIp, $this->m_srvPort) )
		{
			$reason = "cannot connect to ". $this->m_srvIp." ".$this->m_srvPort;
			return false;
		}
		if ( !$this->m_tcpClient->Send($send_stream, strlen($sendmsg)+4) )
		{
			$reason = "send failed";
			return false;
		}
                $sendSize = strlen($sendmsg)+4;
                
		//echo $sendSize."---send msg=".$send_stream."\n";	
		$response = "";
		if ( !$this->m_tcpClient->Recv($response, 4, false) )
		{
			$reason = "recv header failed";
			return false;
		}
		$size = $this->Stream2Value($response, 4);
                $size = $size+4;
		if ( !$this->m_tcpClient->Recv($response, $size) )
		{
			$reason = "recv body failed";
			return false;
		}
		//echo $size."----response:".$response."\n";
		$pos = stripos($response, "code");
		if ( $pos == false ){
			$reason = "";
			return false;
		}
		$pos += 5; 
		$code = $response[$pos].$response[$pos+1].$response[$pos+2];
		//echo "code:".$code."\n";
		if( $code != "200" )
		{
			$reason = "code:".$code;
			return false;
		}

		return true;	
	}

	private function Value2Stream($value, $size)
    {
		$stream = "";
		for ( $i = $size - 1; $i > 0; $i-- )
		{
			$c = $value >> ($i*8) & 0x00000000000000FF;
			$stream  .= chr($c);
		}
		$c = $value & 0x00000000000000FF;
		$stream .= chr($c);

        return $stream;
    }
	
	private function Stream2Value($stream, $size)
    {
		$value = 0;
		$pos = 0;
		$c = ord($stream[$pos]);
		$value += $c;
		
		$pos += 1;
		for ( $i = 1; $i < $size; $i++ )
		{
			$c = ord($stream[$pos]);
			$value <<= 8;
			$value += $c;
			$pos += 1;
		}
		
        return $value;
    }
}
/*
//说明：一对一消息发送给IM, 一对N消息发送给GM
$client = new MsgCenterClient();
$client->SetSrv("172.16.7.23", 8003);
$body = "<msg DateTime=\"Tue, 30 Jun 2015 05:19:50 GMT\" type=\"text\" ><content>Kg gg</content></msg>";
$reason = "";
$client->SendGroupMsg("300093", "100001@conference", $body, $reason);
echo "return reason: ".$reason."\n";
*/
?>
