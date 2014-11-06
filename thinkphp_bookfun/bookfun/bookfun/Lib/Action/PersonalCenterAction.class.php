<?php

class PersonalCenterAction extends Action
{
	public function center_show()
	{
		header("Content-Type:text/html; charset=utf-8");
		$uid = session('uid');
		if(!$uid)//防盗链
			$this->error('请先登录！',U('Login/index'));
		$User = D('user');
		$uid = session('uid');
		$list = $User->where("uid = $uid")->find();
		$this->assign('list',$list);
		$this->display();
	}

	public function alter_data()
	{
		header("Content-Type:text/html; charset=utf-8");
		$uid = session('uid');
		if(!$uid)
			$this->error('请先登录！',U('Login/index'));
		$uid = session('uid');
		$User = D('user');
		$result = $User->where("uid = $uid")->find();
		if(!$result)
		{
			$this->error('系统错误，修改失败！');
		}
		else
		{
			$data['username'] = I('nickname','','htmlspecialchars');//获取表单提交的信息
			$data['sex'] = I('sex','','htmlspecialchars');
			$data['age'] = I('age','','htmlspecialchars');
			$data['signature'] = I('signature','','htmlspecialchars');
			//上传图片
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();
			$upload->maxSize = 3145788;//上传图片的最大限制
			$upload->allowExts = array('jpg','gif','png','jpeg');//上传图片的格式范围
			$upload->savePath = "./Public/Uploads/";//上传图片的保存路径
			$upload->uploadReplace = true;
       		$upload->thumb = true;
        	$upload->thumbMaxWidth = 50;//更改后图片的大小
       		$upload->thumbMaxHeight = 50;
        	$upload->thumbPath = "./Public/Uploads/";//修改后上传图片的保存路径
        	$upload->thumbRemoveOrigin = true;
			if(!$upload->upload())
			{
				if(!(($upload->getErrorMsg())=="没有选择上传文件"))
					$this->error($upload->getErrorMsg());
			}
			else
				$info = $upload->getUploadFileInfo();
			$old = $result['photo'];
			if($old != "default.jpg")
				unlink("./Public/Uploads/".$old);//删除旧图片
			$data['photo'] = 'thumb_'.$info[0]['savename'];
			$result = $User->where("uid = $uid")->save($data);//更改个人信息
			if($result)
				$this->success('修改个人信息成功！');
			else
				$this->error('系统错误，修改失败！');
		}
	}

	public function my_collection()
	{
		header("Content-Type:text/html; charset=utf-8");
		$uid = session('uid');
		if(!$uid)//防盗链
			$this->error('请先登录！',U('Login/index'));
		$Collection = D('collection');
		$uid = session('uid');
		import('ORG.Util.Page');
		$search_info = "";
		$count = $Collection->where("uid = $uid")->count();//查找该用户的所有收藏
		if($count == 0)
			$search_info = "尚未收藏图书！";
		$Page = new Page($count,9);//设置每页显示9条记录
		$show = $Page->show();
		$list = $Collection->where("uid = $uid")->limit($Page->firstRow.','.$Page->listRows)->select();
		$Books = D('books');
		for($j=0; $j<count($list); $j++)
		{
			$bookid = $list[$j]['bookid'];
			$result = $Books->where("bookid = $bookid")->find();
			$list[$j]['bookname'] = chinesesubstr($result['bookname'],16);//截取字符串
			$list[$j]['author'] = chinesesubstr($result['author'],16);
			$list[$j]['image'] = $result['image'];

			$tmp['bookid'] = $bookid;
			$Collection = D('collection');
			$list[$j]['myURL'] = U('BookCenter/un_clct',$tmp);//生成取消收藏地址
			$list[$j]['info'] = '取消收藏';
			$list[$j]['dir'] = U('BookCenter/bs_show',$tmp);
		}
		$this->assign('search_info',$search_info);
		$this->assign('classify_info',$classify);
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display();
	}
}
?>