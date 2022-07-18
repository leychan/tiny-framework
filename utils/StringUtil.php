<?php

namespace tiny\utils;

class StringUtil {

    /**
     * @desc 替换分隔符为大写字母
     * @user lei
     * @param $str
     * @param string $separate
     * @return string
     */
    public static function transSeparateToUpperCase($str, string $separate = ''): string {
        while (strpos($str, $separate) !== false) {
            $pos = strpos($str, $separate);
            $str = substr($str, 0, $pos)
                . strtoupper($str[$pos + 1])
                . substr($str, $pos + 2);
        }
        return $str;
    }

}