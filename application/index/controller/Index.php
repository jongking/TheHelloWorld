<?php
namespace app\index\controller;

use app\index\model\PublishContent;

class Index extends \think\Controller
{
    public function index()
    {
        // 查询状态为1的用户数据 并且每页显示10条数据
        $list = PublishContent::where('ID','<>',0)->paginate(5);
        // 把分页数据赋值给模板变量list
        $this->assign('list', $list);
        // 渲染模板输出
        return $this->fetch();
    }

    public function showpc()
    {
        $id = request()->get('Id');
        $model = PublishContent::get($id);
        $this->assign('model', $model);
        return $this->fetch();
    }
}
