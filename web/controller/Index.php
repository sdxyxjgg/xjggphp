<?php

namespace web\controller;

use core\View;

class Index
{
    protected $view;
    public function __construct()
    {
        $this->view = new View();
    }
    public function show()
    {
        return $this->view->make('index')->with('version', 'v1.0.1');
    }
    public function link(string $str = 'xjgg')
    {
        return $this->view->make($str);
    }
    public function notfund()
    {
        return $this->view->make('notfund');
    }
    public function __call($name, $arr)
    {
        //链接错误处理，魔术方法
        return $this->notfund();
    }
}
