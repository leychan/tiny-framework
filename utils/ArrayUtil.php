<?php

namespace tiny\utils;

class ArrayUtil {
    /**
     * @desc 数组交集
     * @user lei
     * @param array $arr1
     * @param array $arr2
     * @return array
     */
    public static function getIntersect(array $arr1 = [], array $arr2 = []): array {
        return array_intersect_assoc($arr1, $arr2);
    }


    /**
     * @desc 在数组1中的,但是不在其他arr中的值
     * @user lei
     * @param $arr1
     * @param $arr2
     * @param mixed ...$arr3
     * @return array
     */
    public static function getNotExists(array $arr1, array $arr2, array ...$arr3): array {
        return array_diff($arr1, $arr2, ...$arr3);
    }
}