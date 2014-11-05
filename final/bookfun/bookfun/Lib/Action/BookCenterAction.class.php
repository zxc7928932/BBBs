<?php

class BookCenterAction extends Action
{
	public function upload_show()
	{
		header("Content-Type:text/html; charset=utf-8");
		$uid = session('uid');
		if(!$uid)//防盗链
			$this->error('请先登录！',U('Login/index'));
		$this->display();
	}

	public function upload()
	{
		header("Content-Type:text/html; charset=utf-8");
		$uid = session('uid');
		if(!$uid)
			$this->error('请先登录！',U('Login/index'));
		$bookname = $this->_param('bookname');
		$author = $this->_param('author');
		$Books = D('books');
		$result = $Books->where("bookname = '$bookname' and author = '$author'")->find();//查询上传书籍是否存在
		if($result)
			$this->error('该书已存在！');
		$data['author'] = $author;
		$data['bookname'] = $bookname;
		$data['press'] = $this->_param('press');
		$data['content'] = $this->_param('content');
		$data['classify'] = $this->_param('classify');
		//对上传图片进行处理
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();
		$upload->maxSize = 3145788;//最大图片容量
		$upload->allowExts = array('jpg','gif','png','jpeg');//允许上传图片的所有格式
		$upload->savePath = './Public/Uploads/';//图片保存路径
		$upload->uploadReplace = true;
       	$upload->thumb = true;
       	$upload->thumbMaxWidth = 150;//处理后图片像素大小
     	$upload->thumbMaxHeight = 200;
       	$upload->thumbPath = './Public/Uploads/';//处理后图片保存路径
       	$upload->thumbRemoveOrigin = true;
		if(!$upload->upload())
			$this->error($upload->getErrorMsg());
		else
			$info = $upload->getUploadFileInfo();//获取图片保存信息
		$data['image'] = 'thumb_'.$info[0]['savename'];//获取图片存储名称
		$res = $Books->data($data)->add();//存入数据库
		if($res)
			$this->success('上传图书成功！');
		else
			$this->error('系统错误，上传失败！');
		
	}

	public function search_book()
	{
		header("Content-Type:text/html; charset=utf-8");
		$uid = session('uid');
		if(!$uid)
			$this->error('请先登录！',U('Login/index'));
		$Books = M('books');
		$book_name = $this->_param('txt_book');
		$p = $this->_param('p');
		if($p)//判断是由自身发起还是用户提交表单发起
			$name_list = explode("+",$book_name);
		else
			$name_list = explode(" ",$book_name);
		$condition = array();
		$num = 0;
		for($i=0; $i<count($name_list); $i++)
		{
			if(strlen($name_list[$i]))//判断如果不是空字符，作为查询条件
			{
				$condition[$i] = '%'.$name_list[$i].'%';
				$num ++;
			}
		}

		if($num == 0)
		{
			$this->error('请输入书名！');
		}
		else
		{
			$map['bookname'] = array('like',$condition,'OR');//查询数组
			import('ORG.Util.Page');
			$count = $Books->where($map)->count();
			$search_info = "";
			if(!$count)
				$search_info = "未找到该图书";
			//分页显示配置
			$Page = new Page($count,9);//设置每页显示的条数
			$show = $Page->show();
			$list = $Books->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();//从数据库获取满足条件的条目
			for($j=0; $j<count($list); $j++)
			{
				$bookid = $list[$j]['bookid'];
				$uid = session('uid');
				$tmp['bookid'] = $bookid;
				$Collection = D('collection');
				$flag = $Collection->check_collect($uid,$bookid);
				if($flag)//判断之前是否已经收藏
				{
					$list[$j]['myURL'] = U('BookCenter/clct',$tmp);//生成收藏处理地址
					$list[$j]['info'] = '收藏';
				}
				else
				{
					$list[$j]['myURL'] = U('BookCenter/un_clct',$tmp);//生成取消收藏处理地址
					$list[$j]['info'] = '取消收藏';
				}
				$list[$j]['dir'] = U('BookCenter/bs_show',$tmp);//生成图书主页
				$list[$j]['bookname'] = chinesesubstr($list[$j]['bookname'],16);//截取字符串
				$list[$j]['author'] = chinesesubstr($list[$j]['author'],16);
			}
			$this->assign('search_info',$search_info);
			$this->assign('list',$list);
			$this->assign('page',$show);
			$this->display();
		}
	}

	public function clct()
	{
		$uid = session('uid');
		if(!$uid)//防盗链
			$this->error('请先登录！',U('Login/index'));
		$Collection = D('collection');
		$data['bookid'] = $this->_param('bookid');
		$data['uid'] = session('uid');
		if($Collection->data($data)->add())
		{
			$bookid = $data['bookid'];
			$Books = D('books');
			$count = $Books->where("bookid = $bookid")->getField('count');
			$count += 5;//该书每收藏一次图书热度加5
			$data1['bookid'] = $bookid;
			$data1['count'] = $count;
			if(!$Books->save($data1))
				$this->error('系统错误，收藏失败！');
			$this->success('收藏成功！');
		}
		else
			$this->error('系统错误，取消收藏！');
	}

