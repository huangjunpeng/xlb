<?php
$config_ = array (
		//应用ID,您的APPID。
		'app_id' => "2017081608219300",

		//商户私钥
		'merchant_private_key' => "MIICdgIBADANBgkqhkiG9w0BAQEFAASCAmAwggJcAgEAAoGBALUwVOKMwxrakXPrkHcgkm/PQU57fhcHrm8Bpk40P0rt5MeIxKZALxq0DoPjo/LVS5O4rSz9JyYX0za3OJ7oahtFPZi6rPR3Q01cl+fmMBP73jnrTfICqnwL63+0FBAcqlH78bldb41gzBXI15RlieOtR863LyJyYbywYSgmEr67AgMBAAECgYB3THZnoIUKFmV07OJ2/XRNuCno0fjokv8wSebFUTNnU5GyK4RHbrVVIL756hXV2sjjX9Jub9SqCT/ho+vc/Wx2oo/2cbR5hylTgwEvRcNMwByQBcSKiLsMprxqcJGZyzqGDpp2IK68awXY46En+QzpTY5XTMwJhplwuOkigFc1SQJBANqw5gY6WiHKyACQ33pr2dHGFIvD1uZrVVphU/HsUzs02N4/mf9YJdCOxmXJOr9Woj4zk6vYVSz+RwkEqtxvqKUCQQDUGZAgGiPBDe5M3YtQPdTr1c5mBUEQ28PZz2jvoPgvPXMIxjA4q0Z/CgXXyWW1hmNG5LFxBE/yJEZf1QVNhMvfAkEAyobq77eYgxT9tfB01jYNSgVMP8eFPG0IZaQfDruStRETCngSUPQ8SPIAcIE0Y8CCjmJLjujQsNNny8VDytOpdQJAU/d+yEaw6uex9HosgerIlUjCej8QQDVQdrUWzO8D8ee417tmMbkUoox8Pa48dr2qJdG5sY1MfQcBWUUC4Wp2LwJACOB3tagm71PxClO2uTiLVB4aRo9v+TT8unle9Y2SxG/6cARMqxdbLPSyRt75BIQGskJueH1uyosb4oUDb2cuhA==",
		
		//异步通知地址
		'notify_url' => "http://外网可访问网关地址/alipay.trade.page.pay-PHP-UTF-8/notify_url.php",
		
		//同步跳转
		'return_url' => "http://外网可访问网关地址/alipay.trade.page.pay-PHP-UTF-8/return_url.php",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDDI6d306Q8fIfCOaTXyiUeJHkrIvYISRcc73s3vF1ZT7XN8RNPwJxo8pWaJMmvyTn9N4HQ632qJBVHf8sxHi/fEsraprwCtzvzQETrNRwVxLO5jVmRGi60j8Ue1efIlzPXV9je9mkjzOmdssymZkh2QhUrCmZYI/FCEa3/cNMW0QIDAQAB",
);