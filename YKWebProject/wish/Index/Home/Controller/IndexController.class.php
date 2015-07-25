<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
   
//首页视图
    public function index(){
    	
    	// $this->display();

    	$wish = M('wish')->select();
    	$this->assign('wish',$wish);
    	$this->display();

    }
//表单处理
    public function handle(){
    	if(IS_POST)
    	{

    		$data = array(
    			'username' => I('username','','htmlspecialchars'),
    			'content' => I('content','','htmlspecialchars'),
    			'time' => time()
    		);

    		var_dump($data);

    	   $id = M('wish')->data($data)->add();

    	   if ($id) {
    	   		$this->success('success to  insert.',U(index));
    	   }
    	   else {
    	   		$this->error('fail to insert ');

    	   }

    	}
    	else{

    		echo '页面不存在';
    	}
    }

}