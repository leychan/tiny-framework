<?php

namespace tiny\controller;

class Index extends Base {

    public function index() {
        return [
            'status' => 1
        ];
    }

    public function test() {
        return [
            'status' => 2
        ];
    }
}