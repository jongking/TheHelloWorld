<?php
namespace app\index\controller;

use app\index\model\PublishContent;
use app\index\model\User;

class Adminserver extends \think\Controller
{
    public function login()
    {
    	ClearLoginMessage();
        return $this->fetch();
    }

    public function LoginCheck()
    {
    	$username = request()->post('UserName');
    	$pwd = request()->post('Pwd');
    	$model = User::get(['UserName' => $username, 'Pwd' => $pwd]);
    	if($model == null){
			$this->redirect('Adminserver/login');
    	}
    	else{
    		SetLoginMessage($model);
			$this->redirect('Adminserver/publicMsg');
    	}
    }

    public function main()
    {
    	if(!CheckLoginMessage()){
    		$this->redirect('Adminserver/login');
    	}
    	
        return $this->fetch();
    }

    public function publicMsg()
    {
    	if(!CheckLoginMessage()){
    		$this->redirect('Adminserver/login');
    	}

        return $this->fetch();
    }

    public function publicMsgSearch()
    {
    	// 查询状态为1的用户数据 并且每页显示10条数据
		$list = PublishContent::where('ID','<>',0)->paginate(10);
		// 把分页数据赋值给模板变量list
		$this->assign('list', $list);
		// 渲染模板输出
        return $this->fetch();
    }

    public function AddPC()
    {
    	$id = request()->post('Id');
    	if($id == ""){
	    	// 过滤post数组中的非数据表字段数据
    		$model = new PublishContent($_POST);
    		$model->Id = null;
			$model->allowField(true)->save();

			$this->redirect('Adminserver/publicMsg');
    	}
    	else{
    		$model = new PublishContent();
    		$model->allowField(true)->save($_POST,['Id' => $id]);

			$this->redirect('Adminserver/publicMsg', 'id='.$id);
    	}
    }

	public function GetPC()
    {
    	$id = request()->get('Id');
    	$model = PublishContent::get($id);
    	return json($model, 200);
    }

    public function DelPC()
    {
    	$id = request()->get('id');
    	$model = PublishContent::get($id);
    	$model->delete();
		$this->redirect('Adminserver/publicMsgSearch');
    }

    public function PluploadUpload()
    {
    	// 获取表单上传文件 例如上传了001.jpg
	    $file = request()->file('file');
	    // 移动到框架应用根目录/public/uploads/ 目录下
	    $info = $file->validate(['size'=>300*1000,'ext'=>'jpg,jpeg,png,gif'])->rule('date')->move(ROOT_PATH . 'public' . DS . 'uploads');
	    if($info){
	        // 成功上传后 获取上传信息
	        // 输出 42a79759f284b767dfcb2a0197904287.jpg
	        echo "OK||" . $info->getSaveName(); 
	    }else{
	        // 上传失败获取错误信息
	        echo $file->getError();
	    }
    }
}
