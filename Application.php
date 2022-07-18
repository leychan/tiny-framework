<?php

namespace tiny;

use tiny\helper\Request;
use tiny\helper\Response;
use tiny\helper\Config;

final class Application {
    public function run() {

        //载入配置
        Config::init();

        //request初始化
        Request::init();

        //response初始化
        $response = new Response();

        //返回结果
        $result = [];

        try {
            //路由解析和逻辑处理
            $route = new Route(Request::get('r') ?? '');
            $result = $route->dispatch();
        } catch (\Exception $e) {
            $response->error($e->getCode(), $e->getMessage());
        }


        //设置响应数据
        $response->setOutput($result);
        //发送响应
        $response->success();
    }
}
