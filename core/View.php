<?php
//模板文件
namespace core;

class View
{
    //模板文件
    protected $file;
    //模板变量
    protected $vars = [];
    public function make($file)
    {
        $this->file = 'View/' . $file . '.html';
        return $this;
    }
    public function with($name, $value)
    {
        $this->vars[$name] = $value;
        return $this;
    }
    public function __toString()
    {
        extract($this->vars); //把变量放到内存里。供其他使用,键值当变量名，值是值 $version
        //输出时默认调用这个方法
        if (is_file($this->file)) {
            include $this->file;
        } else {
            include 'View/' . 'notfund' . '.html';
        }
        return '';
    }
}
