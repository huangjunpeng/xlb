<?php
/**
 *  信用、经验积分规则 
 */
class ExpRule
{
    /**
     *  信用积分规则 
     */
    public static $CREDIT = array(
        '1' => array('id'=>'1','symbol'=>'+','score'=>'100','desc'=>'用户初始信用值'),
        '2' => array('id'=>'2','symbol'=>'+','score'=>'2','desc'=>'成功发起并完成邀约'),
        '3' => array('id'=>'3','symbol'=>'+','score'=>'1','desc'=>'成功赴约'),
        '4' => array('id'=>'4','symbol'=>'-','score'=>'20','desc'=>'邀约发起者解散邀约'),
        '5' => array('id'=>'5','symbol'=>'-','score'=>'10','desc'=>'赴约者放鸽子'),
        '6' => array('id'=>'6','symbol'=>'+','score'=>'2','desc'=>'发起并完成服务'),
        '7' => array('id'=>'7','symbol'=>'-','score'=>'10','desc'=>'发起服务后取消（每月可有两次取消服务免扣除信用分机会，按自然月计算）'),
        '8' => array('id'=>'8','symbol'=>'','score'=>'80','desc'=>'信用分低于80分后不可以再发起邀约/参加邀约'),
        '9' => array('id'=>'9','symbol'=>'','score'=>'60','desc'=>'信用分低于60分后不可以再发起服务')
    );
    
    /**
     *  经验积分规则 
     */
    public static $EXP = array(
        '1' => array('id'=>'1','score'=>'10','unit'=>'','desc'=>'每日打开APP'),
        '2' => array('id'=>'2','score'=>'10','unit'=>'条','desc'=>'发布分享信息'),
        '3' => array('id'=>'3','score'=>'10','unit'=>'次','desc'=>'被关注'),
        '4' => array('id'=>'4','score'=>'50','unit'=>'次','desc'=>'发布邀约'),
        '5' => array('id'=>'5','score'=>'20','unit'=>'次','desc'=>'赴约'),
        '6' => array('id'=>'6','score'=>'10','unit'=>'次','desc'=>'好评邀约'),
        '7' => array('id'=>'7','score'=>'10','unit'=>'个','desc'=>'获得S+币'),
        '8' => array('id'=>'8','score'=>'100','unit'=>'一次性','desc'=>'基础等级升级为高级等级'),
        '9' => array('id'=>'9','score'=>'500','unit'=>'一次性','desc'=>'高级等级升级为王者等级'),
        '10' => array('id'=>'10','score'=>'50','unit'=>'一次性','desc'=>'完善个人资料'),
        '11' => array('id'=>'11','score'=>'3','unit'=>'次','desc'=>'评论'),
        '12' => array('id'=>'12','score'=>'1','unit'=>'次','desc'=>'点赞'),
        '13' => array('id'=>'13','score'=>'30','unit'=>'次','desc'=>'发布服务需求'),
        '14' => array('id'=>'14','score'=>'10','unit'=>'次','desc'=>'好评服务需求'),
        '15' => array('id'=>'15','score'=>'','unit'=>'','desc'=>'
            1)	根据服务金额发放不等金额的经验值，以100：1的比例发放如：此次服务共消费1000元，则额外发放10经验值。
            2)	计算规则：消费金额的十位数字四舍五入后按照整百计算，如：
                A.	若此次服务共消费1125元，十位数字四舍五入后取整百1100元，用户可额外获得11经验值；
                B.	若此次服务共消费1725元，十位数字四舍五入后取整百1200元，用户可额外获得12经验值。
            3)	消费金额小于100不获得经验值
            4)	消费金额单次消费单次计算，不累积
        '),
        '16' => array('id'=>'16','score'=>'根据礼物价值而定','unit'=>'','desc'=>'收到礼物'),
        '17' => array('id'=>'17','score'=>'根据礼物价值而定','unit'=>'','desc'=>'送出礼物')
    );
    
    public function __construct()
    {
        //init...
    }
    
    /**
     *  将服务费用转换为经验
     *  
     *  对应$EXP变量的索引15
     */
    public static function serviceToExp($money)
    {
        if(!is_numeric($money) || $money < 100){
            return 0;
        }
        $result = 0;
        $big = substr($money, 0,-2);
        $small = substr($money, -2);
        eval('$result = round('.$big .'.'.$small.');');
        return $result;
    }
    
    /**
     *  将礼物价值转换为经验
     *  
     *  对应$EXP变量的索引16、17
     */    
    public static function giftToExp($gift)
    {
        
    }
}

/*测试经验、信用积分加减*/
/*$result = '';
$score = 100;

echo '$result = '.ExpRule::$CREDIT['1']['score'].ExpRule::$CREDIT['1']['symbol'].$score.';';
echo '<br>';

eval('$result = '.ExpRule::$CREDIT['1']['score'].ExpRule::$CREDIT['1']['symbol'].$score.';');
echo $result.'<br>';*/

/*测试服务金额兑换经验*/
//echo ExpRule::serviceToExp('1487');

