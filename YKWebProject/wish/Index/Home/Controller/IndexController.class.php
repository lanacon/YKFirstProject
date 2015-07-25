<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
   
//首页视图
    public function index(){
    	
    	// $this->display();

    	$wish = M('users')->select();
    	// $this->assign('users',$wish);
    	$this->display("YKFirstProject");

    }
//表单处理
    public function handle(){
    	if(IS_POST)
    	{

    			$username = I('tf_username','','htmlspecialchars');
    			$userpwd = I('tf_pwd','','htmlspecialchars');
    	       
               // $username = $_POST["tf_username"];
               // $userpwd = $_POST["tf_pwd"];

    		var_dump($username);
            var_dump($userpwd);

    	  // $id = M('users')->where('user_name="$username" AND user_pwd="$userpwd"')->find();
          
           $id = M('users')->where("user_name='$username' AND user_pwd='$userpwd'")->select();

           var_dump($id);
           //其中的U 方法是重定位到的URL
    	   if ($id) {
    	   		$this->success('success to  insert.',U(yksuccess));
    	   }
    	   else {
    	   		// $this->error('fail to insert ',U(ykfail));
            echo "cowu";

    	   }

    	}
    	else{

    		echo '页面不存在';
    	}
    }
    public function turntoindex()
    {
        $this->success('',U(YKFirstProject));

    }

}