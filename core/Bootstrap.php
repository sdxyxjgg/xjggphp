<?php

namespace core;


class Bootstrap
{
    public static function run()
    {
        Error::run();
        self::tesTing();
    }
    public static function tesTing()
    {
        $info = [];
        if (isset($_GET['s'])) {
            $info = explode('/', $_GET['s']);
            $filearr = scandir(dirname(__DIR__) . '\web\controller');
            $istrue = false;
            foreach ($filearr as $file) {
                if ($file == ucfirst($info[0]) . '.php') {
                    $istrue = true;
                    break;
                }
            }
            if ($istrue) {
                $info[0] = '\web\controller\\' . ucfirst($info[0]);
                self::parseUrl($info);
                return;
            } else {
                $info[0] = '\web\controller\Index';
                $info[1] = 'notfund';
            }
        } else {
            $info[0] = '\web\controller\Index';
            $info[1] = 'show';
        }
        self::parseUrl($info);
    }
    //分析url常量生成控制器方法常量
    public static function parseUrl($info)
    {
        switch (count($info)) {
            case 1:
                $class = $info[0];
                $action = 'show';
                echo (new $class)->$action();
                break;
            case 2:
                $class = $info[0];
                $action = $info[1];
                echo (new $class)->$action();
                break;
            case 3:
                if ($info[1] == 'link') {
                    $class = $info[0];
                    $action = $info[1];
                    echo (new $class)->$action($info[2]);
                } else {
                    $class = $info[0];
                    $action = 'notfund';
                    echo (new $class)->$action();
                }
                break;
            default:
                $class = $info[0];
                $action = 'notfund';
                echo (new $class)->$action();
        }
    }
}
