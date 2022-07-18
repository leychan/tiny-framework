<?php

namespace tiny\helper;

class Response {

    private $output = [];

    public function __construct() {

    }

    public function setOutput($output) {
        $this->output = $output;
    }

    public function success() {
        header('Content-Type: application/json; charset=utf-8');
        $res = [
            'errCode' => 0,
            'errMsg' => '',
            'data' => $this->output
        ];
        echo json_encode($res);
        exit;
    }

    public function error($errCode = '-1', $errMsg = 'server internal error') {
        header('Content-Type: application/json; charset=utf-8');
        $res = [
            'errCode' => $errCode,
            'errMsg' => $errMsg,
            'data' => $this->output
        ];
        echo json_encode($res);
        exit;
    }
}