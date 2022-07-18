<?php

namespace tiny\helper;

class Config {
    public static $config = [];

    public static $env = '';

    /**
     * @desc 环境变量获取
     * @user lei
     * @return mixed|string
     * @throws \Exception
     */
    public static function getEnv() {
        if (!empty(self::$env)) {
            return self::$env;
        }
        $envRaw = file_get_contents(__DIR__ . '/../.env');
        $envArr = explode('=', $envRaw);
        $envArr = array_map(function ($v) {
            return trim($v);
        }, $envArr);
        if (empty($envArr[0]) || empty($envArr[1])) {
            Exception::throw(\tiny\consts\Exception::ENV_ERROR);
        }
        self::$env = $envArr[1];
        return self::$env;

    }

    /**
     * @desc 载入配置
     * @user lei
     * @return array|mixed
     */
    public static function init() {
        if (!empty(self::$config)) {
            return self::$config;
        }
        $env = self::getEnv();
        $configPath = __DIR__ . "/../config/config-{$env}.php";
        if (!file_exists($configPath)) {
            Exception::throw(\tiny\consts\Exception::CONFIG_ERROR);
        }
        self::$config = require $configPath;
        return self::$config;
    }

    /**
     * @desc 获取配置
     * @user lei
     * @param string $key
     * @return array|mixed|null
     */
    public static function getConf($key = '') {
        if (empty(self::$config)) {
            self::init();
        }

        if (!empty($key)) {
            return self::$config[$key] ?? null;
        }
        return self::$config;
    }
}