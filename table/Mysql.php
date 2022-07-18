<?php

namespace tiny\table;

use tiny\helper\Exception;
use tiny\helper\Config;

/**
 * mysql简单封装
 */
class Mysql {

    /**
     * @var array $conn
     */
    private static $conn = [];

    /**
     * @var string $db 数据库名称
     */
    public static $db;

    private function __construct() {

    }

    private function __clone() {

    }

    private function __wakeup() {

    }

    public static function getConn() {
        $config = Config::getConf('db')[static::$db] ?? '';
        if (empty($config)) {
            Exception::throw(\tiny\consts\Exception::CONFIG_ERROR);
        }
        if (empty($conn[static::$db])) {
            self::$conn[static::$db] = new \PDO($config['dsn'], $config['username'], $config['password']);
            self::$conn[static::$db]->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        }
        return self::$conn[static::$db];
    }

    /**
     * @desc 获取全部记录
     * @user lei
     * @param $sql
     * @return array|false
     */
    public static function fetchAll($sql) {
        $conn = self::getConn();
        $stat = $conn->query($sql);
        return $stat->fetchAll();
    }

    /**
     * @desc 获取一条记录
     * @user lei
     * @param $sql
     * @return mixed
     */
    public static function fetchOne($sql) {
        $conn = self::getConn();
        $stat = $conn->query($sql);
        return $stat->fetch();
    }

    /**
     * @desc 执行原始sql查询
     * @user lei
     * @param $sql
     * @return false|\PDOStatement
     */
    public static function query($sql) {
        $conn = self::getConn();
        return $conn->query($sql);
    }

    /**
     * @desc 执行sql
     * @user lei
     * @param $sql
     * @return false|int
     */
    public static function exec($sql) {
        $conn = self::getConn();
        return $conn->exec($sql);
    }
}