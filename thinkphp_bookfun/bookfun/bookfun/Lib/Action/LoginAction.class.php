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
    	if($User->check_user($username,$pwd))
    	{
    		$this->success('登录成功！',U('MainPage/main_page'));
    	}
    	else
    		$this->error('用户名或密码错误！');
    }

    public function register()
    {
    	header("Content-Type:text/html; charset=utf-8");
    	$username = $this->_param('username');
    	$pwd = $this->_param('password1');
    	$User = D('user');
    	if($User->register_user($username,$pwd))
    		$this->success('注册成功！',U('MainPage/main_page'));
    	else
    		$this->error('注册失败！');
    }
}