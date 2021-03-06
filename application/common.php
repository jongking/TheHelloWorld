<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Session;
// 应用公共文件
    function SetLoginMessage($model)
    {
    	Session::set('UserName', $model->UserName);
    	Session::set('Pwd', $model->Pwd);
    }

    function ClearLoginMessage()
    {
    	Session::clear();
    }

    function CheckLoginMessage()
    {
    	return Session::has('UserName');
    }