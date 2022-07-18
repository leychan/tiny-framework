<?php


return [
    //项目目录
    'dir' => [
        //项目根目录(根命名空间)
        'base' => '\tiny\\',
        //控制器目录(命名空间)
        'controller' => '\tiny\controller\\'
    ],

    //数据库配置
    'db' => [
        //库名
        'dbname' => [
            'dsn' => 'mysql:host=127.0.0.1dbname=test',
            'username' => 'username',
            'password' => 'password'
        ]
    ],
];
