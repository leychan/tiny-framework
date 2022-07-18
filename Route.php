<?php

namespace tiny;

use tiny\helper\Exception;
use tiny\helper\Config;
use tiny\utils\StringUtil;

class Route {
    private $controller = 'Index';

    private $action = 'index';

    private $rawStr = '';

    public function __construct($str) {
        $this->rawStr = $str ?: ($_SERVER['REQUEST_URI'] ?? '');
        $this->resolve();
    }

    /**
     * @return string
     */
    public function getController(): string {
        return $this->controller;
    }

    /**
     * @return string
     */
    public function getAction(): string {
        return $this->action;
    }

    /**
     * @desc 解析路由
     * @user lei
     */
    public function resolve() {
        list($controller, $action) = explode('/', $this->rawStr);
        if (!empty($controller)) {
            $this->controller = $controller;
        }
        if (!empty($action)) {
            $this->action = $action;
        }
        $this->controller = StringUtil::transSeparateToUpperCase($this->controller, '-');
        $this->controller = ucfirst($this->controller);
        $this->action = StringUtil::transSeparateToUpperCase($this->action, '-');
    }

    /**
     * @desc 具体逻辑处理
     * @user lei
     * @return array
     */
    public function dispatch(): array {
        $class = Config::getConf('dir')['controller'] . $this->controller;
        $action = $this->action;
        return (new $class)->$action() ?? [];
    }
}