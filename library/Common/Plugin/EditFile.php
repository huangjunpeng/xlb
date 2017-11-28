<?php
require_once 'Zend/Controller/Plugin/Abstract.php';

class Common_Plugin_EditFile extends Zend_Controller_Plugin_Abstract
{
     var $fPoint; //文件指针   
     var $fName;  //文件名称   
     var $Count;  //文件行数
 
   //按指定条件打开文件并锁定 |LOCK_SH:读|LOCK_EX:写|LOCK_UN:释放|LOCK_NB|   
    function OpenFile($Method="r",$Lock=LOCK_SH)   
    {   
        if(($Method == 'r' or $Method == 'r+') && !file_exists($this->fName))   
        {   
            return false;   
        }   
       else  
       {   
            $this->fPoint = fopen($this->fName,$Method);   
            flock($this->fPoint,$Lock);   
            return true;   
        }   
    }   
  
    //关闭文件   
    function CloseFile()   
    {   
        if(isset($this->fPoint))   
        {   
            flock($this->fPoint,LOCK_UN);   
           fclose($this->fPoint);   
           return true;   
       }   
        else  
        {   
             return false;   
        }   
    }   
  
     //读文件到<数组>,文件每行作数组的值,返回一维数组   
    function FileToArr()   
    {   
         if(file_exists($this->fName))   
        {   
            $rArr = file($this->fName);   
           return $rArr;   
        }   
         else  
       {   
           return array();   
       }   
     }   
   
    //读指定长度的文件到<字符串>,没有指定返回全部   
    function FileToStr($Size=0)   
     {   
        if($this->OpenFile())   
        {   
            if ($Size < 1)   
            {   
               $Size = filesize($this->fName);   
            }   
            $rStr = fread($this->fPoint,$Size);   
           rewind($this->fPoint);   
            $this->CloseFile();   
             return $rStr;   
        }   
        else  
       {   
           return "";   
        }   
    }   
    //更改指定行的字符   
    function ModifyStr($id,$Data)   
     {   
         if($this->OpenFile('r+',LOCK_EX))   
        {   
            $Next = 0; //初始行计数   
            while(!feof($this->fPoint))   
            {   
                $Tell = ftell($this->fPoint); //保存开始读取的位置   
                 $Temp = fgets($this->fPoint,filesize($this->fName)*1024); //逐行读取   
                $Next++;   
                if($Next == $id)   
                {   
                    $Str = fread($this->fPoint,filesize($this->fName)*1024);   
                    $Len = strlen($Temp);   
                    fseek($this->fPoint,$Tell);  //回绕当行开始处   
                    $Write = str_pad($Data,$Len,"\x0E",STR_PAD_LEFT).$Str;   
                   fputs($this->fPoint,$Write); //把新串写入文件   
                   break;   
                }   
           }   
            $this->CloseFile();   
            return true;   
        }   
        else  
        {   
             return false;   
         }   
    }   
   
    //删除指定行的字符   
     function DeleteStr($id,$Data)   
     {   
        if($this->OpenFile('r+',LOCK_EX))   
        {   
            $Next = 0; //初始行计数   
           while(!feof($this->fPoint))   
          {   
                $Tell = ftell($this->fPoint); //保存开始读取的位置   
                $Temp = fgets($this->fPoint,filesize($this->fName)*1024); //逐行读取   
               $Next++;   
              if($Next == $id)   
               {   
                   $Len = strlen($Data);   
                   fseek($this->fPoint,$Tell);  //回绕当行开始处   
                    $Write = str_pad("\x0E",$Len,"\x0E",STR_PAD_LEFT);   
                   fputs($this->fPoint,$Write); //把新串写入文件   
                   break;   
                 }   
             }   
            $this->CloseFile();   
            return true;   
        }   
       else  
        {   
           return false;   
       }   
    }   
      //获取总行数
    function GetCount()   
   {   
         return count($this->FileToArr());   
   }   
  
    //写入字符串到文件尾,如果文件不存在则新建   
    function WriteToEnd($String)   
   {   
        if($this->OpenFile("a",LOCK_EX))   
       {   
            fputs($this->fPoint,$String);   
            $this->CloseFile();   
            return true;   
       }   
       else  
        {   
           return false;   
       }   
   }   
  
   //覆盖写入字符串,如果文件不存在则新建   
    function WriteToNull($String)   
   {   
       if($this->OpenFile("w",LOCK_EX))   
         {   
           fputs($this->fPoint,$String);   
            $this->CloseFile();   
           return true;   
       }   
        else  
      {   
          return false;   
       }   
   }  
}
?>