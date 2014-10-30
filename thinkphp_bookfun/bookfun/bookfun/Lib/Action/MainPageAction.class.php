<?php

class MainPageAction extends Action
{
	public function main_page()
	{
		header("Content-Type:text/html; charset=utf-8");
		$uid = session('uid');
		if(!$uid)
			$this->error('请先登录！',U('Login/index'));
		$Collection = D('collection');
		$list1 = $Collection->where("uid = $uid")->limit(3)->select();
		
		$books = D('books');
		for($i=0; $i<count($list1); $i++)
		{
			$tmp = $list1[$i]['bookid'];
			$res = $books->where("bookid = $tmp")->find();
			$list1[$i]['bookname'] = $res['bookname'];
			$list1[$i]['author'] = $res['author'];
			$list1[$i]['myURL'] = U('BookCenter/bs_show',array('bookid' => $tmp));
		}
		$num1 = count($list1);
		$info1 = "";
		if($num1 == 0)
			$info1 = "您还没有收藏图书！";
		$this->assign('info1',$info1);
		$this->assign('list1',$list1);

		$Books = D('books');
		$list2 = $Books->order('count desc')->limit(5)->select();
		for($i=0; $i<count($list2); $i++)
		{
			$tmp = $list2[$i]['bookid'];
			$list2[$i]['myURL'] = U('BookCenter/bs_show',array('bookid' => $tmp));
		}
		$num2 = count($list2);
		$info2 = "";
		if($num2 == 0)
			$info2 = "还没有图书上传！";
		$this->assign('info2',$info2);
		$this->assign('list2',$list2);

		$list3 = $Books->order('bookid desc')->limit(6)->select();
		for($i=0; $i<count($list3); $i++)
		{
			$tmp = $list3[$i]['bookid'];
			$list3[$i]['myURL'] = U('BookCenter/bs_show',array('bookid' => $tmp));
		}
		$this->assign('list3',$list3);
		$this->display();
	}

	public function classify()
	{
		header("Content-Type:text/html; charset=utf-8");
		$Books = M('books');
		$classify = $this->_param('choice');
		import('ORG.Util.Page');
		$search_info = "";
		$count = $Books->where("classify = '$classify'")->count();
		if($count == 0)
			$search_info = "尚无此类图书！";
		$Page = new Page($count,9);
		$show = $Page->show();
		$list = $Books->where("classify = '$classify'")->order('count desc')->limit($Page->firstRow.','.$Page->listRows)->select();
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
		$this->assign('search_info',$search_info);
		$this->assign('classify_info',$classify);
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display();
	}
}
?>