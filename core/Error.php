<?php

namespace core;

class Error
{
    public static function run()
    {
        error_reporting(0); //消除所有错误
        set_error_handler([new self, 'make'], E_ALL | E_STRICT); //检测到错误捕捉
    }
    public static function make(...$arg)
    {
        echo '处理错误';
    }
}
