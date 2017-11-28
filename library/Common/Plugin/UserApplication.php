<?php
class UserApplication
{
    public static function getFriend($token='',$page='1',$length='1000')
    {
        //请求地址
        $url = Zend_Registry::get('userDomain').'/user/friend';
        //请求数据
        $data = array();
        $data['head'] = array('callSource'=>'server','callTime'=>time());
        $data['body'] = array('page'=>$page,'length'=>$length);
        $data['token'] = $token;
        //发送数据&处理响应数据
        $arr = self::curlForPost($url, json_encode($data));
        $arr = Tools::object2array(json_decode($arr));
        return $arr;
    }
    public static function getFans($token='',$page='1',$length='1000')
    {
        //请求地址
        $url = Zend_Registry::get('userDomain').'/user/fans';
        //请求数据
        $data = array();
        $data['head'] = array('callSource'=>'server','callTime'=>time());
        $data['body'] = array('page'=>$page,'length'=>$length);
        $data['token'] = $token;
        //发送数据&处理响应数据
        $arr = self::curlForPost($url, json_encode($data));
        $arr = Tools::object2array(json_decode($arr));
        return $arr;
    }
    public static function getFocus($token='',$page='1',$length='1000')
    {
        //请求地址
        $url = Zend_Registry::get('userDomain').'/user/att';
        //请求数据
        $data = array();
        $data['head'] = array('callSource'=>'server','callTime'=>time());
        $data['body'] = array('page'=>$page,'length'=>$length);
        $data['token'] = $token;
        //发送数据&处理响应数据
        $arr = self::curlForPost($url, json_encode($data));
        $arr = Tools::object2array(json_decode($arr));
        return $arr;
    }
    public static function getAllBlack($token='',$page='1',$length='1000')
    {
        //请求地址
        $url = Zend_Registry::get('userDomain').'/user/black-all';
        //请求数据
        $data = array();
        $data['head'] = array('callSource'=>'server','callTime'=>time());
        //$data['body'] = array('page'=>$page,'length'=>$length);
        $data['token'] = $token;
        //发送数据&处理响应数据
        $arr = self::curlForPost($url, json_encode($data));
        $arr = Tools::object2array(json_decode($arr));
        return $arr;
    } 
    private static function curlForPost($url, $data_string)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            'Content-Length: ' . strlen($data_string))
            );
        ob_start();
        curl_exec($ch);
        $return_content = ob_get_contents();
        ob_end_clean();
    
        $return_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        return $return_content;
    }
}
?>