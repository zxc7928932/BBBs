<?php

class MainPageAction extends Action
{
	public function main_page()
	{
		header("Content-Type:text/html; charset=utf-8");
		$uid = session('uid');
		if(!$uid)//防盗链
			$this->error('请先登录！',U('Login/index'));
		$Collection = D('collection');
		$list1 = $Collection->where("uid = $uid")->limit(3)->select();//获取该用户3本已经收藏的图书
		
		$books = D('books');
		for($i=0; $i<count($list1); $i++)
		{
			$tmp = $list1[$i]['bookid'];
			$res = $books->where("bookid = $tmp")->find();
			$list1[$i]['bookname'] = chinesesubstr($res['bookname'],16);//把截取后的书名放入数组给前端显示
			$list1[$i]['author'] = chinesesubstr($res['author'],16);
			$list1[$i]['myURL'] = U('BookCenter/bs_show',array('bookid' => $tmp));
		}
		$num1 = count($list1);
		$info1 = "";
		if($num1 == 0)
			$info1 = "您还没有收藏图书！";
		$this->assign('info1',$info1);
		$this->assign('list1',$list1);

		$Books = D('books');
		$list2 = $Books->order('count desc')->limit(5)->select();//根据图书的热度取出前5名
		for($i=0; $i<count($list2); $i++)
		{
			$tmp = $list2[$i]['bookid'];
			$list2[$i]['myURL'] = U('BookCenter/bs_show',array('bookid' => $tmp));//生成图书主页的URL地址
			$list2[$i]['bookname'] = chinesesubstr($list2[$i]['bookname'],16);
			$list2[$i]['author'] = chinesesubstr($list2[$i]['author'],16);
		}
		$num2 = count($list2);
		$info2 = "";
		if($num2 == 0)
			$info2 = "还没有图书上传！";
		$this->assign('info2',$info2);
		$this->assign('list2',$list2);

		$list3 = $Books->order('bookid desc')->limit(6)->select();//根据图书主键得到最新上传的前6本图书
		for($i=0; $i<count($list3); $i++)
		{
			$tmp = $list3[$i]['bookid'];
			$list3[$i]['bookname'] = chinesesubstr($list3[$i]['bookname'],16);
			$list3[$i]['author'] = chinesesubstr($list3[$i]['author'],16);
			$list3[$i]['myURL'] = U('BookCenter/bs_show',array('bookid' => $tmp));
		}
		$this->assign('list3',$list3);
		$this->display();
	}

	public function classify()
	{
		header("Content-Type:text/html; charset=utf-8");
		$uid = session('uid');
		if(!$uid)//防盗链
			$this->error('请先登录！',U('Login/index'));
		$Books = M('books');
		$classify = $this->_param('choice');
		import('ORG.Util.Page');
		$search_info = "";
		$count = $Books->where("classify = '$classify'")->count();//查找该分类下的所有图书
		if($count == 0)
			$search_info = "尚无此类图书！";
		$Page = new Page($count,9);//设置每页显示9条记录
		$show = $Page->show();
		$list = $Books->where("classify = '$classify'")->order('count desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		for($j=0; $j<count($list); $j++)
		{
			$bookid = $list[$j]['bookid'];
			$uid = session('uid');
			$tmp['bookid'] = $bookid;
			$Collection = D('collection');
			$flag = $Collection->check_collect($uid,$bookid);//根据是否收藏生成相应地址
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
			$list[$j]['dir'] = U('BookCenter/bs_show',$tmp);//生成主页地址
			$list[$j]['bookname'] = chinesesubstr($list[$j]['bookname'],16);
			$list[$j]['author'] = chinesesubstr($list[$j]['author'],16);
		}
		$this->assign('search_info',$search_info);
		$this->assign('classify_info',$classify);
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display();
	}
}
?>