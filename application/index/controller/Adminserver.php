<?php
namespace app\index\controller;

class Adminserver extends \think\Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function publicMsg()
    {
        return $this->fetch();
    }
}
