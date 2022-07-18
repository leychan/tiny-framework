<?php

namespace tiny\consts;

class Exception {
    const INVALID_PARAMS = 40000;
    const PARAMS_NOT_UNDERSTAND = 40001;

    const SERVER_INTERNAL_ERROR = 50000;
    const ENV_ERROR = 50001;
    const CONFIG_ERROR = 50002;

    const EXCEPTION_MSG = [
        self::INVALID_PARAMS => '参数错误',
        self::PARAMS_NOT_UNDERSTAND => '我好像不明白',

        self::ENV_ERROR => 'env环境文件错误',
        self::CONFIG_ERROR => '配置文件错误'
    ];
}