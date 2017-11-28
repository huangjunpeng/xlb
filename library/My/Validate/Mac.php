<?php
require_once 'Zend/Validate/Abstract.php';

class My_Validate_Mac extends Zend_Validate_Abstract
{
    const MSG_MAC = 'msgMac';

    protected $_messageTemplates = array(
        self::MSG_MAC => "无效的网卡地址或者已经被使用"
    );
    
    public function __construct()
    {
        $this->mac = new Mac();
    }    

    public function isValid($value)
    {
        $this->_setValue($value);
        $status = $this->mac->isExist($value,0);

        
        if ($status == 0) {
            $this->_error(self::MSG_MAC);
            return false;
        }

        return true;
    }
}
?>