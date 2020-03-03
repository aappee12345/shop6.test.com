<?php


namespace App\Tool;


class StringDeal
{
    /**
     * 在规定字符串中选择字符来组成规定长度的字符串，规定字符串不能为汉字
     * @param $string
     * @param $length
     * @return string
     */
    public static function lenth_random($string,$length){
        $str = '';
        for ($i = 0;$i < $length;++$i) {
            $str .= $string[mt_rand(0, $length)];
        }
        return $str;
    }

    /**
     * 判断所传值是否不为null、空、空白字符 不为空返回真
     * @param string $str
     * @return boolean
     */
    public static function isNotBlank($str){
        if ($str == null) return false;
        if (!is_string($str)) return false;
        if (trim($str) == '') return false;
        return true;
    }

    /**
     * 判断所传值是否为null、空、空白字符 为空返回真
     * @param mixed $str
     * @return boolean
     */
    public static function isBlank($str){
        if ($str == null) return true;
        if (!is_string($str)&&!is_numeric($str)) return false;
        if (trim($str) == '') return true;
        return false;
    }
}