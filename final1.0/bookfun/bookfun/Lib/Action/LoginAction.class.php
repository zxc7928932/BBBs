<?php

class LoginAction extends Action 
{
    public function index()
    {
		$this->display();		
    }

    public function login()
    {
    	header("Content-Type:text/html; charset=utf-8");
    	$username = $this->_param('txt_user');
    	$pwd = $this->_param('txt_pwd');
    	$User = D('user');
    	if($User->check_user($username,$pwd))//判断用户名和密码是否正确
    	{
    		$this->success('登录成功！',U('MainPage/main_page'),0);
    	}
    	else
    		$this->error('用户名或密码错误！');
    }

    public function register()
    {
    	header("Content-Type:text/html; charset=utf-8");
    	$username = $this->_param('username');
    	$pwd = $this->_param('password1');
        $nickname = $this->_param('nickname');
    	$User = D('user');
    	if($User->register_user($username,$pwd,$nickname))//调用用户注册函数
    		$this->success('注册成功！',U('MainPage/main_page'));
    	else
    		$this->error('注册失败！');
    }

    public function logout()
    {
        header("Content-Type:text/html; charset=utf-8");
        session('uid',null);//清除uid的session
        $this->redirect('Login/index');
    }
}