<?php

class collectionModel extends RelationModel
{

	public function check_collect($uid,$bookid)
	{
		$Collection = D('collection');
		$result = $Collection->where("uid = $uid and bookid = $bookid")->find();
		if($result)
			return false;
		else
			return true;
	}
}
?>