	public function un_clct()
	{
		$uid = session('uid');
		if(!$uid)
			$this->error('请先登录！',U('Login/index'));
		$Collection = D('collection');
		$bookid = $this->_param('bookid');
		$uid = session('uid');
		if($Collection->where("uid = $uid and bookid = $bookid")->delete())
		{
			$Books = D('books');
			$count = $Books->where("bookid = $bookid")->getField('count');
			$count -= 5;//该书每收藏一次图书热度减5
			$data1['bookid'] = $bookid;
			$data1['count'] = $count;
			if(!$Books->save($data1))
				$this->error('系统错误，取消收藏失败！');
			$this->success('取消收藏成功！');
		}
		else
			$this->error('系统错误，取消收藏失败！');
	}

	public function bs_show()
	{
		header("Content-Type:text/html; charset=utf-8");
		$uid = session('uid');
		if(!$uid)//防盗链
			$this->error('请先登录！',U('Login/index'));
		$bookid = $this->_param('bookid');
		$Books = D('books');
		$list1 = $Books->where("bookid = $bookid")->find();

		$uid = session('uid');
		$tmp['bookid'] = $bookid;
		$Collection = D('collection');
		$flag = $Collection->check_collect($uid,$bookid);//判断图书是否被收藏
		if($flag)
		{
			$list1['myURL'] = U('BookCenter/clct',$tmp);
			$list1['info'] = '收藏';
		}
		else
		{
			$list1['myURL'] = U('BookCenter/un_clct',$tmp);
			$list1['info'] = '取消收藏';
		}
		$tt['bookid'] = $bookid;
		$list1['commentURL'] = U('BookCenter/pro_comment',$tt);
		$this->assign('list1',$list1);

		$Comment = D('comment');
		import('ORG.Util.Page');
		$count = $Comment->where("bookid = $bookid")->order('commentid desc')->count();//查找该图书所有的评论
		$Page = new Page($count,5);
		$show = $Page->show();
		$list2 = $Comment->where("bookid = $bookid")->order('commentid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$cnt = count($list2);
		$comment_info = "";
		if($cnt == 0)
			$comment_info = "尚无用户评论此书，赶快评论吧！";
		$this->assign('comment_info',$comment_info);
		$this->assign('list2',$list2);
		$this->assign('page',$show);
		$this->display();
	}

	public function pro_comment()
	{
		$uid = session('uid');
		if(!$uid)
			$this->error('请先登录！',U('Login/index'));
		$data['uid'] = session('uid');
		$bookid = $this->_param('bookid');
		$data['bookid'] = $bookid;
		$data['content'] = $this->_param('comment');
		$Comment = D('comment');
		if($Comment->data($data)->add())//插入评论信息进数据库
		{
			$Books = D('books');
			$count = $Books->where("bookid = $bookid")->getField('count');
			$count ++;//该书每被评论一次热度加1
			$data1['bookid'] = $bookid;
			$data1['count'] = $count;
			if(!$Books->save($data1))
				$this->error('系统错误，评论失败！');
			$this->success('评论成功！');
		}
		else
			$this->error('系统错误,评论失败！');
	}

	public function hot_book()
	{
		header("Content-Type:text/html; charset=utf-8");
		$uid = session('uid');
		if(!$uid)
			$this->error('请先登录！',U('Login/index'));
		$Books = D('books');
		import('ORG.Util.Page');
		$count = $Books->count();
		$hot_info = "";
		if($count == 0)
			$hot_info = "还未有图书上传！";
		$Page = new Page($count,9);
		$show = $Page->show();
		$list = $Books->order('count desc')->limit($Page->firstRow.','.$Page->listRows)->select();//根据图书的热度排序
		for($j=0; $j<count($list); $j++)
		{
			$bookid = $list[$j]['bookid'];
			$uid = session('uid');
			$tmp['bookid'] = $bookid;
			$Collection = D('collection');
			$flag = $Collection->check_collect($uid,$bookid);
			if($flag)
			{
				$list[$j]['myURL'] = U('BookCenter/clct',$tmp);
				$list[$j]['info'] = '收藏';
			}
			else
			{
				$list[$j]['myURL'] = U('BookCenter/un_clct',$tmp);
				$list[$j]['info'] = '取消收藏';
			}
			$list[$j]['dir'] = U('BookCenter/bs_show',$tmp);//生成图书主页地址
			$list[$j]['bookname'] = chinesesubstr($list[$j]['bookname'],16);//截取图书名的长度
			$list[$j]['author'] = chinesesubstr($list[$j]['author'],16);
		}
		$this->assign('hot_info',$hot_info);
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display();
	}
}
?>