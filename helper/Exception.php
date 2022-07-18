<?php

namespace tiny\helper;

use tiny\consts\Exception as ExceptionConst;

class Exception {
    public static function throw($code) {
        if (empty(ExceptionConst::EXCEPTION_MSG[$code])) {
            throw new \Exception('Server Internal Error', 500);
        }
        throw new \Exception(ExceptionConst::EXCEPTION_MSG[$code], $code);
    }
}