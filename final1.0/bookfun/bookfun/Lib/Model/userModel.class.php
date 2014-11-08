<?php

class userModel extends Model
{
	public function check_user($username,$pwd)
 	{
 		$User = D('user');
 		$result = $User->where("username = '$username'")->find();
 		$uid = $result['uid'];
 		if(!$result)
  			return false;
 		else
 		{
 			if($result['pwd'] == md5($pwd))
 			{
 				session('uid',$uid);
 				return true;
 			}
 			else
 				return false;
 		}
	}

	public function register_user($username,$pwd,$nickname)
	{
		$User = D('user');
		$result = $User->where("username = '$username'")->find();
 		if(!$result)
 		{
 			$data['pwd'] = md5($pwd);
 			$data['username'] = $username;
 			$data['nickname'] = $nickname;
 			$User->data($data)->add();
 			$result = $User->where("username = '$username'")->find();
 			$uid = $result['uid'];
 			session('uid',$uid);
 			return true;
 		}
 		else
 		{
 			return false;
 		}
	}
}
?>