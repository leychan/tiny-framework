<?php

namespace tiny\helper;

class Request {
    public static $get = [];
    public static $post = [];
    public static $server = [];


    public static function init() {
        self::$get = $_GET;
        $rawBody = file_get_contents('php://input');
        $rawBodyArr = json_decode($rawBody, true) ?? [];
        self::$post = array_merge($_POST, $rawBodyArr);
    }

    public static function get($key = '', $default = '') {
        if (empty($key)) {
            return self::$get;
        }
        return self::$get[$key] ?? $default;
    }

    public static function post($key = '', $default = '') {

        if (empty($key)) {
            return self::$post;
        }
        return self::$post[$key] ?? $default;
    }
}