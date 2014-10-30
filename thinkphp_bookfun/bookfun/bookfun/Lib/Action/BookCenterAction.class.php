<?php

class BookCenterAction extends Action
{
	public function upload_show()
	{
		header("Content-Type:text/html; charset=utf-8");
		$this->display();
	}

	public function upload()
	{
		header("Content-Type:text/html; charset=utf-8");
		$bookname = $this->_param('bookname');
		$author = $this->_param('author');
		$Books = D('books');
		$result = $Books->where("bookname = '$bookname' and author = '$author'")->find();
		if($result)
			$this->error('该书已存在！');
		$data['author'] = $author;
		$data['bookname'] = $bookname;
		$data['press'] = $this->_param('press');
		$data['content'] = $this->_param('content');
		$data['classify'] = $this->_param('classify');
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();
		$upload->maxSize = 3145788;
		$upload->allowExts = array('jpg','gif','png','jpeg');
		$upload->savePath = './Public/Uploads/';
		$upload->uploadReplace = true;
       	$upload->thumb = true;
       	$upload->thumbMaxWidth = 150;
     	$upload->thumbMaxHeight = 200;
       	$upload->thumbPath = './Public/Uploads/';
       	$upload->thumbRemoveOrigin = true;
		if(!$upload->upload())
			$this->error($upload->getErrorMsg());
		else
			$info = $upload->getUploadFileInfo();
		$data['image'] = 'thumb_'.$info[0]['savename'];
		$res = $Books->data($data)->add();
		if($res)
			$this->success('上传图书成功！');
		else
			$this->error('系统错误，上传失败！');
		
	}

	public function search_book()
	{
		header("Content-Type:text/html; charset=utf-8");
		$Books = M('books');
		$book_name = $this->_param('txt_book');
		$name_list =explode(" ",$book_name);
		$condition = array();
		$num = 0;
		for($i=0; $i<count($name_list); $i++)
		{
			if(strlen($name_list[$i]))
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
			$map['bookname'] = array('like',$condition,'OR');
			import('ORG.Util.Page');
			$count = $Books->where($map)->count();
			$Page = new Page($count,3);
			$show = $Page->show();
			$list = $Books->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
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
				$list[$j]['dir'] = U('BookCenter/bs_show',$tmp);
			}
			$this->assign('list',$list);
			$this->assign('page',$show);
			$this->display();
		}
	}

	public function clct()
	{
		$Collection = D('collection');
		$data['bookid'] = $this->_param('bookid');
		$data['uid'] = session('uid');
		if($Collection->data($data)->add())
			$this->success('收藏成功！');
		else
			$this->error('系统错误，取消收藏！');
	}

	public function un_clct()
	{
		$Collection = D('collection');
		$bookid = $this->_param('bookid');
		$uid = session('uid');
		if($Collection->where("uid = $uid and bookid = $bookid")->delete())
			$this->success('取消收藏成功！');
		else
			$this->error('系统错误，取消收藏失败！');
	}

	public function bs_show()
	{
		header("Content-Type:text/html; charset=utf-8");

		$bookid = $this->_param('bookid');
		$Books = D('books');
		$list1 = $Books->where("bookid = $bookid")->find();

		$uid = session('uid');
		$tmp['bookid'] = $bookid;
		$Collection = D('collection');
		$flag = $Collection->check_collect($uid,$bookid);
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
		$count = $Comment->where("bookid = $bookid")->order('commentid desc')->count();
		$Page = new Page($count,4);
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
		$data['uid'] = session('uid');
		$bookid = $this->_param('bookid');
		$data['bookid'] = $bookid;
		$data['content'] = $this->_param('comment');
		$Comment = D('comment');
		if($Comment->data($data)->add())
		{
			$Books = D('books');
			$count = $Books->where("bookid = $bookid")->getField('count');
			$count ++;
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
		
		$Books = D('books');
		import('ORG.Util.Page');
		$count = $Books->count();
		$hot_info = "";
		if($count == 0)
			$hot_info = "还未有图书上传！";
		$Page = new Page($count,3);
		$show = $Page->show();
		$list = $Books->order('count desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		for($j=0; $j<count($list); $j++)
		{
			$bookid = $list[$j]['bookid'];
			$uid = session('uid');
			$uid = 3;
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
			$list[$j]['dir'] = U('BookCenter/bs_show',$tmp);
		}
		$this->assign('hot_info',$hot_info);
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display();
	}
}
?>