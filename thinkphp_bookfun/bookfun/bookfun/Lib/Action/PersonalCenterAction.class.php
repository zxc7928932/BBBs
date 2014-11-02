<?php

class PersonalCenterAction extends Action
{
	public function center_show()
	{
		header("Content-Type:text/html; charset=utf-8");
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
		$User = D('user');
		$result = $User->where("uid = $uid")->find();
		if(!$result)
		{
			$this->error('系统错误，修改失败！');
		}
		else
		{
			$data['username'] = I('nickname','','htmlspecialchars');
			$data['sex'] = I('sex','','htmlspecialchars');
			$data['age'] = I('age','','htmlspecialchars');
			$data['signature'] = I('signature','','htmlspecialchars');
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();
			$upload->maxSize = 3145788;
			$upload->allowExts = array('jpg','gif','png','jpeg');
			$upload->savePath = "./Public/Uploads/";
			$upload->uploadReplace = true;
       		$upload->thumb = true;
        	$upload->thumbMaxWidth = 50;
       		$upload->thumbMaxHeight = 50;
        	$upload->thumbPath = "./Public/Uploads/";
        	$upload->thumbRemoveOrigin = true;
			if(!$upload->upload())
				$this->error($upload->getErrorMsg());
			else
				$info = $upload->getUploadFileInfo();
			$old = $result['photo'];
			unlink("./Public/Uploads/".$old);
			$data['photo'] = 'thumb_'.$info[0]['savename'];
			$result = $User->where("uid = $uid")->save($data);
			if($result)
				$this->success('修改个人信息成功！');
			else
				$this->error('系统错误，修改失败！');
		}
	}

	public function my_collection()
	{
		header("Content-Type:text/html; charset=utf-8");
		$Collection = D('collection');
		$uid = session('uid');
		import('ORG.Util.Page');
		$search_info = "";
		$count = $Collection->where("uid = $uid")->count();
		if($count == 0)
			$search_info = "尚未收藏图书！";
		$Page = new Page($count,9);
		$show = $Page->show();
		$list = $Collection->where("uid = $uid")->limit($Page->firstRow.','.$Page->listRows)->select();
		$Books = D('books');
		for($j=0; $j<count($list); $j++)
		{
			$bookid = $list[$j]['bookid'];
			$result = $Books->where("bookid = $bookid")->find();
			$list[$j]['bookname'] = $result['bookname'];
			$list[$j]['author'] = $result['author'];
			$list[$j]['image'] = $result['image'];

			$tmp['bookid'] = $bookid;
			$Collection = D('collection');
			$list[$j]['myURL'] = U('BookCenter/un_clct',$tmp);
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